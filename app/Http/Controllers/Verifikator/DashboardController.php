<?php

namespace App\Http\Controllers\Verifikator;

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

    return view('pages.verifikator.home')->with('tops',$top);
  }

  public function filterRank(Request $request)
  {
     if ($request->month == "all" && $request->year == "all") {
       $data = DB::table('reports')
                      ->select(DB::raw('count(*) as report_count, nik'))
                      ->groupBy('nik')
                      ->orderBy('report_count', 'desc')
                      ->limit(10)
                      ->get();
     }elseif($request->month == "all"){
       $data = DB::table('reports')
                      ->whereYear('date', $request->year)
                      ->select(DB::raw('count(*) as report_count, nik'))
                      ->groupBy('nik')
                      ->orderBy('report_count', 'desc')
                      ->limit(10)
                      ->get();
     }elseif($request->year == "all"){
       $data = DB::table('reports')
                      ->whereMonth('date', $request->month)
                      ->select(DB::raw('count(*) as report_count, nik'))
                      ->groupBy('nik')
                      ->orderBy('report_count', 'desc')
                      ->limit(10)
                      ->get();
     }else{
       $data = DB::table('reports')
                      ->whereMonth('date', $request->month)
                      ->whereYear('date', $request->year)
                      ->select(DB::raw('count(*) as report_count, nik'))
                      ->groupBy('nik')
                      ->orderBy('report_count', 'desc')
                      ->limit(10)
                      ->get();
     }

     $no = 1;
     foreach ($data as $key) {
       $report = Report::where('nik', $key->nik)->first();
       $report->gc = $key->report_count;
       echo "<tr><th scope='row'>". $no++ ."</th>
       <td>". $report->user->name ."</td>
       <td>". $report->user->section->name ."</td>
       <td>". $report->gc ."</td></tr>";
     }
  }
}
