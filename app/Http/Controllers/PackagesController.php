<?php

namespace App\Http\Controllers;

use App\Models\Packages;
use Illuminate\Http\Request;

class PackagesController extends Controller
{
    private $package;

    public function __construct(Packages $package)
    {
      $this->package = $package;
    }

    public function index()
    {
      $packages = $this->package->with('recipient', 'recipientStatus.status')->join('recipients', 'recipients.id', '=', 'packages.recipient_id')->orderBy('recipients.name')->get();
      return view('pages.jastip-report.index', compact('packages'));
    }
}
