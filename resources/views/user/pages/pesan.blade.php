@extends('user.master')
@section('content')
  <div class="col-md-3"></div>
  <div class=" col-md-6 col-xs-12">
    <div class="box box-info">
    <div class="box-header">
      <h3 class="box-title">Paket Ipsum</h3>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
            <div class="durasi">10 Bulan Penayangan</div>
            <div class="desc">
                Lorem ipsum dolor, sit amet consectetur adipisicing elit.
                Deserunt id dolorum sit dolores, ducimus dolor nemo pariatur 
                reprehenderit fuga beatae voluptate cumque dicta fugiat quis 
                consectetur eos accusantium libero magni!
            </div>
            <form action="">
            <div class="form-group">
                <label>Mulai penayangan</label>
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
                </div>
                <label>Akhir penayangan</label>
                <div class="input-group">
                    <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" id="datepicker">
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
      autoclose: true
    })
</script>
@endsection
