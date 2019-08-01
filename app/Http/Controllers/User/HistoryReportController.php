<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryReportController extends Controller
{
  public function index()
  {
    $open = Report::where('status', 'Open')->orderBy('date', 'desc')->get();
    $close = Report::where('status', 'Close')->orderBy('date', 'desc')->get();
    return view('pages.user.riwayat_pelaporan')->with('open', $open)
                                              ->with('close', $close);
  }
}
