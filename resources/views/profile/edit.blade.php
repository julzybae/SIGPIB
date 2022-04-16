@extends('layouts.main')

@section('title', 'Profile')

@section('breadcrumb')

<div class="col-sm-6">
    <!-- <h1 class="m-0">Profile</h1> -->
</div><!-- /.col -->

<div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Dashboard</a></li>
        <li class="breadcrumb-item active">Ubah Profile</li>
    </ol>
</div><!-- /.col -->

@endsection

@section('content')

<div class="row">

    <div class="col-md-12">

        <div class="card card-dark">
            <div class="card-header d-flex justify-content-center">
                <h3 class="card-title"><strong>Form Ubah Profile</strong></h3>
            </div>

            <form action="{{ route('profile.simpan_perbarui') }}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{ method_field('put') }}
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <!-- Kolom Kiri -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label for="name">Nama Pengguna <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" value="{{ old('name', $profile->name) }}" autocomplete="name" placeholder="Masukkan Nama Pengguna">
                                @error('name')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="email">Email <b style="color:Tomato;">*</b></label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" value="{{ old('email', $profile->email) }}" autocomplete="email" autofocus placeholder="Masukkan Email">
                                @error('email')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="username">Username <b style="color:Tomato;">*</b></label>
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" id="username" value="{{ old('username', $profile->username) }}" autocomplete="username" autofocus placeholder="Masukkan Username">
                                @error('username')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password">Password <b style="color:Tomato;">*</b></label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" autocomplete="password" autofocus placeholder="Masukkan Password">
                                @error('password')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password_confirmation">Konfirmasi Password <b style="color:Tomato;">*</b></label>
                                <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" id="password_confirmation" autocomplete="password_confirmation" autofocus placeholder="Masukkan Konfirmasi Password">
                                @error('password_confirmation')
                                <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>

                        </div>

                        <!-- Kolom Kanan -->
                        <div class="col-md-6">

                            <div class="form-group">
                                <label>Gambar</label>
                                <small style="color:Tomato;"><em>Unggah gambar dengan format jpg/jpeg/png dan maksimal ukuran gambar 2mb</em></small>
                                <div class="col-md-12">
                                    @if (Auth::user()->gambar)
                                    <img id="preview" class="product" width="150" height="150" src="{{ asset('storage/images/pengguna/'.$profile->gambar) }}"/>
                                    @elseif(Auth::user()->gambar == null)
                                    <img id="preview" class="product" width="150" height="150" src="{{ asset('images/pengguna/default.png') }}"/>
                                    @endif
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
                    <button type="submit" class="btn btn-dark">Simpan</button>
                    <a href="{{route('dashboard')}}" class="btn btn-default">Kembali</a>
                </div>

            </form>
        </div>
        <!-- /.card -->
    </div>

</div>

@endsection
