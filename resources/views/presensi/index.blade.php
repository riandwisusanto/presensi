@extends('layouts.admin.app')
@section('title', 'Presensi')

@section('content')

    <section class="content-header">
      <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>
                Presence
              </h1>
            </div>
          </div>
      </div>
    </section>

    <section class="content">
      <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <div id="warning" class="alert alert-warning alert-dismissible d-none">
                <h5><i class="icon fas fa-info"></i> Perhatian</h5>
                <span id="xx"></span>
                <ul class="nav">
                  <li class="nav-item">
                    <a class="nav-link" id="infoLocations" href="#"data-toggle="modal" data-target="#info"></a>
                  </li>
                </ul>
              </div>
              <div class="modal fade" id="info">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">Daftar Lokasi</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                      </button>
                    </div>
                    <div class="modal-body p-0">
                      <table class="table table-hover table-sm">
                        <thead>
                          <tr>
                            <th>Posisi</th>
                            <th>Koordinat</th>
                          </tr>
                        </thead>
                        <tbody>
                            <tr>
                              <td>Rumahku</td>
                              <td><a href="https://www.google.com/maps/place/Jawa+Timur/@-6.9039901,111.3380089,7z/" target="_blank">rumah</a></td>
                            </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button onclick="getLocation()" type="button" class="btn btn-success" data-dismiss="modal">Refresh</button>
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-3">
              <div class="card card-primary card-outline">
                <div class="card-body box-profile">
                  <h3 class="profile-username text-center">{{$user->name}}</h3>
                  <!--<li><button onclick="getLocation()">Cek</button></li> -->
                  <p class="text-muted text-center">{{ $info['status']}}</p>

                  <form id="presensi" method="post" action="{{ url('/absen')}}" enctype="multipart/form-data">
                          {{ csrf_field() }}
                          <ul class="list-group list-group-unbordered mb-3">
                            <li class="list-group-item">
                              <b>NIP</b> <a class="float-right">{{$user->nip}}</a>
                            </li>
                            <li class="list-group-item">
                              <b>Date</b> 
                              <a class="float-right">
                                <?php
                                  echo date('d-m-Y');
                                ?>
                              </a>
                            </li>
                            <li class="list-group-item">
                              <b>Time</b> <a class="float-right" id="clock">
                              <?php
                                echo date('H:i:s');
                              ?>
                              </a>
                            </li>
                            <li class="list-group-item">
                              <b>Location</b> <a class="float-right" id="tampilkan"></a>
                              <input type="hidden" name="latitude">
                              <input type="hidden" name="longitude">
                            </li>
                            <?php if ($info['btnOut'] == ''): ?>
                              <li class="list-group-item form-group">
                                <div class="custom-file">
                                   <label for="file_upload" style="font-size:12px;" class="custom-file-label">Foto bukti pekerjaan</label>
                                    <input type="file" class="custom-file-input form-control" name="file" id="file_upload" accept="image/*" required="">   
                                </div> 
                              </li>
                            <?php elseif($info['btnIn'] == ''): ?>
                              <li class="list-group-item form-group">
                                <textarea name="rencana" class="form-control" rows="3" placeholder="Rencana pekerjaan" required=""></textarea>
                              </li>
                            <?php endif ?>
                          </ul>
                          <hr>
                          <div class="col-lg-12 mr-1">
                            <button type="submit" class="btn btn-primary btn-block" name="btnIn" {{$info['btnIn']}}>IN</button>
                            <button type="submit" class="btn btn-primary btn-block" name="btnOut" {{$info['btnOut']}}>OUT</button>
                          </div>
                  </form>
                </div>
                <!-- <div id="loading" class="overlay"><i class="fas fa-2x fa-sync-alt fa-spin"></i></div> -->
              </div>
            </div>
            <div class="col-md-9">
              <div class="card card-primary card-outline">
                <div class="card-header">
                  <h3 class="card-title">Attendance log</h3>
                </div>
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover table-sm table-nowarp">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Time Out</th>
                            <th>Plan</th>
                            <th>Evidence</th>
                            <th>Location</th>
                        </tr>
                    </thead>
                      <tbody>
                          @forelse($data_absen as $absen)
                              <tr>
                                  <td>{{$absen->date}}</td>
                                  <td>{{$absen->time_in}}</td>
                                  <td>{{$absen->time_out}}</td>
                                  <td>{{$absen->rencana}}</td>
                                  <td>
                                    <?php if ($absen->bukti != ""): ?>
                                      <a href="{{url('bukti_pekerjaan/'.$absen->bukti)}}" target="_blank">
                                        <img src="{{url('bukti_pekerjaan/'.$absen->bukti)}}" width="30px"></a>
                                    <?php endif ?>
                                  </td>
                                  <td>
                                    <?php foreach($lokasi as $lok){
                                      if($absen->id_lokasi == $lok->id)
                                        echo $lok->latitude." ".$lok->longitude;
                                    } ?>
                                  </td>
                              </tr>
                          @empty
                              <tr>
                                  <td colspan="4"><b><center>TIDAK ADA DATA UNTUK DITAMPILKAN</center></b></td>
                              </tr>
                          @endforelse
                      </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </section>
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
  <script>
    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
    var view = document.getElementById("tampilkan");
      if (navigator.geolocation) {
          navigator.geolocation.getCurrentPosition(showPosition);
      } else {
          view.innerHTML = "Yah browsernya ngga support Geolocation bro!";
      }
     function showPosition(position) {
        var latitude  = position.coords.latitude;
        var longitude = position.coords.longitude;
        view.innerHTML = latitude+" "+longitude;
        $("input[name='latitude']").val(latitude);
        $("input[name='longitude']").val(longitude);

     }
  </script>
@stop
