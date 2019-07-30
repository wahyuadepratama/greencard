<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
  public function index()
  {
    return view('pages.user.statistik');
  }
}
