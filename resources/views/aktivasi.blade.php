<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Signage | Aktivasi</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{asset('bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('bower_components/Ionicons/css/ionicons.min.css')}}">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/dist/css/skins/skin-blue.min.css')}}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{asset('bower_components/admin-lte/plugins/iCheck/square/blue.css')}}">
  <!-- CSS -->
  <link rel="stylesheet" href="{{asset('css/main.css')}}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#"><img src="{{asset('images/logo/signage.png')}}" alt="" style="width: 100%;"></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg"><b>Terimakasih!</b></p>
    <p class="login-box-msg">Kami telah mengirimkan kode ke email anda. Silahkan masukkan kode unik untuk konfirmasi</p>
    @if (\Session::has('alert-fail'))
    <div class="alert alert-danger">
      <a href="{{ route('activation') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
      <div>{{Session::get('alert-fail')}}</div>
    </div>
    @endif
    <form action="{{ route('checkActivation') }}" method="post">
    {{ csrf_field() }}
    {{ method_field('POST') }}
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Kode Aktivasi" name="kode">
        @if(!empty($user))
        <input type="text" class="form-control" name="linkAfiliasi" value="{{ $user[0]->linkAfiliasi }}">
        @endif
        <span class="glyphicon glyphicon-ok-circle form-control-feedback"></span>
        @if($errors->has('kode'))
          <div class="text-danger">
              {{ $errors->first('kode')}}
          </div>
        @endif
      </div>
      <div class="row">
        <!-- /.col -->
        <div class="col-xs-12">
          <button type="submit" class="btn btn-primary btn-block btn-flat">konfirmasi</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    {{-- <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> --}}
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 3 -->
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="bower_components/admin-lte/plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' /* optional */
    });
  });
</script>
</body>
</html>
