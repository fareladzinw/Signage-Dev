<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Signage | Sign Up</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="bower_components/admin-lte/dist/css/AdminLTE.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="bower_components/admin-lte/plugins/iCheck/square/blue.css">
      
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
      </head>
<body class="hold-transition register-page">
    <div class="register-box">
        <div class="register-logo" style="margin-top: -20%;">
            <a href="../../index2.html"><b>Signage</b>DEV</a>
        </div>
        
        <div class="register-box-body">
            <p class="login-box-msg">Register a new membership</p>
        
            <form action="{{ route('postRegister') }}" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <div class="form-group has-feedback">
                <input type="text" class="form-control" placeholder="Full name" name="name"> 
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
                @if($errors->has('name'))
                <div class="text-danger">
                    {{ $errors->first('name')}}
                </div>
                @endif
            </div>
            <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Alamat" name="alamat">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if($errors->has('alamat'))
                    <div class="text-danger">
                        {{ $errors->first('alamat')}}
                    </div>
                    @endif
            </div>
            <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Nomer Hp" name="hp">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if($errors->has('hp'))
                    <div class="text-danger">
                        {{ $errors->first('hp')}}
                    </div>
                    @endif
            </div>
            <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Username" name="username">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                    @if($errors->has('username'))
                    <div class="text-danger">
                        {{ $errors->first('username')}}
                    </div>
                    @endif
            </div>
            <div class="form-group has-feedback">
                <input type="email" class="form-control" placeholder="Email" name="email">
                <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                @if($errors->has('email'))
                <div class="text-danger">
                    {{ $errors->first('email')}}
                </div>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Password" name="password">
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                @if($errors->has('password'))
                <div class="text-danger">
                    {{ $errors->first('password')}}
                </div>
                @endif
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" placeholder="Retype password" name="repassword">
                <span class="glyphicon glyphicon-log-in form-control-feedback"></span>
                @if($errors->has('repassword'))
                <div class="text-danger">
                    {{ $errors->first('repassword')}}
                </div>
                @endif
            </div>
            <div class="form-group has-feedback">
                    <input type="text" class="form-control" placeholder="Kode Afiliasi" name="linkAfiliasi">
                    <span class="glyphicon glyphicon-ok form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-8">
                <div class="checkbox icheck">
                    <label>
                    <input type="checkbox" required> I agree to the <a href="#">terms</a>
                    </label>
                </div>
                </div>
                <!-- /.col -->
                <div class="col-xs-4">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
                </div>
                <!-- /.col -->
            </div>
            </form>        
            <a href="{{ route('login') }}" class="text-center">I already have a membership</a>
        </div>
        <!-- /.form-box -->
        </div>
    <!-- /.register-box -->
</body>
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
</html>