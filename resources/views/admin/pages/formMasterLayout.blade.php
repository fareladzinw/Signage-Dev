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
                            </div>
                            <div class="form-group">
                                <label for="player">Width</label>
                                <input name="width" type="text" class="form-control" placeholder="Width">
                            </div>
                            <div class="form-group">
                                <label for="player">Height</label>
                                <input name="height" type="text" class="form-control" placeholder="Height">
                            </div>
                            <div class="form-group">
                                <label for="player">Status Fullscreen</label>
                                <input name="statusFullscreen" type="text" class="form-control" placeholder="Status Fullscreen">
                            </div>
                            <div class="form-group">
                                <label for="player">Orientation</label>
                                <input name="orientation" type="text" class="form-control" placeholder="Orientation">
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
                                </div>
                                <div class="form-group">
                                    <label for="player">Width</label>
                                    <input type="text" class="form-control" name="width" value={{$l->width}}>
                                </div>
                                <div class="form-group">
                                    <label for="player">Height</label>
                                    <input type="text" class="form-control" name="height" value={{$l->height}}>
                                </div>
                                <div class="form-group">
                                    <label for="player">Status Fullscreen</label>
                                    <input type="text" class="form-control" name="statusFullscreen" value={{$l->statusFullscreen}}>
                                </div>
                                <div class="form-group">
                                    <label for="player">Orientation</label>
                                    <input type="text" class="form-control" name="orientation" value={{$l->orientation}}>
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