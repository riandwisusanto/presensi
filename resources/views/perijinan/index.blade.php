@extends('layouts.admin.app')
@section('title', 'Perijinan')


@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Leave Request
                </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item">
                    <a href="/ijin">
                        Leave Request
                    </a>
                    </li>
                </ol>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                    <h3 class="card-title">Form Ijin</h3>
                    </div>
                    <form id="perijinan" method="post" action="{{ url('/ijin/upload')}}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- <input type="hidden" name="_token" value="NW510iUo2rUvT6fBz6ZU5ni3E3i5I671zX3ZSaUr">           -->
                    <div class="card-body">
                        <div class="form-group">
                            <label for="department">Izin</label>
                            <select id="izin" name="izin" class="form-control select2 select2-primary" data-dropdown-css-class="select2-primary" required>
                                <option value="Dinas" selected>Dinas</option>
                                <option value="Pribadi" >Pribadi</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Awal</label>
                                    <div class="input-group date">
                                        <input id="tanggal_awal" type="date" name="tanggal_awal" class="form-control datetimepicker-input" data-target="#reservationdate" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tanggal Akhir</label>
                                    <div class="input-group date">
                                        <input id="tanggal_akhir" type="date" name="tanggal_akhir" class="form-control datetimepicker-input" data-target="#reservationdate" required="">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Jam </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="far fa-clock"></i></span>
                                        </div>
                                        <input type="text" name="jam" class="form-control float-right " id="jam" value="00:00 - 00:00" disabled="">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tujuan</label>
                            <input type="text" class="form-control " id="tujuan" name="tujuan" placeholder="Tujuan" value="">
                        </div>
                        <div class="form-group">
                            <label>Keterangan</label>
                            <textarea class="form-control " rows="3" id="note" name="note" placeholder="Tulis Keterangan"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button id="submit_btn" type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="card card-primary card-outline">
  <div class="card-body box-profile">

    <h3 class="profile-username text-center">Riwayat Perijinan</h3>
    <div class="row">
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-info elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Diijinkan</span>
              <span class="info-box-number">
                {{$ijin['diijinkan']}}
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Menunggu</span>
              <span class="info-box-number">
                {{$ijin['menunggu']}}
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Ditolak</span>
              <span class="info-box-number">
                {{$ijin['ditolak']}}
              </span>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-6 col-md-3">
          <div class="info-box">
            <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-envelope"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Expired</span>
              <span class="info-box-number">
                {{$ijin['expired']}}
              </span>
            </div>
          </div>
        </div>
    </div>
    <div class="col-lg-12 mt-5">
    <table class="table table-bordered">
      <thead>
          <tr>
              <th>No</th>
              <th>Izin</th>
              <th>Tanggal Awal</th>
              <th>Tanggal Akhir</th>
              <th>Jam</th>
              <th>Tujuan</th>
              <th>Status</th>
              <th>Keterangan</th>
          </tr>
      </thead>
      <tbody>
            @php $i = 1 @endphp
            @foreach($perijinan as $ijin)
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$ijin->izin}}</td>
                    <td>{{$ijin->tanggal_awal}}</td>
                    <td>{{$ijin->tanggal_akhir}}</td>
                    <td>{{$ijin->jam}}</td>
                    <td>{{$ijin->tujuan}}</td>
                    <td>{{$ijin->status}}</td>
                    <td>{{$ijin->note}}</td>
                </tr>
            @endforeach
      </tbody> 
    </table>
    </div>
  </div>
<!-- /.card-body -->   
 @stop

 @section('js')
 <script type="text/javascript">
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0 so need to add 1 to make it 1!
    var yyyy = today.getFullYear();
    if(dd<10){
      dd='0'+dd
    } 
    if(mm<10){
      mm='0'+mm
    } 

    today = yyyy+'-'+mm+'-'+dd;
    document.getElementById("tanggal_awal").setAttribute("min", today);

     $('input[name="tanggal_awal"]').on("change", function() {
        var value = $(this).val();
        var spl = value.split('-');
        var d = new Date(parseInt(spl[0]), parseInt(spl[1]) + 1, 0);
        var e = d.toString().split(' ');
        $('#tanggal_akhir').attr('min', value);
        $.ajax({
            url: '/tanggal_ijin/'+value,
            type: 'get',
            dataType: 'json',
            success: function(data){
                if(data.data_ijin == 1)
                    $("#submit_btn").attr('disabled', '');
                else
                    $("#submit_btn").removeAttr('disabled');

                var max_get_date = parseInt(spl[2]) + data.ijin_pribadi;
                var max_get_month = Number(parseInt(spl[1]));

                if(max_get_date > parseInt(e[2])){
                    max_get_month = max_get_month + 1;
                    max_get_date = max_get_date - parseInt(e[2]);
                }

                if(max_get_month > 12){
                    max_get_month = 1;
                    spl[0] = "" + (parseInt(spl[0]) + 1);
                }

                if(max_get_month < 9)
                    spl[1] = "0" + max_get_month;
                else
                    spl[1] = "" + max_get_month;

                if(max_get_date < 9)
                    spl[2] = "0" + max_get_date;
                else
                    spl[2] = "" + max_get_date;

                $('#tanggal_akhir').attr('max', spl.join('-'));
            }
        });
     });

     $('input[name="tanggal_akhir"]').on("change", function() {
        const date1 = new Date($(this).val());
        const date2 = new Date($('#tanggal_awal').val());
        const diffTime = Math.abs(date2 - date1);
        const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));

        if(diffDays == 0)
            $('#jam').removeAttr('disabled');
        else{
            $('#jam').attr('disabled', '');
            $('#jam').val('00:00 - 00:00');
        }
     });

     $('input[name="jam"]').on("change", function() {
        var newValue = $(this).val().split(":");
        var endValue = newValue[1].split(" - ");

        var maxJam  = Number(parseInt(newValue[0]) + 4);
        var maxMenit = parseInt(newValue[2]);

        if(Number(parseInt(endValue[1])) > maxJam){
            maxJam = maxJam;
        }
        else{
            maxJam = Number(parseInt(endValue[1]));
        }

        var sMenit = Math.abs(Number(parseInt(endValue[0]) - parseInt(newValue[2])));
        if(maxJam > Number(parseInt(newValue[0]) + 2) && sMenit > 0){
            if(maxJam > Number(parseInt(newValue[0]) + 3))
                maxJam   = maxJam - 1;
            maxMenit = 60 - Number(parseInt(endValue[0]));
        }

        var tMaxJam   = ""+maxJam;
        var tMaxMenit = ""+maxMenit;
        if(maxJam < 10){
            tMaxJam = "0"+maxJam;
        }
        if(maxMenit < 10){
            tMaxMenit = "0"+maxMenit;
        }
        
        $(this).val(newValue[0]+":"+endValue[0]+" - "+tMaxJam+":"+tMaxMenit);
     });
 </script>
 @stop