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
            {{ method_field('POST') }}
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
                <input name="KEYPLAYER" type="text" class="form-control" placeholder="KeyPlayer">
            </div>
            <div class="form-group">
                <label for="player">Password</label>
                <input name="PASSWORD" type="text" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
                <label for="player">Spesifikasi</label>
                <input name="spesifikasi" type="text" class="form-control" placeholder="Spesifikasi">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block btn-flat">Tambah Data</button>
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
        <form action={{ route('editPlayer', $id)}} method="post">
            {{csrf_field()}}
            <div class="form-group">
            <label for="player">Nama Player</label>
            <input type="text" class="form-control" name="nama" value={{$p->nama}}>
            </div>
            <div class="form-group">
                <label for="player">Lokasi Player</label>
                <input type="text" class="form-control" name="lokasi" value={{$p->lokasi}}>
            </div>
            <div class="form-group">
                <label for="player">KEY PLAYER</label>
                <input type="text" class="form-control" name="keyplayer" value={{$p->KEYPLAYER}}>
            </div>
            <div class="form-group">
                <label for="player">Password</label>
                <input type="text" class="form-control" name="password" value={{$p->PASSWORD}}>
            </div>
            <div class="form-group">
                <label for="player">Spesifikasi</label>
                <input type="text" class="form-control" name="spesifikasi" value={{$p->spesifikasi}}>
            </div>
            <div class="form-group">
            <button  type="submit" class="btn btn-block btn-danger">Edit Data</button>
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