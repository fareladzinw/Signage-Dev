@extends('user.master')
@section('content')
  <div class="col-md-2"></div>
  <div class=" col-md-8 col-xs-12">
    <div class="box box-info">
    <h1 style="text-align: center;">Pemesanan Paket</h1>
    <div class="box-body">
            <form action="{{ route('pesanStore', $paket->id) }}" method="post">
            <label for="">Nama Paket</label>
            <input type="text" class="form-control" value="{{ $paket->nama }}" readonly>
            <label for="">Durasi Paket</label>
            <input type="text" class="form-control" value="{{ $paket->durasi }} hari" readonly>
            <label for="">Harga Paket</label>
            <input type="text" class="form-control" value="Rp. {{ number_format($paket->harga,2,',','.') }}" readonly>
            {{ csrf_field() }}
            {{ method_field('POST') }}
            <input type="hidden" name="harga" value="{{ $paket->harga }}">
            <div class="form-group">
                <label>Tanggal mulai penayangan</label>
                <div class="form-group">
                    <input type="text" id="datepicker" class="form-control" name="startShow" autocomplete="off">
                    @if($errors->has('startShow'))
                    <div class="text-danger">
                        {{ $errors->first('startShow')}}
                    </div>
                    @endif
                </div>
                </div>
                <!-- /.form group -->
                <button type="submit" class="btn btn-info btn-block">Klik Untuk Lakukan Pemesanan</button>
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
