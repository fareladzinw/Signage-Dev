@extends('user.master')


@section('judul', 'Dasboard')
@section('deskripsi', 'Silahkan pilih paket iklan')
@section('content')

     @foreach($pakets as $p)
     @if(\Carbon\Carbon::now()->format('Y-m-d') > \Carbon\Carbon::parse($p->startShow)->format('Y-m-d')
     && \Carbon\Carbon::now()->format('Y-m-d') < \Carbon\Carbon::parse($p->endShow)->format('Y-m-d')
     || \Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($p->startShow)->format('Y-m-d')
     || \Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($p->endShow)->format('Y-m-d'))
     <div class="card">
     <div class="box box-info">
            <div class="box-header">
                <h3 style="margin : 0;">
                    {{ $p->nama }}
                </h3>
            </div>
            <div class="box-body">
            <h6 class="box-subtitle mb-2 text-muted" style="margin : 0;">Durasi {{$p->durasi}} hari</h6>
            <p class="card-text">
              Paket ini berdurasi selama {{ $p->durasi }} hari
            </p>
            <div class="column">
            <a href="{{ route('pesan', $p->id) }}" class=""><button type="button" class="btn btn-sm btn-block btn-info">Pesan</button></a>
            </div> 
          </div>
          </div>
        </div>
     @endif
     @endforeach
@endsection
