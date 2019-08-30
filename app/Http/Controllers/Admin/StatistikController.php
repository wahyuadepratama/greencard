<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
    public function index()
    {
      if($_GET){
        $month = $_GET['month'];
        $year = $_GET['year'];

        if ($month == "all" && $year == "all") {

          $gk['office'] = Report::where('location', 'Office')->get()->count();
          $gk['warehouse'] = Report::where('location', 'Warehouse')->get()->count();
          $gk['workshop'] = Report::where('location', 'Workshop')->get()->count();
          $gk['tambang_ob'] = Report::where('location', 'Area Tambang (OB)')->get()->count();
          $gk['tambang_coal'] = Report::where('location', 'Area Tambang (Coal)')->get()->count();
          $gk['mess'] = Report::where('location', 'Area Mess')->get()->count();
          $gk['pit_stop'] = Report::where('location', 'Pit Stop / Shutdown')->get()->count();
          $gk['area_lainnya'] = Report::where('location', 'Area Lainnya')->get()->count();
          $gk = (object) $gk;

          $kta = Report::where('danger_category', 'Kondisi Tidak Aman')->get()->count();
          $tta = Report::where('danger_category', 'Tindakan Tidak Aman')->get()->count();

          $open = Report::where('status', 'Open')->get()->count();
          $close = Report::where('status', 'Close')->get()->count();

          $aa = Report::where('danger_code', 'AA')->get()->count();
          $a = Report::where('danger_code', 'A')->get()->count();
          $b = Report::where('danger_code', 'B')->get()->count();
          $c = Report::where('danger_code', 'C')->get()->count();

          $reports = DB::table('reports')
                         ->join('users', 'reports.nik', '=', 'users.nik')
                         ->join('sections', 'users.section_id', '=', 'sections.id')
                         ->select('users.section_id', DB::raw('count(users.section_id) as section_count'))
                         ->groupBy('users.section_id')
                         ->limit(10)
                         ->get();

        }elseif($month == "all"){
          $gk['office'] = Report::where('location', 'Office')->whereYear('date', $year)->get()->count();
          $gk['warehouse'] = Report::where('location', 'Warehouse')->whereYear('date', $year)->get()->count();
          $gk['workshop'] = Report::where('location', 'Workshop')->whereYear('date', $year)->get()->count();
          $gk['tambang_ob'] = Report::where('location', 'Area Tambang (OB)')->whereYear('date', $year)->get()->count();
          $gk['tambang_coal'] = Report::where('location', 'Area Tambang (Coal)')->whereYear('date', $year)->get()->count();
          $gk['mess'] = Report::where('location', 'Area Mess')->whereYear('date', $year)->get()->count();
          $gk['pit_stop'] = Report::where('location', 'Pit Stop / Shutdown')->whereYear('date', $year)->get()->count();
          $gk['area_lainnya'] = Report::where('location', 'Area Lainnya')->whereYear('date', $year)->get()->count();
          $gk = (object) $gk;

          $kta = Report::where('danger_category', 'Kondisi Tidak Aman')->whereYear('date', $year)->get()->count();
          $tta = Report::where('danger_category', 'Tindakan Tidak Aman')->whereYear('date', $year)->get()->count();

          $open = Report::where('status', 'Open')->whereYear('date', $year)->get()->count();
          $close = Report::where('status', 'Close')->whereYear('date', $year)->get()->count();

          $aa = Report::where('danger_code', 'AA')->whereYear('date', $year)->get()->count();
          $a = Report::where('danger_code', 'A')->whereYear('date', $year)->get()->count();
          $b = Report::where('danger_code', 'B')->whereYear('date', $year)->get()->count();
          $c = Report::where('danger_code', 'C')->whereYear('date', $year)->get()->count();

          $reports = DB::table('reports')
                         ->join('users', 'reports.nik', '=', 'users.nik')
                         ->join('sections', 'users.section_id', '=', 'sections.id')
                         ->whereYear('reports.date', $year)
                         ->select('users.section_id', DB::raw('count(users.section_id) as section_count'))
                         ->groupBy('users.section_id')
                         ->limit(10)
                         ->get();
        }elseif($year == "all"){
          $gk['office'] = Report::where('location', 'Office')->whereMonth('date', $month)->get()->count();
          $gk['warehouse'] = Report::where('location', 'Warehouse')->whereMonth('date', $month)->get()->count();
          $gk['workshop'] = Report::where('location', 'Workshop')->whereMonth('date', $month)->get()->count();
          $gk['tambang_ob'] = Report::where('location', 'Area Tambang (OB)')->whereMonth('date', $month)->get()->count();
          $gk['tambang_coal'] = Report::where('location', 'Area Tambang (Coal)')->whereMonth('date', $month)->get()->count();
          $gk['mess'] = Report::where('location', 'Area Mess')->whereMonth('date', $month)->get()->count();
          $gk['pit_stop'] = Report::where('location', 'Pit Stop / Shutdown')->whereMonth('date', $month)->get()->count();
          $gk['area_lainnya'] = Report::where('location', 'Area Lainnya')->whereMonth('date', $month)->get()->count();
          $gk = (object) $gk;

          $kta = Report::where('danger_category', 'Kondisi Tidak Aman')->whereMonth('date', $month)->get()->count();
          $tta = Report::where('danger_category', 'Tindakan Tidak Aman')->whereMonth('date', $month)->get()->count();

          $open = Report::where('status', 'Open')->whereMonth('date', $month)->get()->count();
          $close = Report::where('status', 'Close')->whereMonth('date', $month)->get()->count();

          $aa = Report::where('danger_code', 'AA')->whereMonth('date', $month)->get()->count();
          $a = Report::where('danger_code', 'A')->whereMonth('date', $month)->get()->count();
          $b = Report::where('danger_code', 'B')->whereMonth('date', $month)->get()->count();
          $c = Report::where('danger_code', 'C')->whereMonth('date', $month)->get()->count();

          $reports = DB::table('reports')
                         ->join('users', 'reports.nik', '=', 'users.nik')
                         ->join('sections', 'users.section_id', '=', 'sections.id')
                         ->whereMonth('reports.date', $month)
                         ->select('users.section_id', DB::raw('count(users.section_id) as section_count'))
                         ->groupBy('users.section_id')
                         ->limit(10)
                         ->get();
        }else{
          $gk['office'] = Report::where('location', 'Office')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk['warehouse'] = Report::where('location', 'Warehouse')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk['workshop'] = Report::where('location', 'Workshop')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk['tambang_ob'] = Report::where('location', 'Area Tambang (OB)')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk['tambang_coal'] = Report::where('location', 'Area Tambang (Coal)')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk['mess'] = Report::where('location', 'Area Mess')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk['pit_stop'] = Report::where('location', 'Pit Stop / Shutdown')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk['area_lainnya'] = Report::where('location', 'Area Lainnya')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $gk = (object) $gk;

          $kta = Report::where('danger_category', 'Kondisi Tidak Aman')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $tta = Report::where('danger_category', 'Tindakan Tidak Aman')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();

          $open = Report::where('status', 'Open')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $close = Report::where('status', 'Close')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();

          $aa = Report::where('danger_code', 'AA')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $a = Report::where('danger_code', 'A')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $b = Report::where('danger_code', 'B')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();
          $c = Report::where('danger_code', 'C')->whereMonth('date', $month)->whereYear('date', $year)->get()->count();

          $reports = DB::table('reports')
                         ->join('users', 'reports.nik', '=', 'users.nik')
                         ->join('sections', 'users.section_id', '=', 'sections.id')
                         ->whereMonth('reports.date', $month)
                         ->whereYear('reports.date', $year)
                         ->select('users.section_id', DB::raw('count(users.section_id) as section_count'))
                         ->groupBy('users.section_id')
                         ->limit(10)
                         ->get();
        }

      }else{
        $gk['office'] = Report::where('location', 'Office')->get()->count();
        $gk['warehouse'] = Report::where('location', 'Warehouse')->get()->count();
        $gk['workshop'] = Report::where('location', 'Workshop')->get()->count();
        $gk['tambang_ob'] = Report::where('location', 'Area Tambang (OB)')->get()->count();
        $gk['tambang_coal'] = Report::where('location', 'Area Tambang (Coal)')->get()->count();
        $gk['mess'] = Report::where('location', 'Area Mess')->get()->count();
        $gk['pit_stop'] = Report::where('location', 'Pit Stop / Shutdown')->get()->count();
        $gk['area_lainnya'] = Report::where('location', 'Area Lainnya')->get()->count();
        $gk = (object) $gk;

        $kta = Report::where('danger_category', 'Kondisi Tidak Aman')->get()->count();
        $tta = Report::where('danger_category', 'Tindakan Tidak Aman')->get()->count();

        $open = Report::where('status', 'Open')->get()->count();
        $close = Report::where('status', 'Close')->get()->count();

        $aa = Report::where('danger_code', 'AA')->get()->count();
        $a = Report::where('danger_code', 'A')->get()->count();
        $b = Report::where('danger_code', 'B')->get()->count();
        $c = Report::where('danger_code', 'C')->get()->count();

        $reports = DB::table('reports')
                       ->join('users', 'reports.nik', '=', 'users.nik')
                       ->join('sections', 'users.section_id', '=', 'sections.id')
                       ->select('users.section_id', DB::raw('count(users.section_id) as section_count'))
                       ->groupBy('users.section_id')
                       ->limit(10)
                       ->get();
      }

      return view('pages.admin.statistik')->with('gk', $gk)
                                          ->with('kta', $kta)
                                          ->with('tta', $tta)
                                          ->with('open', $open)
                                          ->with('close', $close)
                                          ->with('aa', $aa)
                                          ->with('a', $a)
                                          ->with('b', $b)
                                          ->with('c', $c)
                                          ->with('reports', $reports);

    }
}
