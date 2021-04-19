@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Daftar Baru') }}</div>
                    <div class="card-body">
                        <form action="{{ route('daftar.store') }}" method="POST">
                            @csrf
                            <input type="hidden" value="{{ Auth()->user()->id }}" name="user_id">

                            <div class="form-group">
                                <label for="no_reg">No Registrasi</label>
                                <input type="number" class="form-control" id="no_reg" name="no_reg" @error('no_reg')
                                    placeholder="{{ $message }}"
                                @enderror>
                              </div>

                              <div class="form-group">
                                <label for="nama">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama" @error('nama')
                                    placeholder="{{ $message }}"
                                @enderror>
                              </div>

                              <div class="form-group">
                                  <label for="jk">Jenis Kelamin</label>
                                  <select class="form-control" id="jk" name="jk">
                                      <option disable>Pilih Jenis Kelamin</option>
                                      <option value="Laki-laki">Laki-laki</option>
                                      <option value="Perempuan">Perempuan</option>
                                  </select>
                                </div>

                                <div class="form-group">
                                    <label for="agama">Agama</label>
                                    <select class="form-control" id="agama" name="agama">
                                        <option disable>Pilih Agama</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Protestan">Protestan</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                  </div>

                              <div class="form-group">
                                  <label for="alamat">Alamat</label>
                                  <textarea class="form-control" id="alamat" name="alamat" @error('alamat')
                                      placeholder="{{ $message }}"
                                  @enderror></textarea>
                              </div>

                              <div class="form-group">
                                  <label for="asal_sekolah">Asal Sekolah</label>
                                  <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" @error('asal_sekolah')
                                      placeholder="{{ $message }}"
                                  @enderror>
                              </div>

                              <div class="form-group">
                                <label for="minat_jurusan">Minat Jurusan</label>
                                <select class="form-control" id="minat_jurusan" name="minat_jurusan">
                                    <option disable>Pilih Minat Jurusan</option>
                                    <option value="Rekayasa Perangkat Lunak">Rekayasa Perangkat Lunak</option>
                                    <option value="Tata Boga">Tata Boga</option>
                                    <option value="Tata Busana">Tata Busana</option>
                                    <option value="Multimedia">Multimedia</option>
                                </select>
                              </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                          </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
