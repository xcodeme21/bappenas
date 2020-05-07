<!DOCTYPE html>
<html dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="{{ asset('public/img/favicon.ico') }}" type="image/x-icon">
    <link rel="icon" href="{{ asset('public/img/favicon.ico') }}" type="image/x-icon">    
    <title>Aplikasi Disposisi Surat Menyurat</title>
    <link href="{{ asset('public/dist/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    <div class="main-wrapper">
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(public/assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="{{ asset('public/img/logo.png') }}" alt="logo" width="30%" /></span>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            @include('flash::message')
                            {{ Form::open(['route'=>'masuk', 'class'=>'form-horizontal mt-3','id'=>'']) }} 
						    {{ Form::token() }}
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    {{ Form::text('email', old('email'), [ 'class'=>'form-control form-control-lg', 'id'=>'email', 'placeholder'=>'Masukkan Email...', 'required']) }}  
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
									{{ Form::password('password',  [ 'class'=>'form-control form-control-lg', 'id'=>'password', 'placeholder'=>'Masukkan Password...', 'required', ' autocomplete'=>'off']) }}  
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-key"></i></span>
                                    </div>
								    {{ Form::number('captcha', '', [ 'class'=>'form-control form-control-lg', 'id'=>'', 'placeholder'=>'Masukkan Kode Keamanan...', 'required']) }}   
                                </div>
                                <div class="form-group text-center">
									<div class="col-xs-12 login-input"> 									
										<p id="captcha">{!! captcha_img() !!}</p>
										<p><a href="#" id="refreshcaptcha"><span class="fa fa-refresh fa-spin"></span> Refresh</a></p>
									</div> 
								</div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 pb-3">
                                        <button class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('public/assets/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/popper.js/dist/umd/popper.min.js') }}"></script>
    <script src="{{ asset('public/assets/libs/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('public/js/jquery.validate.min.js') }}"></script>
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>

    <script>
        $('#refreshcaptcha').click(function() { 
            var token = '{!! csrf_token() !!}';
            var request = 1;
            $.post('{{ url("/reloadcaptcha") }}', {_token:token, request:request}, function(e) {
                    $('#captcha').fadeIn('slow').html(e);
            });
        });
    </script>
    <script>
    $('div.alert').not('.alert-important').delay(3000).fadeOut(350);
    </script>
</body>

</html>