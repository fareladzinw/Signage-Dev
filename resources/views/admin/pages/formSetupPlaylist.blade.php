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
                                        Add Data Master Playlist
                                        <small>Form data master Playlist</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('storePlaylist') }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <div class="form-group">

                                <label for="player">Pilih Player</label>
                                <select class="form-control" name="player_id">
                                    @foreach($player as $player)
                                    <option value="{{$player -> id}}">{{$player->id}} --> {{$player->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                    <label for="player">Pilih Media</label>
                                    <select class="form-control" name="media_id">
                                        @foreach($media as $media)
                                        <option value="{{$media->id}}">{{$media->id}} --> {{$media->nama}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="player">Pilih Layout</label>
                                    <select class="form-control" name="layout_id">
                                        @foreach($layout as $layout)
                                        <option value="{{$layout->id}}">{{$layout->id}} --> {{$layout->nama}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="player">Pilih Kategori</label>
                                    <select class="form-control" name="kategori_id">
                                        @foreach($kategori as $kategori)
                                        <option value="{{$kategori->id}}">{{$kategori->id}} --> {{$kategori->nama}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                    <label for="player">Pilih Paket</label>
                                    <select class="form-control" name="paket_id">
                                        @foreach($paket as $paket)
                                        <option value="{{$paket->id}}">{{$paket->id}} --> {{$paket->nama}}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label for="player">Duration</label>
                                <input name="duration" type="text" class="form-control" placeholder="Durasi">
                                @if($errors->has('duration'))
                                    <div class="text-danger">
                                        {{$errors->first('duration')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="player">status Loop</label>
                                <select class="form-control" name="statusLoop">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="player">status Media</label>
                                <select class="form-control" name="statusMedia">
                                    <option value="0">0</option>
                                    <option value="1">1</option>
                                </select>
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
                                        Edit Master Playlist
                                        <small>Form data master Playlist</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <form action={{ route('editPlaylist', $id)}} method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                        <label for="player">Pilih Player</label>
                                        <select class="form-control" name="player_id" data-placeholder="">
                                            @foreach($player as $player)
                                            <option value="{{$player -> id}}">{{$player->id}} --> {{$player->nama}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="player">Pilih Media</label>
                                        <select class="form-control" name="media_id" data-placeholder="">
                                            @foreach($media as $media)
                                            <option value="{{$media->id}}">{{$media->id}} --> {{$media->nama}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="player">Pilih Layout</label>
                                        <select class="form-control" name="layout_id" data-placeholder="">
                                            @foreach($layout as $layout)
                                            <option value="{{$layout->id}}">{{$layout->id}} --> {{$layout->nama}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="player">Pilih Kategori</label>
                                        <select class="form-control" name="kategori_id">
                                            @foreach($kategori as $kategori)
                                            <option value="{{$kategori->id}}">{{$kategori->id}} --> {{$kategori->nama}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                <div class="form-group">
                                        <label for="player">Pilih Paket</label>
                                        <select class="form-control" name="paket_id">
                                            @foreach($paket as $paket)
                                            <option value="{{$paket->id}}">{{$paket->id}} --> {{$paket->nama}}</option>
                                            @endforeach
                                        </select>
                                </div>
                                @foreach($playlist as $p)
                                <div class="form-group">
                                    <label for="player">Duration</label>
                                    <input name="duration" type="text" class="form-control" value="{{$p->duration}}">
                                    @if($errors->has('duration'))
                                        <div class="text-danger">
                                            {{$errors->first('duration')}}
                                        </div>
                                    @endif
                                </div>
                                @endforeach
                                <div class="form-group">
                                    <label for="player">status Loop</label>
                                    <select class="form-control" name="statusLoop">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="player">status Media</label>
                                    <select class="form-control" name="statusMedia">
                                        <option value="0">0</option>
                                        <option value="1">1</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-block btn-danger">Edit Data</button>
                                </div>
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