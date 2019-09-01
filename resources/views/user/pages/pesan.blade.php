@extends('user.master')
@section('content')
  <div class="col-md-3"></div>
  <div class=" col-md-6 col-xs-12">
    <div class="box box-info">
    <div class="box-header">
      <h3  class="box-title">{{ $paket->nama }}</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
            <div class="durasi">{{ $paket->durasi }} hari</div>
            <div class="desc">
                Paket Start {{ \Carbon\Carbon::parse($paket->starShow)->format('d-m-Y') }}<br>
                Paket End {{ \Carbon\Carbon::parse($paket->endShow)->format('d-m-Y') }}<br>
                Harga Paket {{ $paket->harga }}
            </div>
            <form action="{{ route('pesanStore', $paket->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="harga" value="{{ $paket->harga }}">
            <div class="form-group">
                <label>Mulai penayangan</label>
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker" name="startShow" autocomplete="off">
                </div>
                @if($errors->has('startShow'))
                <div class="text-danger">
                    {{ $errors->first('startShow')}}
                </div>
                @endif
                <label>Akhir penayangan</label>
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker2" name="endShow" autocomplete="off">
                </div>
                @if($errors->has('endShow'))
                <div class="text-danger">
                    {{ $errors->first('endShow')}}
                </div>
                @endif
                </div>
                <!-- /.form group -->
                <button type="submit" class="btn btn-info">Pesan</button>
            </form>
            </div>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
@endsection

@section('js')
<!-- date-range-picker -->
<script src="{{asset('bower_components/moment/min/moment.min.js')}}"></script>
<script src="{{asset('bower_components/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<!-- bootstrap datepicker -->
<script src="{{asset('bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
<script>
  $(function () {
    //Date range picker
    $('#reservation').daterangepicker()
     })
         //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      orientation: "bottom"
    })
    $('#datepicker2').datepicker({
      autoclose: true,
      format: 'dd-mm-yyyy',
      orientation: "bottom"
    })
    
</script>
@endsection
