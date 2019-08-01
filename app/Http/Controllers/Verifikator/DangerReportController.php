<?php

namespace App\Http\Controllers\Verifikator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DangerReportController extends Controller
{
    public function index(){
      return view('pages.verifikator.lapor_bahaya');
    }

    public function store(Request $request)
    {
      $request->validate([
          'date' => 'required',
          'time' => 'required',
          'location' => 'required',
          'detail_location' => 'required',
          'danger_category' => 'required',
          'danger_code' => 'required',
          'description' => 'required',
          'risk' => 'required',
          'action' => 'required',
          'status' => 'required',
      ]);

      Report::create([
        'nik' => session('login')->nik,
        'date' => $this->convertDate($request->date),
        'time' => $this->convertTime($request->time),
        'location' => $request->location,
        'detail_location' => $request->detail_location,
        'danger_category' => $request->danger_category,
        'danger_code' => $request->danger_code,
        'description' => $request->description,
        'risk' => $request->risk,
        'action' => $request->action,
        'status' => $request->status
      ]);
      return back()->with('success', 'Terima kasih! Laporan berhasil ditambahkan.');
    }

    public function convertDate($date){
      $date = str_replace('/', '-', $date);
      return date("Y-m-d", strtotime($date));
    }

    public function convertTime($time){
      return date("H:i:s", strtotime($time));
    }
}
