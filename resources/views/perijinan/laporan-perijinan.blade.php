@extends('layouts.admin.app')
@section('title', 'Rekapitulasi Perijinan')

@section('content')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Rekapitulasi Perijinan</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Rekapitulasi Perijinan</li>
        </ol>
        </div>
    </div>
    </div><!-- /.container-fluid -->
</section>

<div class="container-fluid">
	    <!-- DataTales Example -->
    <div class="card shadow mb-4" style="font-size:12px;"> 
        <div class="card-body">
            <div align="center">
                <h5></h5>
            </div>
            <br>
    <!-- DataTales Example -->
			<div class="row">
				<div class="container">
					<div class="col-sm-12">
						<div class="card-box">
							<div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="label">Tanggal Awal</label>
                                        <input type="date" name="tglawal" id="tglawal" class="form-control"/>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="label">Tanggal Akhir</label>
                                        <input type="date" name="tglakhir" id="tglakhir" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-md-2 pull-right">
                                            <a href="#" onclick="this.href='/perijinan/laporan/cetak/'+ document.getElementById('tglawal').value +
									            '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-warning btn-rounded btn-fw"><b><i class="fa fa-print"></i> Cetak PDF</a></b>
                                        </div>
                                        <div class="col-md-2 pull-right">
                                            <a href="/perijinan/laporan/cetak-ijin" target="_blank" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-print"></i> Cetak Full PDF</a></b>
                                        </div>
                                    </div>
                                    <br> 
                                    <br>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- /.container-fluid -->
</div>

<div class="card card-primary card-outline">
  <div class="card-body box-profile">

    <h3 class="profile-username text-center">Riwayat Perijinan</h3>
    <div class="col-lg-12 mt-5">
    <table class="table table-bordered">
      <thead>
          <tr>
              <th>No</th>
              <th>NIP</th>
              <th>Pegawai</th>
              <th>Izin</th>
              <th>Tanggal</th>
              <th>Jam</th>
              <th>Tujuan</th>
              <th>Keterangan</th>
              <th>Validasi</th>
          </tr>
      </thead>
      <tbody>
            @php $i = 1 @endphp
            @foreach($perijinan as $ijin)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$ijin->user['nip']}}</td>
                    <td>{{$ijin->user['name']}}</td>
                    <td>{{$ijin->izin}}</td>
                    <td>{{$ijin->tanggal}}</td>
                    <td>{{$ijin->jam}}</td>
                    <td>{{$ijin->tujuan}}</td>
                    <td>{{$ijin->note}}</td>
                    <form action="{{url('/ijin/update/'.$ijin->id)}}" method="post">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="{{$ijin->id}}" value="{{ $ijin->id }}"> <br/>
                        <td style="text-align: center; font-size: 10px;">
                            @csrf
                                <select class="form-control" style="text-align: center; font-size: 12px;" tabindex="-1" id="status" name="status">
                                    <option class="btn-danger"  value selected="selected">{{$ijin->status}}</option>
                                    
                                    <hr>
                                    <option value="DiIjinkan" class="btn-danger">Di Izinkan</option>
                                    <option value="DiTolak">Di Tolak</option>
                                </select>
                        </td>
                        <td>
                            <input class="btn-sm btn-success" type="submit" value="✔">
                        </td> 
                    </form>  
                </tr>
            @endforeach
      </tbody> 
    </table>
    </div>
  </div>
<!-- /.card-body -->       

</div>
<!-- /.card -->

@stop

@section('css')
<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
@stop

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.js"></script>
	<!-- Code to handle taking the snapshot and displaying it locally -->
@stop