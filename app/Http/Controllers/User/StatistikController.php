<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use App\Models\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
  public function index()
  {
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

    $reports = DB::table('reports')
                   ->join('users', 'reports.nik', '=', 'users.nik')
                   ->join('sections', 'users.section_id', '=', 'sections.id')
                   ->select('users.section_id', DB::raw('count(users.section_id) as section_count'))
                   ->groupBy('users.section_id')
                   ->limit(10)
                   ->get();

    return view('pages.user.statistik')->with('gk', $gk)
                                        ->with('kta', $kta)
                                        ->with('tta', $tta)
                                        ->with('open', $open)
                                        ->with('close', $close)
                                        ->with('reports', $reports);
  }
}
