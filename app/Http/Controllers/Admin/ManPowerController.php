<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Section;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManPowerController extends Controller
{
    public function index()
    {
      $mobileManPowers = User::orderBy('created_at', 'desc')->paginate(10);
      $sections = Section::all();
      $manPowers = User::orderBy('created_at', 'desc')->limit(100)->get();
      return view('pages.admin.man_power')->with('manPowers', $manPowers)
                                          ->with('sections', $sections)
                                          ->with('mobileManPowers', $mobileManPowers);
    }

    public function store(Request $request)
    {
      $request->validate([
          'role' => 'required',
          'name' => 'required',
          'nik' => 'required|integer|unique:users',
          'position' => 'required',
          'brl' => 'required',
          'section' => 'required',
      ]);

      if ($request->other) {
        $section = Section::create([
          'name' => $request->other
        ]);
        User::create([
          'role_id' => $request->role,
          'name' => $request->name,
          'password' => bcrypt('123456'),
          'nik' => $request->nik,
          'position' => $request->position,
          'section_id' => $section->id,
          'brl' => $request->brl
        ]);
      }else{
        User::create([
          'role_id' => $request->role,
          'name' => $request->name,
          'password' => bcrypt('123456'),
          'nik' => $request->nik,
          'position' => $request->position,
          'section_id' => $request->section,
          'brl' => $request->brl
        ]);
      }

      return back()->with('success', 'Data Man Power Baru Berhasil Ditambahkan!');
    }

    public function search($input)
    {
      $mobileManPowers = User::where('nik', 'like', '%'.$input.'%')
                                      ->orWhere('name', 'like', '%'. $input . '%')
                                      ->orderBy('created_at', 'desc')
                                      ->paginate(10);
      $sections = Section::all();
      $manPowers = User::where('role_id', 3)->orWhere('role_id', 2)->orderBy('nik')->paginate(200);
      return view('pages.admin.man_power')->with('manPowers', $manPowers)
                                          ->with('sections', $sections)
                                          ->with('input', $input)
                                          ->with('mobileManPowers', $mobileManPowers);
    }

    public function loadAllData(Request $request)
    {
      $manPowers = User::orderBy('created_at', 'desc')->get();
      $no = 1;
      foreach ($manPowers as $key) {
        echo '<tr>
          <th>'. $no .'</th>
          <th scope="row">'. $key->role->name .'</th>
          <td>'. $key->name .'</td>
          <td>'. $key->nik .'</td>
          <td>'. $key->position .'</td>
          <td>'. $key->section->name .'</td>
          <td>
            <div class="form-inline">
              <button type="button" name="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateManPower"
              onclick="showModaluUpdate(\''. $key->nik .'\', \''. $key->name .'\', \''. $key->position .'\', \''. $key->section_id .'\', \''. $key->brl .'\', \''. $key->role_id .'\')">
              Update</button>
              <button type="button" class="form-control  btn btn-sm btn-danger" data-toggle="modal" data-target="#deleteManPower"  onclick="showModalDestroy('.$key->nik.', \''. $key->name.'\')">
                Delete
            </button>
            </div>
          </td>
        </tr>';
        $no++;
      }
    }

    public function loadAllDataMobile(Request $request)
    {
      $mobileManPowers = User::orderBy('created_at', 'desc')->paginate(10);
      foreach ($mobileManPowers as $key) {
        echo '<br><div class="container border p-4">
          <table width="100%" class="table-mobileview">
            <tr>
              <td>#'. $key->nik .'</td>
              <td class="text-right">'. $key->name .'</td>
            </tr>
            <tr>
              <td>Hak Akses</td>
              <td class="text-right">'. $key->role->name.'</td>
            </tr>
            <tr>
              <td>Jabatan</td>
              <td class="text-right">'. $key->position .'</td>
            </tr>
            <tr>
              <td>Section</td>
              <td class="text-right">'. $key->section->name .'</td>
            </tr>
            <tr>
              <td colspan="2">
                <br>
                <div class="form-inline float-right">
                  <button type="button" name="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#updateManPower"
                  onclick="showModaluUpdate(\''. $key->nik .'\', \''. $key->name .'\', \''. $key->position .'\', \''. $key->section_id .'\', \''. $key->brl .'\', \''. $key->role_id .'\')">
                  Update</button>
                  <button type="button" name="button" class="btn btn-sm btn-danger ml-2" data-toggle="modal" data-target="#deleteManPower" onclick="showModalDestroy('.$key->nik.', \''. $key->name.'\')">
                    Delete</button>
                </div>
              </td>
            </tr>
          </table>
        </div>';
      }
    }

    public function destroy(Request $request)
    {
      $data = User::where('nik', $request->id)->first();
      $data->delete();
    }

    public function update(Request $request)
    {
      $request->validate([
          'role' => 'required',
          'name' => 'required',
          'position' => 'required',
          'brl' => 'required',
          'section' => 'required',
      ]);

      if ($request->role == 1) {
        if ($request->role != session('login')->role_id) {
          return back()->with('success', 'Pengecekan berhasil! Namun anda tidak bisa mengubah role untuk diri sendiri karena anda sedang login sebagai administrator!');
        }
      }

      $user = User::where('nik', $request->nik)->first();
      if ($user) {
        $user->role_id = $request->role;
        $user->name = $request->name;
        $user->position = $request->position;
        $user->brl = $request->brl;
        $user->section_id = $request->section;

        if ($request->password != null) {
          $user->password = bcrypt($request->password);
        }

        $user->save();
        return back()->with('success', 'Data '. $request->name .' berhasil diperbaharui!');
      }else{
        return back()->with('success', 'Pengecekan berhasil! Namun NIK yang anda cari belum terdaftar pada sistem');
      }
    }
}
