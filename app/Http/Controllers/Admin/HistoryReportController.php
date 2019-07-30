<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryReportController extends Controller
{
    public function index()
    {
      return view('pages.admin.riwayat_pelaporan');
    }
}
