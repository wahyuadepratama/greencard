<?php

namespace App\Http\Controllers\Verifikator;

use App\Models\Report;
use App\Exports\ReportExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
  public function index()
  {
    return view('pages.verifikator.summary');
  }

  public function exportToExcel($year, $month)
  {
    return Excel::download(new ReportExport($year, $month), 'report_'. $year.'_'. $month.'.xlsx');
  }

  public function exportToPDF($year, $month)
  {
    if ($year == 'all' && $month == 'all') {
      $data = DB::table('reports')
              ->join('users', 'reports.nik', '=', 'users.nik')
              ->join('sections', 'users.section_id', '=', 'sections.id')
              ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
              ->get();
      return view('sub-views.pdf_report')->with('report', $data);
    }elseif ($year == 'all') {
      $data = DB::table('reports')
              ->join('users', 'reports.nik', '=', 'users.nik')
              ->join('sections', 'users.section_id', '=', 'sections.id')
              ->whereMonth('reports.date', '=', $month)
              ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
              ->get();
      return view('sub-views.pdf_report')->with('report', $data);
    }elseif ($month == 'all') {
      $data = DB::table('reports')
              ->join('users', 'reports.nik', '=', 'users.nik')
              ->join('sections', 'users.section_id', '=', 'sections.id')
              ->whereYear('reports.date', '=', $year)
              ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
              ->get();
      return view('sub-views.pdf_report')->with('report', $data);
    }else{
      $data = DB::table('reports')
              ->join('users', 'reports.nik', '=', 'users.nik')
              ->join('sections', 'users.section_id', '=', 'sections.id')
              ->whereMonth('reports.date', '=', $month)
              ->whereYear('reports.date', '=', $year)
              ->select('users.name', 'users.position','users.brl', 'sections.name as section', 'reports.*')
              ->get();
      return view('sub-views.pdf_report')->with('report', $data);
    }
  }
}
