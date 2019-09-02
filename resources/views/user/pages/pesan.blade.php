@extends('user.master')
@section('content')
  <div class="col-md-3"></div>
  <div class=" col-md-6 col-xs-12">
    <div class="box box-info">
    <div class="box-header">
      <h3  class="box-title">{{ $paket->nama }}</h3>
      @if (\Session::has('alert-danger'))
      <div class="alert alert-danger">
        <a href="{{ route('pesan') }}"><button type="button" class="close" data-dismiss="alert">&times;</button></a>
        <div>{{Session::get('alert-danger')}}</div>
      </div>
      @endif
    </div>
    <!-- /.box-header -->
    <div class="box-body">
            <div class="durasi">{{ $paket->durasi }} hari</div>
            <div class="desc">
                Paket Start {{ \Carbon\Carbon::parse($paket->startShow)->format('d-m-Y') }}<br>
                Paket End {{ \Carbon\Carbon::parse($paket->endShow)->format('d-m-Y') }}<br>
                Harga Paket {{ $paket->harga }}
            </div>
            <form action="{{ route('pesanStore', $paket->id) }}" method="post">
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="harga" value="{{ $paket->harga }}">
            <div class="form-group">
                <label>Mulai penayangan</label>
                <div class="form-group">
                    <select name="startShow" class="form-control">
                        <option value="">Choose Date...</option>
                        @foreach($dates as $keyD => $d)
                            @if(Carbon\Carbon::parse($d)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d')
                                ||
                                Carbon\Carbon::parse($d)->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))  
                                <option name="" value="{{ $d }}">{{ Carbon\Carbon::parse($d)->format('d-m-Y') }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('startShow'))
                    <div class="text-danger">
                        {{ $errors->first('startShow')}}
                    </div>
                </div>
                @endif
                <label>Akhir penayangan</label>
                <div class="form-group">
                    <select name="endShow" class="form-control">
                        <option value="">Choose Date...</option>
                        @foreach($dates as $keyD => $d)
                            @if(Carbon\Carbon::parse($d)->format('Y-m-d') > Carbon\Carbon::now()->format('Y-m-d')
                                ||
                                Carbon\Carbon::parse($d)->format('Y-m-d') == Carbon\Carbon::now()->format('Y-m-d'))  
                                <option name="" value="{{ $d }}">{{ Carbon\Carbon::parse($d)->format('d-m-Y') }}</option>
                            @endif
                        @endforeach
                    </select>
                    @if($errors->has('endShow'))
                    <div class="text-danger">
                        {{ $errors->first('endShow')}}
                    </div>
                    @endif
                </div>
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
