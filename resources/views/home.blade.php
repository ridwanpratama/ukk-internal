@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('PPDB SMK Merdeka Belajar') }}</div>
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @if (auth()->user()->level == 'Pendaftar')
                                <?php
                                $if_null = App\Registrasi::where('user_id', '=', Auth::user()->id)->first();
                                if (is_null($if_null)) { ?>
                                <li class="list-group-item"><a href="{{ route('daftar.index') }}"> Daftar Baru</a></li>
                                <?php } else { ?>
                                <li class="list-group-item"><a href="#"> Anda sudah terdaftar</a></li>
                                <?php }
                                ?>
                                <li class="list-group-item"><a href="{{ route('daftar.info') }}"> Data Saya</a></li>
                            @endif

                            @if (auth()->user()->level == 'Admin')
                                <li class="list-group-item"><a href="{{ route('pendaftar.index') }}"> Pendaftar</a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
