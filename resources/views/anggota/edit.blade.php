@extends('layouts.main')

@section('title', 'Anggota')

@section('breadcrumb')

    <div class="col-sm-6">
        <!-- <h1 class="m-0">Anggota</h1> -->
    </div><!-- /.col -->

    <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('anggota.index') }}">Data Anggota</a></li>
            <li class="breadcrumb-item active">Ubah Data Anggota</li>
        </ol>
    </div><!-- /.col -->

@endsection

@section('content')

    <div class="row">

        <div class="col-md-12">

            <div class="card card-default">
                <div class="card-header d-flex">
                    <h3 class="card-title">Form Ubah Anggota</h3>
                </div>

                <form action="{{ route('anggota.simpan_perbarui', ['id' => $anggota->id]) }}" method="POST"
                    enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{ method_field('put') }}
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <!-- Kolom Kiri -->
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="kode_anggota">Kode Anggota <b style="color:Tomato;">*</b></label>
                                    <input type="text" class="form-control" name="kode_anggota" id="kode_anggota"
                                        value="{{ $anggota->kode_anggota }}" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="nama">Nama Lengkap <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control @error('nama') is-invalid @enderror" name="nama"
                                        id="nama" placeholder="Masukkan Nama Lengkap"
                                        value="{{ old('nama', $anggota->nama) }}">
                                    @error('nama')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin <b style="color:Tomato;">*</b></label>
                                    <br>
                                    <input type="radio" name="jk" value="Laki-laki"
                                        @php if(($anggota->jk)=='Laki-laki') echo 'checked' @endphp> Laki-laki
                                    &nbsp;
                                    <input type="radio" name="jk" value="Perempuan"
                                        @php if(($anggota->jk)=='Perempuan') echo 'checked' @endphp> Perempuan
                                    <br>
                                    @error('jk')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="row">

                                    <div class="form-group col-6">
                                        <label for="tempat_lahir">Tempat Lahir <b style="color:Tomato;">*</b></label>
                                        <input type="text"
                                            class="form-control @error('tempat_lahir') is-invalid @enderror"
                                            name="tempat_lahir" id="tempat_lahir" placeholder="Masukkan Tempat Lahir"
                                            value="{{ old('tempat_lahir', $anggota->tempat_lahir) }}">
                                        @error('tempat_lahir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-6">
                                        <label>Tanggal Lahir <b style="color:Tomato;">*</b></label>
                                        <div>
                                            <input type="date" name="tgl_lahir" id="tgl_lahir"
                                                class="form-control @error('tgl_lahir') is-invalid @enderror"
                                                value="{{ old('tgl_lahir', $anggota->tgl_lahir) }}">
                                        </div>
                                        @error('tgl_lahir')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                </div>

                                <div class="form-group">
                                    <label for="no_hp">Nomor Handphone <b style="color:Tomato;">*</b></label>
                                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror"
                                        name="no_hp" id="no_hp" placeholder="Masukkan Nomor Handphone"
                                        value="{{ old('no_hp', $anggota->no_hp) }}" onkeypress="return isNumberKey(event)">
                                    @error('no_hp')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="pekerjaan">Pekerjaan <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control @error('pekerjaan') is-invalid @enderror" name="pekerjaan"
                                        id="pekerjaan" placeholder="Masukkan Pekerjaan"
                                        value="{{ old('pekerjaan', $anggota->pekerjaan) }}">
                                    @error('pekerjaan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Apakah anggota ini kepala keluarga? <b style="color:Tomato;">*</b></label>
                                    <br>
                                    <input type="radio" name="sts_keluarga" value="Ya"
                                        @php if(($anggota->sts_keluarga)=='Ya') echo 'checked' @endphp> Ya
                                    &nbsp;
                                    <input type="radio" name="sts_keluarga" value="Tidak"
                                        @php if(($anggota->sts_keluarga)=='Tidak') echo 'checked' @endphp> Tidak
                                    <br>
                                    @error('sts_keluarga')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Akte Kelahiran </label>
                                    <small style="color:Tomato;"><em>Unggah akte kelahiran maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('akte_lahir') is-invalid @enderror"
                                            id="customFile" name="akte_lahir">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    @error('akte_lahir')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($anggota->akte_lahir != null)
                                        <a target="_blank"
                                            href="{{ asset('storage/dokumen/akte/' . $anggota->akte_lahir) }}">
                                            Lihat file lama
                                        </a>
                                    @else
                                        <em><small style="color:Tomato;">Akte kelahiran belum di unggah!</small></em>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Surat Baptis </label>
                                    <small style="color:Tomato;"><em>Unggah surat baptis maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('srt_baptis') is-invalid @enderror"
                                            id="customFile" name="srt_baptis">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    @error('srt_baptis')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($anggota->srt_baptis != null)
                                        <a target="_blank"
                                            href="{{ asset('storage/dokumen/baptis/' . $anggota->srt_baptis) }}">
                                            Lihat file lama
                                        </a>
                                    @else
                                        <em><small style="color:Tomato;">Surat baptis belum di unggah!</small></em>
                                    @endif
                                </div>


                                <div class="form-group">
                                    <label>Surat Sidi </label>
                                    <small style="color:Tomato;"><em>Unggah surat sidi maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('srt_sidi') is-invalid @enderror"
                                            id="customFile" name="srt_sidi">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    @error('srt_sidi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($anggota->srt_sidi != null)
                                        <a target="_blank"
                                            href="{{ asset('storage/dokumen/sidi/' . $anggota->srt_sidi) }}">
                                            Lihat file lama
                                        </a>
                                    @else
                                        <em><small style="color:Tomato;">Surat sidi belum di unggah!</small></em>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label>Surat Atestasi </label>
                                    <small style="color:Tomato;"><em>Unggah surat atestasi maksimal ukuran file
                                            2mb</em></small>
                                    <div class="custom-file">
                                        <input type="file"
                                            class="custom-file-input @error('srt_atestasi') is-invalid @enderror"
                                            id="customFile" name="srt_atestasi">
                                        <label class="custom-file-label" for="customFile">Pilih file</label>
                                    </div>
                                    @error('srt_atestasi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    @if ($anggota->srt_atestasi != null)
                                        <a target="_blank"
                                            href="{{ asset('storage/dokumen/atestasi/' . $anggota->srt_atestasi) }}">
                                            Lihat file lama
                                        </a>
                                    @else
                                        <em><small style="color:Tomato;">Surat atestasi belum di unggah!</small></em>
                                    @endif
                                </div>

                            </div>

                            <!-- Kolom Kanan -->
                            <div class="col-md-6">

                                <div class="form-group">
                                    <label for="provinsi">Provinsi <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control @error('provinsi') is-invalid @enderror" name="provinsi"
                                        id="provinsi" placeholder="Masukkan Provinsi"
                                        value="{{ old('provinsi', $anggota->provinsi) }}">
                                    @error('provinsi')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kabupaten">Kota/Kabupaten <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten"
                                        id="kabupaten" placeholder="Masukkan Kabupaten"
                                        value="{{ old('kabupaten', $anggota->kabupaten) }}">
                                    @error('kabupaten')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kecamatan">Kecamatan <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan"
                                        id="kecamatan" placeholder="Masukkan Kecamatan"
                                        value="{{ old('kecamatan', $anggota->kecamatan) }}">
                                    @error('kecamatan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kelurahan">Kelurahan/Desa <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan"
                                        id="kelurahan" placeholder="Masukkan Kelurahan"
                                        value="{{ old('kelurahan', $anggota->kelurahan) }}">
                                    @error('kelurahan')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="alamat">Alamat <b style="color:Tomato;">*</b></label>
                                    <input type="text"
                                        class="form-control @error('alamat') is-invalid @enderror" name="alamat"
                                        id="alamat" placeholder="Masukkan Alamat"
                                        value="{{ old('alamat', $anggota->alamat) }}">
                                    @error('alamat')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Golongan Darah <b style="color:Tomato;">*</b></label>
                                    <br>
                                    <input type="radio" name="goldar" value="A"
                                        @php if(($anggota->goldar)=='A') echo 'checked' @endphp> A
                                    &nbsp;
                                    <input type="radio" name="goldar" value="B"
                                        @php if(($anggota->goldar)=='B') echo 'checked' @endphp> B
                                    &nbsp;
                                    <input type="radio" name="goldar" value="O"
                                        @php if(($anggota->goldar)=='O') echo 'checked' @endphp> O
                                    &nbsp;
                                    <input type="radio" name="goldar" value="AB"
                                        @php if(($anggota->goldar)=='AB') echo 'checked' @endphp> AB
                                    <br>
                                    @error('goldar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label>Gambar</label>
                                    <small style="color:Tomato;"><em>Unggah gambar dengan format jpg/jpeg/png dan maksimal
                                            ukuran gambar 2mb</em></small>
                                    <div class="col-md-12">
                                        <img id="preview" class="product" width="150" height="150"
                                            src="{{ asset('storage/images/anggota/' . $anggota->gambar) }}" />
                                        <div class="input-group my-3">
                                            <div class="custom-file">
                                                <input type="file"
                                                    class="custom-file-input @error('gambar') is-invalid @enderror"
                                                    id="imgInp" name="gambar" accept="image/*">
                                                <label class="custom-file-label" for="customFile">Pilih file</label>
                                            </div>
                                        </div>
                                    </div>
                                    @error('gambar')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror

                                </div>

                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary"> Simpan</button>
                        <a href="{{ route('anggota.tampil_detail', ['id' => $anggota->id]) }}" class="btn btn-default">Kembali</a>
                    </div>

                </form>
            </div>
            <!-- /.card -->
        </div>

    </div>

@endsection
