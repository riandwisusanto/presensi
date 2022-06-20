@extends('layouts.admin.app')
@section('title', 'Rekapitulasi Staff')

@section('content')

<section class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1>Rekapitulasi Staff</h1>
        </div>
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="/">Home</a></li>
            <li class="breadcrumb-item active">Staff</li>
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
                                            <a href="#" onclick="this.href='/staff/laporan/cetak/'+ document.getElementById('tglawal').value +
									            '/' + document.getElementById('tglakhir').value" target="_blank" class="btn btn-warning btn-rounded btn-fw"><b><i class="fa fa-print"></i> Cetak PDF</a></b>
                                        </div>
                                        <div class="col-md-2 pull-right">
                                            <a href="/staff/laporan/cetak" target="_blank" class="btn btn-primary btn-rounded btn-fw"><b><i class="fa fa-print"></i> Cetak Full PDF</a></b>
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
    <h3 class="profile-username text-center">Riwayat Staff</h3>
    <div class="col-lg-12 mt-5">
        <div class="row">
            <div class="d-sm-flex align-items-center justify-content-between mb-4" align="right">
                <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"  data-toggle='modal' data-target='#custom-width-modal' ><i class="fa fa-plus"></i> </a>
            </div>
        </div>
    </div>
    <div class="card-body table-responsive p-0">
                  <table class="table table-hover table-sm table-nowarp">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Alamat</th>
                            <th>Jabatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                            @php $i = 1 @endphp
                            @foreach($staf as $staff)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$staff->nip}}</td>
                                    <td>{{$staff->nama}}</td>
                                    <td>{{$staff->email}}</td>
                                    <td>{{$staff->alamat}}</td>
                                    <td>{{$staff->jabatan}}</td>
                                    <td>
                                            <form action="{{ url('/staff/laporan/'.$staff->id) }}" method="post" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <button class="btn btn-danger" onclick="return confirm('Apakah anda yakin akan menghapus nya?');"><i class="fa fa-trash"></i> </button>
                                            </form>
                                    </td>
                                </tr>
                            @endforeach
                    </tbody>
                  </table>
                </div>
  </div>
</div>

<div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
                <div class="modal-header">
                    <h6 class="modal-title">Tambah Data</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                </div>
            <div class="modal-body">
                <form action="{{url('/staff/update')}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="form-group" >
                        <label for="field-3" class="control-label">NIP</label>
                        <input type="number" class="form-control" id="nip" name="nip" required="required" placeholder="Example: 12546578">
                    </div>
                    <div class="form-group" >
                        <label for="field-3" class="control-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" required="required" placeholder="Example: Vika Nor Azizah">
                    </div>
                   
                    <div class="form-group" >
                        <label for="field-3" class="control-label">Email</label>
                        <input type="email" class="form-control" id="email" name="email" required="required" placeholder="Example: azizah17@gmail.com">
                    </div>
                    <div class="form-group" >
                        <label for="field-3" class="control-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required="required" placeholder="Example: Jln. Sri Widodo Rt/Rw:12/04">
                    </div>
                    <div class="form-group" >
                        <label for="field-3" class="control-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" required="required">
                    </div>
                    <div class="form-group" >
                        <label for="field-3" class="control-label">Jabatan</label>
                        <input type="text" class="form-control" id="jabatan" name="jabatan" required="required" placeholder="Example: Dosen/Staf">
                    </div>
                    <div class="model-footer" style="text-align:right;">
                        <button type="submit" class="btn-sm btn-success waves-effect waves-light">Save</button>
                        <button type="submit" class="btn-sm btn-danger waves-effect waves-light" data-dismiss="modal">Close</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



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

    <script type="text/javascript">
        function readURL() {
            var input = this;
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(input).prev().attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $(function () {
            $(".uploads").change(readURL)
            $("#f").submit(function(){
                // do ajax submit or just classic form submit
              //  alert("fake subminting")
                return false
            })
        })
    </script>

@stop