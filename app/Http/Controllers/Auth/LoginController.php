<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
      $this->middleware('guest')->except('logout');
    }

    public function loginFormUser()
    {
      return view('pages.user.login');
    }

    public function login(Request $request)
    {
      if ($request->password == null) {
        dd($request->nik);
        $nik = User::where('nik', $request->nik)->first();
        if ($nik) {
          session(['login' => $nik]);
          return redirect('/user/home');
        }else{
          return back()->with('error', 'NIK Belum Terdaftar!');
        }
      }else{
        $credentials = $request->only('nik', 'password');
        if (\Auth::guard('web')->attempt($credentials)) {
          $nik = User::where('nik', $request->nik)->first();
          switch ($nik->role_id) {
            case 1:
              session(['login' => $nik]);
              return redirect('/admin/home');
              break;
            case 2:
              session(['login' => $nik]);
              return redirect('/verifikator/home');
              break;
            case 3:
              return back()->with('error', 'Anda tidak terdaftar sebagai verifikator!');
              break;
          }
        }else{
          return back()->with('error', 'NIK atau Password yang Anda Masukan Salah!');
        }
      }
    }

    public function logout(Request $request)
    {
      session()->flush();
      // session(['login' => null]);
      return back();
    }

    // public function loginAsUser(Request $request)
    // {
    //     $credentials = $request->only('nik', 'password');
    //     $credentials['password'] = '123456';
    //
    //     if (Auth::guard('web')->attempt($credentials)) {
    //         // Authentication passed...
    //         return redirect()->intended('/user/home');
    //     }
    //     return back()->with('error', 'NIK belum terdaftar!');
    // }
}
