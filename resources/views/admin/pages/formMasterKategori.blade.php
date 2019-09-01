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
                                        Add Data Master Kategori
                                        <small>Form data master Kategori</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="{{ route('storeKategori') }}" method="post">
                            {{csrf_field()}}
                            {{ method_field('POST') }}
                            <div class="form-group">
                                <label for="player">Nama Kategori</label>
                                <input name="nama" type="text" class="form-control" placeholder="Nama">
                            </div>
                            <div class="form-group">
                                <label for="player">Keterangan</label>
                                <input name="keterangan" type="text" class="form-control" placeholder="Keterangan">
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
                                        Edit Master Kategori
                                        <small>Form data master Kategori</small>
                                    </h1>
                                </section>
                                {{-- <h1 class="box-title">Hover Data Table</h1> --}}
                            </div>
                            {{-- <div class="col-md-2"><button  type="button" class="btn btn-block btn-danger">Tambah Data</button></div> --}}
                        </div>
                    </div>
                    <!-- /.box-header -->
                    @foreach($kategori as $k)
                        <div class="box-body">
                            <form action={{ route('editKategori', $id)}} method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <label for="player">Nama Kategori</label>
                                    <input name="nama" type="text" class="form-control" placeholder="Nama" value="{{$k->nama}}">
                                </div>
                                <div class="form-group">
                                    <label for="player">Keterangan</label>
                                    <input name="keterangan" type="text" class="form-control" placeholder="Keterangan" value="{{$k->keterangan}}">
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