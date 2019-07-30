<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManPowerController extends Controller
{
    public function index()
    {
      return view('pages.admin.man_power');
    }
}
