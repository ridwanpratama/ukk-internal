<?php

namespace App\Http\Controllers;

use App\Registrasi;
use PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DaftarController extends Controller
{
    public function Index()
    {
        return view('daftar.form');
    }

    public function validation(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'no_reg' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'minat_jurusan' => 'required'
        ]);
    }

    public function store(Request $request)
    {
        $this->validation($request);

        

        Registrasi::create([
            'user_id' => $request->user_id,
            'no_reg' => $request->no_reg,
            'nama' => $request->nama,
            'jk' => $request->jk,
            'agama' => $request->agama,
            'alamat' => $request->alamat,
            'asal_sekolah' => $request->asal_sekolah,
            'minat_jurusan' => $request->minat_jurusan,
        ]);

        return redirect('/home')->with('toast_success', 'Data berhasil diinput!');
    }

    public function info()
    {
        $data = Registrasi::where('user_id', '=', Auth::user()->id)->get();
        return view('daftar.info', compact('data'));
    }

    public function print($id)
    {
        $data = Registrasi::find($id);
        $pdf = PDF::loadview('pendaftar.print', compact('data'))->setPaper('A4','portrait');
        return $pdf->stream();
    }
}
