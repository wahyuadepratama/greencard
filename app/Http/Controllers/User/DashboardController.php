<?php

namespace App\Http\Controllers\User;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
      // return session('login')->role_id;
      // $data = DB::table('your_table')
      //       ->select('column', 'COUNT(column) AS occurrences')
      //       ->groupBy('column')
      //       ->orderBy('occurrences', 'DESC')
      //       ->limit(10)
      //       ->get();
      return view('pages.user.home');
    }
}
