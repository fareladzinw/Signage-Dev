@extends('user.master')


@section('judul', 'Dasboard')
@section('deskripsi', 'Silahkan pilih paket iklan')
@section('content')
     @for ($i = 0; $i < 10; $i++)
     <div class="card">
     <div class="box box-info">
            <div class="box-header">
                <h3 style="margin : 0;">
                    Iklan Ipsum
                </h3>
            </div>
            <div class="box-body">
            <h6 class="box-subtitle mb-2 text-muted" style="margin : 0;">durasi 3 malam</h6>
            <p class="card-text">
              Some quick example text to build on the card title and make up the bulk of the card's content.
            </p>
            <div class="column">
                <a href="#" class="col-md-6"><button type="button" class="btn btn-sm btn-block btn-info">Pesan</button></a>
                <a href="#" class="col-md-6"><button type="button" class="btn btn-sm btn-block btn-success">Detail Paket</button></a> 
            </div> 
          </div>
          </div>
        </div>
     @endfor  
@endsection
