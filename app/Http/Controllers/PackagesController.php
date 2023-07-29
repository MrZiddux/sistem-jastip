<?php

namespace App\Http\Controllers;

use App\Http\Requests\saveJastipReportRequest;
use App\Models\Packages;
use App\Models\Recipient;
use App\Models\RecipientLocation;
use Illuminate\Support\Facades\DB;

class PackagesController extends Controller
{
    private $package, $recipient, $recipientLocation;

    public function __construct(Packages $package, Recipient $recipient, RecipientLocation $recipientLocation)
    {
      $this->package = $package;
      $this->recipient = $recipient;
      $this->recipientLocation = $recipientLocation;
    }

    public function index()
    {
      $recipients = $this->recipient->select('id')->with('recipientStatus', 'recipientLocation')->whereHas('recipientStatus', function ($query) {
        $query->where('status_id', 1);
      })->whereDoesntHave('recipientLocation')->get();

      $packages = $this->package->leftJoin('recipients', 'packages.recipient_id', '=', 'recipients.id')
        ->leftJoin('recipient_statuses', 'recipients.id', '=', 'recipient_statuses.recipient_id')
        ->leftJoin('recipient_locations', 'recipients.id', '=', 'recipient_locations.recipient_id')
        ->select('packages.id', 'packages.tracking_number', 'packages.weight', 'packages.pricing_option', 'packages.length', 'packages.width', 'packages.height', 'packages.cubic_weight', 'packages.price', 'recipients.name', 'recipient_statuses.status_id', 'recipient_locations.name as location')
        ->where('recipient_statuses.status_id', 1)
        ->whereNull('recipient_locations.name')
        ->orderBy('recipients.name')
        ->get();

      return view('pages.jastip-received.index', compact('packages', 'recipients'));
    }

    public function store(saveJastipReportRequest $request)
    {
      DB::transaction(function () use ($request) {
        foreach ($request->recipients as $recipient) {
          $this->recipientLocation->create([
            'recipient_id' => $recipient,
            'name' => $request->name,
          ]);

          $this->recipient->find($recipient)->recipientStatus()->update([
            'status_id' => 2,
          ]);
        }
      });

      return response()->json([
        'success' => true,
        'message' => 'Berhasil menyimpan data',
      ]);
    }
}
