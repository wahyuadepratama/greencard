<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
  public function index()
  {
    $data = DB::table('reports')
                   ->select(DB::raw('count(*) as report_count, nik'))
                   ->groupBy('nik')
                   ->orderBy('report_count', 'desc')
                   ->limit(10)
                   ->get();

      $top = array();
      foreach ($data as $key) {
        $report = Report::where('nik', $key->nik)->first();
        $report->gc = $key->report_count;
        array_push($top, $report);
      }

    return view('pages.admin.home')->with('tops',$top);
  }
}
