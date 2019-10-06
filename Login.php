<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\ModelKontak;
use Validator;
class Login extends Controller
{
    public function index()
    {
      return view('login');
    }

  public function cek(Request $req)
{
  $this->validate($req,[
    'username'=>'required',
    'password'=>'required'
  ]);
  $proses= ModelKontak::where('username',$req->username)->where('password',$req->password)->first();
  if ($proses!="") {
    Session::put('id_kontak',$proses->id_kontak);
    Session::put('email',$proses->email);
    Session::put('alamat',$proses->alamat);
    Session::put('nama',$proses->nama);
    Session::put('hak_akses',$proses->hak_akses);
    Session::put('login_status',true);
    return redirect('/barang');
  } else {
    Session::flash('alert_pesan','Username dan Password tidak cocok');
    return redirect('login');
  }
}
public function logout()
{
  Session::flush();
  return redirect('login');
}
}
