<?php

namespace App\Http\Controllers\Verifikator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatistikController extends Controller
{
    public function index()
    {
      return view('pages.verifikator.statistik');
    }
}
