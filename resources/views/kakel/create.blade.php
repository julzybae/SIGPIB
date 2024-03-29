@extends('layouts.main')

@section('title', 'Kartu Keluarga')

@section('breadcrumb')

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Kartu Keluarga</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('kakel.index') }}">Data Kartu Keluarga</a></li>
            <li class="breadcrumb-item active">Tambah Data Kartu Keluarga</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')

    <div class="row d-flex justify-content-center">
        <div class="col-md-8">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Tambah Data Kartu Keluarga</h3>
                </div>
                <!-- /.card-header -->

                <!-- form start -->
                <form action="{{ route('kakel.simpan') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">

                        <div class="form-group">
                            <label>Kepala Keluarga <b style="color:Tomato;">*</b></label>
                            <select class="form-control select2bs4 @error('id_anggota') is-invalid @enderror"
                                name="id_anggota" style="width: 100%;">
                                <option hidden disabled selected value>Pilih Kepala Keluarga</option>
                                @foreach ($anggota as $data)
                                    @if ($data->sts_keluarga == 'Ya')
                                        <option value="{{ $data->id }}"
                                            {{ old('id_anggota') == $data->id ? 'selected' : '' }}>{{ $data->kode_anggota }}
                                            - {{ $data->nama }}
                                        </option>
                                    @endif
                                @endforeach
                            </select>
                            @error('id_anggota')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Sektor Wilayah <b style="color:Tomato;">*</b></label>
                            <select class="form-control select2bs4 @error('id_sekwil') is-invalid @enderror"
                                name="id_sekwil" style="width: 100%;">
                                <option hidden disabled selected value>Pilih Sektor Wilayah</option>
                                @foreach ($sekwil as $data)
                                    <option value="{{ $data->id }}"
                                        {{ old('id_sekwil') == $data->id ? 'selected' : '' }}>{{ $data->nama_sekwil }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_sekwil')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="form-group col-6">
                                <label for="tempat_nikah">Tempat Pernikahan <b style="color:Tomato;">*</b></label>
                                <input type="text"
                                    class="form-control @error('tempat_nikah') is-invalid @enderror" name="tempat_nikah"
                                    id="tempat_nikah" placeholder="Masukkan Tempat Pernikahan"
                                    value="{{ old('tempat_nikah') }}">
                                @error('tempat_nikah')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-6">
                                <label>Tanggal Pernikahan <b style="color:Tomato;">*</b></label>
                                <input type="date" name="tgl_nikah" id="tgl_nikah"
                                    class="form-control @error('tgl_nikah') is-invalid @enderror"
                                    value="{{ old('tgl_nikah') }}">
                                @error('tgl_nikah')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Kartu Keluarga </label>
                            <small style="color:Tomato;"><em>Unggah kartu keluarga maksimal ukuran file 2mb</em></small>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('srt_kk') is-invalid @enderror"
                                    id="customFile" name="srt_kk">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                            @error('srt_kk')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Surat Nikah Gereja </label>
                            <small style="color:Tomato;"><em>Unggah surat nikah gereja maksimal ukuran file 2mb</em></small>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('srt_gereja') is-invalid @enderror"
                                    id="customFile" name="srt_gereja">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                            @error('srt_gereja')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Surat Nikah Catatan Sipil</label>
                            <small style="color:Tomato;"><em>Unggah surat nikah catatan sipil maksimal ukuran file
                                    2mb</em></small>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input @error('srt_sipil') is-invalid @enderror"
                                    id="customFile" name="srt_sipil">
                                <label class="custom-file-label" for="customFile">Pilih file</label>
                            </div>
                            @error('srt_sipil')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="{{ route('kakel.index') }}" class="btn btn-default">Kembali</a>
                    </div>
                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

@endsection
