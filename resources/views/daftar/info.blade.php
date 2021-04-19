@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('PPDB SMK Merdeka Belajar') }}</div>

                    <div class="card-body">
                        @forelse ($data as $item)
                            <p><b>No Register:</b> {{ $item->no_reg }}</p>
                            <p><b>Nama:</b> {{ $item->nama }}</p>
                            <p><b>Jenis kelamin:</b> {{ $item->jk }}</p>
                            <p><b>Alamat:</b> {{ $item->alamat }}</p>
                            <p><b>Asal Sekolah:</b> {{ $item->asal_sekolah }}</p>
                            <p><b>Agama:</b> {{ $item->agama }}</p>
                            <p><b>Minat:</b> {{ $item->minat_jurusan }}</p>
                            <a href="{{ route('daftar.print', $item->id) }}" target="_blank" class="btn btn-secondary btn-sm">Print</a>
                        @empty
                            <p>Anda belum terdaftar</p>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
