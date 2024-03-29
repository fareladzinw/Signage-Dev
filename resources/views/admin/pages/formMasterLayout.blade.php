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
                                        Add Data Master Layout
                                        <small>Form data master Layout</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('storeLayout') }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <label for="player">Nama Layout</label>
                                <input name="nama" type="text" class="form-control" placeholder="Nama">
                                @if($errors->has('nama'))
                                    <div class="text-danger">
                                        {{$errors->first('nama')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="player">Width</label>
                                <input name="width" type="text" class="form-control" placeholder="Width">
                                @if($errors->has('width'))
                                    <div class="text-danger">
                                        {{$errors->first('width')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="player">Height</label>
                                <input name="height" type="text" class="form-control" placeholder="Height">
                                @if($errors->has('height'))
                                    <div class="text-danger">
                                        {{$errors->first('height')}}
                                    </div>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="player">Status Fullscreen</label>
                                {{--<input name="statusFullscreen" type="text" class="form-control" placeholder="Status Fullscreen">--}}
                                <select class="form-control" name="statusFullscreen">
                                  <option value="1">1</option>
                                  <option value="0">0</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="player">Orientation</label>
                                {{--<input name="orientation" type="text" class="form-control" placeholder="Orientation">--}}
                                <select class="form-control" name="orientation">
                                  <option value="landscape">Landscape</option>
                                  <option value="potrait">Potrait</option>
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
                                        Edit Master Layout
                                        <small>Form data master Layout</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @foreach($layout as $l)
                        <div class="box-body">
                            <form action={{ route('editLayout', $id)}} method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="player">Nama Layout</label>
                                    <input type="text" class="form-control" name="nama" value={{$l->nama}}>
                                    @if($errors->has('nama'))
                                        <div class="text-danger">
                                            {{$errors->first('nama')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">Width</label>
                                    <input type="text" class="form-control" name="width" value={{$l->width}}>
                                    @if($errors->has('width'))
                                        <div class="text-danger">
                                            {{$errors->first('width')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">Height</label>
                                    <input type="text" class="form-control" name="height" value={{$l->height}}>
                                    @if($errors->has('height'))
                                        <div class="text-danger">
                                            {{$errors->first('height')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">Status Fullscreen</label>
                                    <select class="form-control" name="statusFullscreen">
                                        @if($l->statusFullscreen == 0)
                                        <option value="0">Off</option>
                                        <option value="1">On</option>
                                        @elseif($l->statusFullscreen == 1)
                                        <option value="1">On</option>
                                        <option value="0">Off</option>
                                        @endif
                                        
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="player">Orientation</label>
                                    <select class="form-control" name="orientation">
                                        @if($l->orientation == 'landscape')
                                        <option value="landscape">Landscape</option>
                                        <option value="potrait">Potrait</option>
                                        @elseif($l->orientation == 'potrait')
                                        <option value="potrait">Potrait</option>
                                        <option value="landscape">Landscape</option>
                                        @endif
                                    </select>
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