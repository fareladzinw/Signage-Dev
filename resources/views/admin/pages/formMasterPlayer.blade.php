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
                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{$errors->first('nama')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">Lokasi Player</label>
                <input name="lokasi" type="text" class="form-control" placeholder="Lokasi">
                @if($errors->has('lokasi'))
                    <div class="text-danger">
                        {{$errors->first('lokasi')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">KEYPLAYER</label>
                <input name="keyplayer" type="text" class="form-control" placeholder="KeyPlayer">
                @if($errors->has('keyplayer'))
                    <div class="text-danger">
                        {{$errors->first('keyplayer')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">Password</label>
                <input name="password" type="text" class="form-control" placeholder="Password">
                @if($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('password')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">Spesifikasi</label>
                <input name="spesifikasi" type="text" class="form-control" placeholder="Spesifikasi">
                @if($errors->has('spesifikasi'))
                    <div class="text-danger">
                        {{$errors->first('spesifikasi')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-danger btn-block btn-flat">Tambah Data</button>
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
        <form action="{{ route('editPlayer', $id)}}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label for="player">Nama Player</label>
                <input type="text" class="form-control" name="nama" value={{$p->nama}}>
                @if($errors->has('nama'))
                    <div class="text-danger">
                        {{$errors->first('nama')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">Lokasi Player</label>
                <input type="text" class="form-control" name="lokasi" value={{$p->lokasi}}>
                @if($errors->has('lokasi'))
                    <div class="text-danger">
                        {{$errors->first('lokasi')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">KEY PLAYER</label>
                <input type="text" class="form-control" name="keyplayer" value={{$p->KEYPLAYER}}>
                @if($errors->has('keyplayer'))
                    <div class="text-danger">
                        {{$errors->first('keyplayer')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">Password</label>
                <input type="text" class="form-control" name="password" value={{$p->PASSWORD}}>
                @if($errors->has('password'))
                    <div class="text-danger">
                        {{$errors->first('password')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
                <label for="player">Spesifikasi</label>
                <input type="text" class="form-control" name="spesifikasi" value={{$p->spesifikasi}}>
                @if($errors->has('spesifikasi'))
                    <div class="text-danger">
                        {{$errors->first('spesifikasi')}}
                    </div>
                @endif
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-block btn-danger">Edit Data</button>
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