<?php

namespace App\Http\Controllers\User;

use App\Models\Section;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class HistoryReportController extends Controller
{
  public function index()
  {
    $open = Report::where('status', 'Open')->where('reports.nik', session('login')->nik)->orderBy('date', 'desc')->join('users', function ($join) {
                        $join->on('reports.nik', '=', 'users.nik');
                    })->get();
    $close = Report::where('status', 'Close')->where('reports.nik', session('login')->nik)->orderBy('date', 'desc')->join('users', function ($join) {
                        $join->on('reports.nik', '=', 'users.nik');
                    })->get();

    $this->convertDateToHumans($open);
    $this->convertDateToHumans($close);

    return view('pages.user.riwayat_pelaporan')->with('open', $open)
                                              ->with('close', $close);
  }

  public function searchOpenHistory(Request $request)
  {
    $report = DB::table('reports')
            ->join('users', 'reports.nik', '=', 'users.nik')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->where('sections.id', $request->section)
            ->where('reports.status', 'Open')
            ->whereYear('reports.date', '=', $request->year)
            ->select('reports.*', 'users.brl', 'sections.name as section')
            ->get();

    $this->convertDateToHumans($report);
    foreach ($report as $key) {
      echo '<tr>
        <th scope="row">'. $key->id .'</th>
        <td>'. $key->date .'</td>
        <td>'. $key->location .'</td>
        <td>'. $key->danger_category .'</td>
        <td>
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" onclick="loadModal('. $key->id .')">
            Detail
          </button>
        </td>
        <td>
          '. $key->status .'
        </td>
      </tr>';
    }
  }

  public function searchCloseHistory(Request $request)
  {
    $report = DB::table('reports')
            ->join('users', 'reports.nik', '=', 'users.nik')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->where('sections.id', $request->section)
            ->where('reports.status', 'Close')
            ->whereYear('reports.date', '=', $request->year)
            ->select('reports.*', 'users.brl', 'sections.name as section')
            ->get();

    $this->convertDateToHumans($report);
    foreach ($report as $key) {
      echo '<tr>
        <th scope="row">'. $key->id .'</th>
        <td>'. $key->date .'</td>
        <td>'. $key->location .'</td>
        <td>'. $key->danger_category .'</td>
        <td>
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" onclick="loadModal('. $key->id .')">
            Detail
          </button>
        </td>
        <td>
          '. $key->status .'
        </td>
      </tr>';
    }
  }

  public function searchOpenHistoryMobile(Request $request)
  {
    $report = DB::table('reports')
            ->join('users', 'reports.nik', '=', 'users.nik')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->where('sections.id', $request->section)
            ->where('reports.status', 'Open')
            ->whereYear('reports.date', '=', $request->year)
            ->select('reports.*', 'users.brl', 'sections.name as section')
            ->get();

    $this->convertDateToHumans($report);
    foreach ($report as $key) {
      echo '<div class="container border pt-2 pb-2 mt-3">
        <table width="100%" class="table-mobileview" id="tabelku">
          <tr>
            <th>#'. $key->id .'</th>
            <td class="text-right">'. $key->date.'</td>
          </tr>
          <tr>
            <th>Lokasi</th>
            <td class="text-right">'. $key->location .'</td>
          </tr>
          <tr>
            <th>Kategori Bahaya</th>
            <td class="text-right">'. $key->danger_category .'</td>
          </tr>
        </table>
        <br>
        <div class="form-inline">
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" onclick="loadModal('. $key->id .')">
            Detail
          </button>
        </div>
      </div>';
    }
  }

  public function searchCloseHistoryMobile(Request $request)
  {
    $report = DB::table('reports')
            ->join('users', 'reports.nik', '=', 'users.nik')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->where('sections.id', $request->section)
            ->where('reports.status', 'Close')
            ->whereYear('reports.date', '=', $request->year)
            ->select('reports.*', 'users.brl', 'sections.name as section')
            ->get();

    $this->convertDateToHumans($report);
    foreach ($report as $key) {
      echo '<div class="container border pt-2 pb-2 mt-3">
        <table width="100%" class="table-mobileview" id="tabelku">
          <tr>
            <th>#'. $key->id .'</th>
            <td class="text-right">'. $key->date.'</td>
          </tr>
          <tr>
            <th>Lokasi</th>
            <td class="text-right">'. $key->location .'</td>
          </tr>
          <tr>
            <th>Kategori Bahaya</th>
            <td class="text-right">'. $key->danger_category .'</td>
          </tr>
        </table>
        <br>
        <div class="form-inline">
          <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#detail" onclick="loadModal('. $key->id .')">
            Detail
          </button>
        </div>
      </div>';
    }
  }

  public function loadModal(Request $request)
  {
    $report = DB::table('reports')
            ->join('users', 'reports.nik', '=', 'users.nik')
            ->join('sections', 'users.section_id', '=', 'sections.id')
            ->join('pics', 'reports.pic', '=', 'pics.id')
            ->where('reports.id', $request->id)
            ->select('reports.*', 'pics.name as pics', 'users.brl', 'sections.name', 'users.name', 'sections.name as section')
            ->get();
    $this->convertDateToHumans($report);
    return $report;
  }

  public function convertDateToHumans($jsons){
    foreach ($jsons as $json)
      $json->date = date('d F Y', strtotime($json->date));

    return $jsons;
  }
}
