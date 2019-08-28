@extends('admin.master')

@section('content')
<div class="row">
<div class="col-xs-12">
<div class="box box-danger">
    <div class="box-header">
      <div class="column">
        <div class="col-md-10">
            <section class="content-header" style="padding : 0;">
                <h1>
                    Add Data Master Player
                  <small>Form data master player</small>
                </h1>
              </section>
          {{-- <h1 class="box-title">Hover Data Table</h1> --}}
        </div>
        {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
      </div>
    </div>
    <!-- /.box-header -->
    <div class="box-body">
    <form action={{url('/admin')}}>
        <div class="form-group">
        <label for="player">Kode player</label>
        <input type="text" class="form-control" placeholder="Kode Player">
        </div>
        <div class="form-group">
            <label for="player">Kode player</label>
            <input type="text" class="form-control" placeholder="Kode Player">
        </div>
        <div class="form-group">
            <label for="player">Kode player</label>
            <input type="text" class="form-control" placeholder="Kode Player">
        </div>
        <div class="form-group">
            <label for="player">Kode player</label>
            <input type="text" class="form-control" placeholder="Kode Player">
        </div>
        <div class="form-group">
        <a href="{{url('/admin/player/master-player')}}"><button  type="button" class="btn btn-block btn-danger">Tabmbah Data</button></a>
        </div>    
    </form>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
</div>
@endsection

@section('js')
@endsection