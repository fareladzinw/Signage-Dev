@extends('admin.master')

@section('content')
@if (empty($id))
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
        <form action="{{ route('storePlayer') }}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="player">Nama Player</label>
                <input name="nama" type="text" class="form-control" placeholder="Nama">
            </div>
            <div class="form-group">
                <label for="player">Lokasi Player</label>
                <input name="lokasi" type="text" class="form-control" placeholder="Lokasi">
            </div>
            <div class="form-group">
                <label for="player">KEYPLAYER</label>
                <input name="keyplayer" type="text" class="form-control" placeholder="KeyPlayer">
            </div>
            <div class="form-group">
                <label for="player">Password</label>
                <input name="password" type="text" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="player">Spesifikasi</label>
                <input name="spesifikasi" type="text" class="form-control" placeholder="Spesifikasi">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-block btn-danger" value="Tambah Data">
            </div>
        </form>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
    </div>


@elseif(!empty($id))
<div class="row">
    <div class="col-xs-12">
    <div class="box box-danger">
        <div class="box-header">
          <div class="column">
            <div class="col-md-10">
                <section class="content-header" style="padding : 0;">
                    <h1>
                        Edit Master Player
                      <small>Form data master player</small>
                    </h1>
                  </section>
              {{-- <h1 class="box-title">Hover Data Table</h1> --}}
            </div>
            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
          </div>
        </div>
        <!-- /.box-header -->
        @foreach($player as $p)
        <div class="box-body">
        <form action={{url('/admin')}}>
            <div class="form-group">
            <label for="player">Nama Player</label>
            <input type="text" class="form-control" value={{$p->nama}}>
            </div>
            <div class="form-group">
                <label for="player">Lokasi Player</label>
                <input type="text" class="form-control" value={{$p->lokasi}}>
            </div>
            <div class="form-group">
                <label for="player">KEY PLAYER</label>
                <input type="text" class="form-control" value={{$p->KEYPLAYER}}>
            </div>
            <div class="form-group">
                <label for="player">Password</label>
                <input type="text" class="form-control" value={{$p->PASSWORD}}>
            </div>
            <div class="form-group">
                <label for="player">Spesifikasi</label>
                <input type="text" class="form-control" value={{$p->spesifikasi}}>
            </div>
            <div class="form-group">
            <a href="{{url('/admin/player/master-player')}}"><button  type="button" class="btn btn-block btn-danger">Edit Data</button></a>
            </div>
            @endforeach
        </form>
    </div>
    <!-- /.box-body -->
    </div>
    <!-- /.box -->
    </div>
    </div>
@endif

@endsection

@section('js')
@endsection