@extends('layouts.admin.app')
@section('title', 'Dashboard')

@section('content_header')
<h1>Beranda</h1>
@stop

@section('content')
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <?php if ($role == "admin"): ?>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-user"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Semua Staff</span>
              <span class="info-box-number">
                {{$staf}}
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Perijinan</span>
              <span class="info-box-number">{{$perijinan}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-4">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Presensi Bulan 
                <?php 
                function tgl_indo($val){
                  $bulan = array (
                    1 =>   'Januari',
                    'Februari',
                    'Maret',
                    'April',
                    'Mei',
                    'Juni',
                    'Juli',
                    'Agustus',
                    'September',
                    'Oktober',
                    'November',
                    'Desember'
                  );

                  return $bulan[(int)$val];
                }

                echo tgl_indo(date('m')); ?>
              </span>
              <span class="info-box-number">{{$presensi}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      <?php else : ?>
        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Perijinan</span>
              <span class="info-box-number">{{$perijinan}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <div class="col-12 col-sm-6 col-md-6">
          <div class="info-box mb-3">
            <span class="info-box-icon bg-success elevation-1"><i class="fas fa-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Presensi</span>
              <span class="info-box-number">{{$presensi}}</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      <?php endif ?>
      </div>
      <!-- /.row -->
      @stop

      @section('css')
      <link rel="stylesheet" href="/css/admin_custom.css">
      @stop
