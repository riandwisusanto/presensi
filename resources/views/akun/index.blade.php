@extends('layouts.admin.app')
@section('title', 'Profil')

@section('js')
<script type="text/javascript">

    $(".custom-file-input").on("change", function() {
      var fileName = $(this).val().split("\\").pop();
      $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
      var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function (e) {
                $("#file_preview").attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    });

    $("input[name='password']").change(function (){
        if($("input[name='password']").val() != ""){
            $("input[name='password_confirmation']").attr("required", "");
        }
        else{
            $("input[name='password_confirmation']").removeAttr("required");
            $('#notif_confirm_false').text("");
            $('#notif_confirm_true').text("");
            $('#submit_btn').removeAttr("disabled");
        }
    });

    $("input[name='password_confirmation']").change(function (){
        var pass_baru = $("input[name='password']").val();
        var pass_conf = $("input[name='password_confirmation']").val();
        if(pass_conf != "" && pass_baru != ""){
            if(pass_conf != pass_baru){
                $('#submit_btn').attr("disabled", "");
                $('#notif_confirm_false').text("Password tidak sama");
                $('#notif_confirm_true').text("");
                $("input[name='password_confirmation']").attr('autofocus', '');
            }
            else{
                $('#submit_btn').removeAttr("disabled");
                $('#submit_btn').attr("autofocus", "");
                $("input[name='password_confirmation']").removeAttr("autofocus");
                $('#notif_confirm_false').text("");
                $('#notif_confirm_true').text("Password sama");
            }
        }
    });
</script>
@stop

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>
                    Profile
                </h1>
            </div>
        </div>
    </div>
</section>


<section class="content">
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-md-4">    
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="text-center">
                        <img class="profile-user-img img-fluid img-circle"  alt="User profile picture" @if($user->file) src="{{ asset('gambar_user/'.$user->file) }}" @endif> 
                        </div>

                        <h3 class="profile-username text-center">{{$user->name}}</h3>

                        <p class="text-muted text-center"></p>

                        <ul class="list-group list-group-unbordered mb-3">
                        <li class="list-group-item">
                            <b>NIP</b> <a class="float-right">{{$user->nip}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Jabatan</b> <a class="float-right">{{$user->jabatan}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Alamat</b> <a class="float-right">{{$user->alamat}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Tanggal Lahir</b> <a class="float-right">{{$user->tanggal_lahir}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Phone</b> <a class="float-right">{{$user->no_telp}}</a>
                        </li>
                        <li class="list-group-item">
                            <b>Email</b> <a class="float-right">{{$user->email}}</a>
                        </li>
                        </ul>
                    </div>
                </div>
            </div>

 <div class="col-md-8">
                <div class="card card-primary card-outline">
                    <div class="card-body box-profile">
                        <div class="col-sm-6">
                            <h5>
                                Edit Profile
                            </h5>
                        </div>
                        <h3 class="profile-username text-center"></h3>
                        <p class="text-muted text-center"></p>
                            <form method="POST" class="mt-3" action="{{ url('profile/update') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group row">
                                    <div class="col-lg-2">
                                        <img id="file_preview" width="100%" @if($user->file) src="{{ asset('gambar_user/'.$user->file) }}" @endif />
                                    </div>

                                    <div class="col-lg-10">
                                        <label for="file_upload" style="font-size:14px;">{{ __('Foto') }}</label>
                                        <div class="custom-file">
                                           <label for="file_upload" style="font-size:14px;" class="custom-file-label">Choose File</label>
                                            <input type="file" class="custom-file-input form-control" name="file" id="file_upload" accept="image/*">   
                                        </div>              
                                    </div>

                                </div>

                                <div class="form-group row">
                                    <label for="nip" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('NIP') }}</label>

                                    <div class="col-md-10">
                                        <input style="font-size:12px;" id="nip" type="text" class="form-control @error('nip') is-invalid @enderror" name="nip" value="{{$user->nip}}" required autocomplete="nip" disabled="">

                                        @error('nip')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="jabatan" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('Jabatan') }}</label>

                                    <div class="col-md-10">
                                        <input style="font-size:12px;" id="jabatan" type="text" class="form-control @error('jabatan') is-invalid @enderror" name="jabatan" value="{{$user->jabatan}}" required autocomplete="jabatan" 
                                        <?php if ($user->role == "staf"): ?>
                                            disabled=""
                                        <?php endif ?>
                                        >

                                        @error('jabatan')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="tanggal_lahir" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('Tanggal lahir') }}</label>

                                    <div class="col-md-10">
                                        <input style="font-size:12px;" id="tanggal_lahir" type="date" class="form-control @error('tanggal_lahir') is-invalid @enderror" name="tanggal_lahir" value="{{$user->tanggal_lahir}}" required autocomplete="tanggal_lahir"
                                        <?php if ($user->role == "staf"): ?>
                                            disabled=""
                                        <?php endif ?>
                                        >

                                        @error('tanggal_lahir')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="name" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('Nama') }}</label>

                                    <div class="col-md-10">
                                        <input style="font-size:12px;" id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$user->name}}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="alamat" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('Alamat') }}</label>

                                    <div class="col-md-10">
                                        <input style="font-size:12px;" id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" value="{{$user->alamat}}"  required autocomplete="alamat" autofocus>

                                        @error('alamat')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="no_telp" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('No Telpon') }}</label>

                                    <div class="col-md-10">
                                        <input style="font-size:12px;" id="no_telp" type="number" class="form-control @error('no_telp') is-invalid @enderror" name="no_telp" value="{{$user->no_telp}}" required autocomplete="no_telp" autofocus>

                                        @error('no_telp')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('E-Mail') }}</label>

                                    <div class="col-md-10">
                                        <input style="font-size:12px;" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$user->email}}" required autocomplete="email">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('Password') }}</label>

                                    <div class="col-md-10">
                                        <input id="password" style="font-size:10px;"  type="password" class="form-control @error('password') is-invalid @enderror" name="password">

                                        <!-- @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror -->
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password-confirm" style="font-size:14px;" class="col-md-2 text-md-left">{{ __('Confirm') }}</label>

                                    <div class="col-md-10">
                                        <input id="password-confirm" style="font-size:10px;"  type="password" class="form-control" name="password_confirmation">

                                        <p id="notif_confirm_false" style="color:red;font-size:10pt;"></p>
                                        <p id="notif_confirm_true" style="color:green;font-size:10pt;"></p>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-2 offset-md-2">
                                        <button id="submit_btn" style="font-size:12px;  margin-top: 2%; margin-bottom: 2%; color: white;" type="submit" class="btn btn-danger form-control">
                                            {{ __('Simpan') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                    </div>
                </div>
            </div>


        </div>
    <div>
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
@stop
