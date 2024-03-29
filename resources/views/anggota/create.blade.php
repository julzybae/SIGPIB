@extends('layouts.main')

@section('title', 'Anggota')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Anggota</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item"><a href="{{route('anggota.index')}}">Data Anggota</a></li>
        <li class="breadcrumb-item active">Tambah Data Anggota</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card card-default">
            <div class="card-header d-flex">
                <h3 class="card-title">Form Tambah Anggota</h3>
            </div>

            <form action="{{route('anggota.simpan')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <!-- Kolom Kiri -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="kode_anggota">Kode Anggota <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control" name="kode_anggota" id="kode_anggota" value="{{ $kodeAnggota }}" readonly>
                            </div>

                            <div class="form-group">
                                <label for="nama">Nama Lengkap <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" id="nama" placeholder="Masukkan Nama Lengkap" value="{{ old('nama') }}">
                                @error('nama')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Jenis Kelamin <b style="color:Tomato;">*</b></label>
                                <br>
                                <input type="radio" name="jk" value="Laki-laki" @if (old('jk') == "Laki-laki") {{ 'checked' }} @endif> Laki-laki
                                &nbsp;
                                <input type="radio" name="jk" value="Perempuan" @if (old('jk') == "Perempuan") {{ 'checked' }} @endif> Perempuan
                                <br>
                                @error('jk')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="form-group col-6">
                                    <label for="tempat_lahir">Tempat Lahir <b style="color:Tomato;">*</b></label>
                                    <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir" value="{{ old('tempat_lahir') }}">
                                    @error('tempat_lahir')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>

                                <div class="form-group col-6">
                                    <label>Tanggal Lahir <b style="color:Tomato;">*</b></label>
                                    <input type="date" name="tgl_lahir" id="tgl_lahir" class="form-control @error('tgl_lahir') is-invalid @enderror" value="{{ old('tgl_lahir') }}">
                                    @error('tgl_lahir')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="no_hp">Nomor Handphone <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone" value="{{ old('no_hp') }}" onkeypress="return isNumberKey(event)">
                                @error('no_hp')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="pekerjaan">Pekerjaan <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan" id="pekerjaan" placeholder="Masukkan Pekerjaan" value="{{ old('pekerjaan') }}">
                                @error('pekerjaan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Apakah anggota ini kepala keluarga? <b style="color:Tomato;">*</b></label>
                                <br>
                                <input type="radio" name="sts_keluarga" value="Ya" @if (old('sts_keluarga') == "Ya") {{ 'checked' }} @endif> Ya
                                &nbsp;
                                <input type="radio" name="sts_keluarga" value="Tidak" @if (old('sts_keluarga') == "Tidak") {{ 'checked' }} @endif> Tidak
                                <br>
                                @error('sts_keluarga')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Akte Kelahiran </label>
                                <small style="color:Tomato;"><em>Unggah akte kelahiran maksimal ukuran file 2mb</em></small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('akte_lahir') is-invalid @enderror" id="customFile" name="akte_lahir">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                @error('akte_lahir')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Surat Baptis </label>
                                <small style="color:Tomato;"><em>Unggah surat baptis maksimal ukuran file 2mb</em></small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('srt_baptis') is-invalid @enderror" id="customFile" name="srt_baptis">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                @error('srt_baptis')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label>Surat Sidi </label>
                                <small style="color:Tomato;"><em>Unggah surat sidi maksimal ukuran file 2mb</em></small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('srt_sidi') is-invalid @enderror" id="customFile" name="srt_sidi">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                @error('srt_sidi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Surat Atestasi </label>
                                <small style="color:Tomato;"><em>Unggah surat atestasi maksimal ukuran file 2mb</em></small>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input @error('srt_atestasi') is-invalid @enderror" id="customFile" name="srt_atestasi">
                                    <label class="custom-file-label" for="customFile">Pilih file</label>
                                </div>
                                @error('srt_atestasi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="provinsi">Provinsi <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" id="provinsi"  placeholder="Masukkan Provinsi" value="{{ old('provinsi') }}">
                                @error('provinsi')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="kabupaten">Kota/Kabupaten <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" id="kabupaten"  placeholder="Masukkan Kabupaten" value="{{ old('kabupaten') }}">
                                @error('kabupaten')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kecamatan <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" id="kecamatan"  placeholder="Masukkan Kecamatan" value="{{ old('kecamatan') }}">
                                @error('kecamatan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Kelurahan/Desa <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" id="kelurahan"  placeholder="Masukkan Kelurahan" value="{{ old('kelurahan') }}">
                                @error('kelurahan')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="alamat">Alamat <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat"  placeholder="Masukkan Alamat" value="{{ old('alamat') }}">
                                @error('alamat')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Golongan Darah <b style="color:Tomato;">*</b></label>
                                <br>
                                <input type="radio" name="goldar" value="A" @if (old('goldar') == "A") {{ 'checked' }} @endif> A
                                &nbsp;
                                <input type="radio" name="goldar" value="B" @if (old('goldar') == "B") {{ 'checked' }} @endif> B
                                &nbsp;
                                <input type="radio" name="goldar" value="O" @if (old('goldar') == "O") {{ 'checked' }} @endif> O
                                &nbsp;
                                <input type="radio" name="goldar" value="AB" @if (old('goldar') == "AB") {{ 'checked' }} @endif> AB
                                <br>
                                @error('goldar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Gambar</label>
                                <small style="color:Tomato;"><em>Unggah gambar dengan format jpg/jpeg/png dan maksimal ukuran gambar 2mb</em></small>
                                <div class="col-md-12">
                                    <img id="preview" class="product" width="150" height="150"/>
                                    <div class="input-group my-3">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" id="imgInp" name="gambar" accept="image/*">
                                            <label class="custom-file-label" for="customFile">Pilih file</label>
                                        </div>
                                    </div>
                                </div>
                                @error('gambar')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary" > Simpan</button>
                    <button type="reset" class="btn btn-secondary float-right">Reset</button>
                    <a href="{{route('anggota.index')}}" class="btn btn-default">Kembali</a>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

</div>
@endsection
