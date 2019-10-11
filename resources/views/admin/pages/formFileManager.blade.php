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
                                        Tambah file
                                        <small>Form tambah file</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                        <div class="box-body">
                            <form action="{{ route('storeFile', $media->id)}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="player">Pilih paket</label>
                                    <select name="" class="form-control">
                                        @foreach($paket as $p)
                                        <option value="{{$p->id}}">{{ $p->nama }}</option>
                                        @endforeach
                                    </select>
                                    @if($errors->has('nama'))
                                        <div class="text-danger">
                                            {{$errors->first('nama')}}
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="player">File</label>
                                    <input type="file" name="file" class="form-control">
                                    @if($errors->has('file'))
                                        <div class="text-danger">
                                            {{$errors->first('file')}}
                                        </div>
                                    @endif
                                </div>                                
                                <div class="form-group">
                                    <button  type="submit" class="btn btn-block btn-danger">Add file</button>
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