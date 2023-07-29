<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportJastipRequest;
use App\Models\Packages;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ReportJastipController extends Controller
{
    public function index()
    {
      return view('pages.report-jastip.index');
    }

    public function daily()
    {
      $cachedPackages = Cache::get('report-jastip.daily');
      return view('pages.report-jastip.daily', compact('cachedPackages'));
    }

    public function getDailyReportJastip(Request $request)
    {
      $packages = Packages::leftJoin('recipients', 'packages.recipient_id', '=', 'recipients.id')
        ->leftJoin('recipient_statuses', 'recipients.id', '=', 'recipient_statuses.recipient_id')
        ->leftJoin('recipient_locations', 'recipients.id', '=', 'recipient_locations.recipient_id')
        ->select('packages.id', 'packages.tracking_number', 'packages.weight', 'packages.pricing_option', 'packages.length', 'packages.width', 'packages.height', 'packages.cubic_weight', 'packages.price', 'recipients.name', 'recipient_statuses.status_id', 'recipient_locations.name as location')
        ->orderBy('recipients.name')
        ->whereDate('packages.created_at', date('Y-m-d'))
        ->get();

      return Cache::remember('report-jastip.daily', Carbon::parse('10 seconds'), function () use ($packages) {
          return view('pages.report-jastip._packages', compact('packages'))->render();
      });
    }

    public function getReportJastip(ReportJastipRequest $request)
    {
      $packages = Packages::leftJoin('recipients', 'packages.recipient_id', '=', 'recipients.id')
        ->leftJoin('recipient_statuses', 'recipients.id', '=', 'recipient_statuses.recipient_id')
        ->leftJoin('recipient_locations', 'recipients.id', '=', 'recipient_locations.recipient_id')
        ->select('packages.id', 'packages.tracking_number', 'packages.weight', 'packages.pricing_option', 'packages.length', 'packages.width', 'packages.height', 'packages.cubic_weight', 'packages.price', 'recipients.name', 'recipient_statuses.status_id', 'recipient_locations.name as location')
        ->orderBy('recipients.name');

      if (!empty($request->start_date) && !empty($request->end_date)) {
        $packages->whereBetween('packages.created_at', [$request->start_date, $request->end_date]);
      }

      $packages = $packages->get();

      return view('pages.report-jastip._packages', compact('packages'));
    }
}
