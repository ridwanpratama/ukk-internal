@extends('layouts.app')
@push('style')
    <style>
        th{
            cursor: pointer;
        }
    </style>
@endpush
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">{{ __('Data Pendaftar') }}

                    </div>
                    <div class="card-body">
                        <a href="/" class="btn btn-secondary btn-sm mb-2">Back</a>
                        <div class="input-group mb-3">
                            <input id="myInput" type="text" onkeyup="searchData()" placeholder="Cari..." class="form-control">
                          </div>
                        <table class="table table-striped" id="myTable">
                            <thead>
                              <tr>
                                <th scope="col">#</th>
                                <th scope="col">No Registrasi</th>
                                <th scope="col">Nama</th>
                                <th scope="col">JK</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Agama</th>
                                <th scope="col">Asal Sekolah</th>
                                <th scope="col">Minat Jurusan</th>
                                <th scope="col">Action</th>
                              </tr>
                            </thead>
                            <tbody>
                                @foreach ($pendaftar as $item)
                              <tr>
                                <th scope="row">{{ ++$i }}</th>
                                <td>{{ $item->no_reg }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->jk }}</td>
                                <td>{{ $item->alamat }}</td>
                                <td>{{ $item->agama }}</td>
                                <td>{{ $item->asal_sekolah }}</td>
                                <td>{{ $item->minat_jurusan }}</td>
                                <td>
                                    <form action="{{ route('pendaftar.destroy', $item->id) }}" method="post">
                                        @csrf
                                        <a href="{{ route('pendaftar.print', $item->id) }}" class="btn btn-info btn-sm my-1 text-white" target="_blank">Print</a>
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus data?')">Hapus</button>
                                        <a href="{{ route('pendaftar.edit', $item->id) }}" class="btn btn-warning btn-sm mt-1">Ubah</a>
                                    </form>
                                </td>
                              </tr>
                              @endforeach
                            </tbody>
                          </table>
                          {{ $pendaftar->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('script')
  <script src="{{ asset('js/searchsort.js') }}"></script>
@endpush
