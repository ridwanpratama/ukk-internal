<?php

namespace App\Http\Controllers;

use App\Registrasi;
use PDF;
use Illuminate\Http\Request;

class PendaftarController extends Controller
{
    public function index()
    {
        $pendaftar = Registrasi::orderBy('created_at','DESC')->paginate(5);
        return view('pendaftar.index', compact('pendaftar'))
            ->with('i',(request()->input('page', 1) - 1) * 5);
    }

    public function validation(Request $request)
    {
        $request->validate([
            'no_reg' => 'required',
            'nama' => 'required',
            'jk' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'asal_sekolah' => 'required',
            'minat_jurusan' => 'required'
        ]);
    }

    public function edit($id)
    {
        $pendaftar = Registrasi::findorFail($id);
        return view('pendaftar.edit',compact('pendaftar'));
    }

    public function update(Request $request, $id)
    {
        $this->validation($request);
        $pendaftar = Registrasi::findorFail($id);
        $pendaftar->update($request->all());
        return redirect('pendaftar')->with('toast_success', 'Data berhasil diubah!');
    }

    public function destroy($id)
    {
        $pendaftar = Registrasi::findorFail($id);
        $pendaftar->delete();
        return back()->with('toast_warning', 'Data berhasil dihapus!');
    }

    public function print($id)
    {
        $data = Registrasi::find($id);
        $pdf = PDF::loadview('pendaftar.print', compact('data'))->setPaper('A4','portrait');
        return $pdf->stream();
    }
}
