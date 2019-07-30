<?php

namespace App\Http\Controllers\Verifikator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GreencardController extends Controller
{
    public function index()
    {
      return view('pages.verifikator.greencard');
    }
}
