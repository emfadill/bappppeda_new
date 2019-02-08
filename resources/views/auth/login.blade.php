<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="{{asset('admin/plugins/images/logo_bpd.ico')}}">
<title>LOGIN</title>
<!-- Bootstrap Core CSS -->
<link href="{{asset('admin/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
<!-- animation CSS -->
<link href="{{asset('admin/css/animate.css')}}" rel="stylesheet">
<!-- Custom CSS -->
<link href="{{asset('admin/css/style.css')}}" rel="stylesheet">
<!-- color CSS -->
<link href="{{asset('admin/css/colors/blue.css')}}" id="theme"  rel="stylesheet">
<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
<!-- Preloader -->
<div class="preloader">
  <div class="cssload-speeding-wheel"></div>
</div>
<section id="wrapper" class="login-register">
  <div class="login-box">
    <div class="white-box">
      <form class="form-horizontal form-material"  action="{{ route('login')}}" method="POST">
        @csrf
        <a href="javascript:void(0)" class="text-center db"><img src="{{asset('admin/plugins/images/logo-bappppeda.png')}}" alt="Home" /><br/>{{--<img src="{{asset('admin/plugins/images/pixeladmin-text-dark.png')}}" alt="Home" /></a>--}}<b>BAPPPPEDA</b>
            <br><span>Kabupaten Sumedang</span>
        <div class="form-group ">
          <div class="col-xs-12">
            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" type="text" placeholder="Username" name="email" value="{{ old('email') }}" required autofocus>
             @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
          </div>
        </div>
        <div class="form-group">
          <div class="col-xs-12">
            <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password" required="" id="password" placeholder="Password" name="password">
           @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif

          </div>
        </div>
        <div class="form-group">
          <div class="col-md-12">
            <div class="checkbox checkbox-primary pull-right p-t-0">
              <input id="checkbox-signup" type="checkbox">
              <label for="checkbox-signup"> Ingat Password </label>
            </div>
             </div>
        </div>
        <div class="form-group text-center m-t-20">
          <div class="col-xs-12">
            <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">LOGIN</button>
          </div>
        </div>
       
      </form>
      
    </div>
  </div>
</section>
<!-- jQuery -->
<script src="{{asset('admin/plugins/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap Core JavaScript -->
<script src="{{asset('admin/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- Menu Plugin JavaScript -->
<script src="{{asset('admin/plugins/bower_components/sidebar-nav/dist/sidebar-nav.min.js')}}"></script>

<!--slimscroll JavaScript -->
<script src="{{asset('admin/js/jquery.slimscroll.js')}}"></script>
<!--Wave Effects -->
<script src="{{asset('admin/js/waves.js')}}"></script>
<!-- Custom Theme JavaScript -->
<script src="{{asset('admin/js/custom.min.js')}}"></script>
<!--Style Switcher -->
<script src="{{asset('admin/plugins/bower_components/styleswitcher/jQuery.style.switcher.js')}}"></script>
</body>
</html>
