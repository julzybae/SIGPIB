@extends('layouts.main')

@section('title', 'Dashboard')

@section('breadcrumb')

  <div class="col-sm-6">
    <!-- <h1 class="m-0">Dashboard</h1> -->
  </div><!-- /.col -->

  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div><!-- /.col -->

@endsection

@section('content')

  <h2>Selamat datang, {{Auth::user()->name}}.</h2>
  <div class="row">

          <!-- Card -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{ $anggota->count() }}</h3>
                <p>Anggota Jemaat</p>
              </div>
              <div class="icon">
                <i class="ion ion-person"></i>
              </div>
              <a href="{{ route('anggota.index') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Card -->

          <!-- Card -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>{{ $pelkat->count() }}</h3>
                <p>Pelayanan Kategorial</p>
              </div>
              <div class="icon">
                <i class="fas fa-people-group"></i>
              </div>
              <a href="{{ route('pelkat.index') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Card -->

          <!-- Card -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>{{ $sekwil->count() }}</h3>
                <p>Sektor Wilayah</p>
              </div>
              <div class="icon">
                <i class="ion ion-map"></i>
              </div>
              <a href="{{ route('sekwil.index') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Card -->

          <!-- Card -->
          <div class="col-lg-3 col-6">
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{ $kakel->count() }}</h3>
                <p>Kepala Keluarga</p>
              </div>
              <div class="icon">
                <i class="fas fa-people-roof"></i>
              </div>
              <a href="{{ route('kakel.index') }}" class="small-box-footer">Info lebih lanjut <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- Card -->
    </div>

@endsection
