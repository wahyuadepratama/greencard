<?php

namespace App\Http\Controllers\Admin;

// use PDF;
use App\Models\Report;
use App\Exports\ReportExport;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class SummaryController extends Controller
{
    public function index()
    {
      return view('pages.admin.summary');
    }

    public function exportToExcel($year, $month)
    {
      return Excel::download(new ReportExport($year, $month), 'report_'. $year.'_'. $month.'.xlsx');
    }

    public function exportToPDF($year, $month)
    {
      $report = Report::all();
      return view('sub-views.pdf_report')->with('report', $report);
    }
}
