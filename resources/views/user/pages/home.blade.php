@extends('user.master')


@section('judul', 'Dasboard')
@section('deskripsi', 'Silahkan pilih paket iklan')
@section('content')

     @foreach($pakets as $p)
     @if(\Carbon\Carbon::now()->format('Y-m-d') > \Carbon\Carbon::parse($p->startShow)->format('Y-m-d')
     && \Carbon\Carbon::now()->format('Y-m-d') < \Carbon\Carbon::parse($p->endShow)->format('Y-m-d')
     || \Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($p->startShow)->format('Y-m-d')
     || \Carbon\Carbon::now()->format('Y-m-d') == \Carbon\Carbon::parse($p->endShow)->format('Y-m-d'))
     <div class="card" style="text-align:center;" >
     <div class="box box-info box-paket">
            <div class="box-header">
                <h3 style="margin : 0;">
                    {{ $p->nama }}
                </h3>
            </div>
            <div class="box-body">
            <p class="box-subtitle" style="margin : 0;">Durasi {{$p->durasi}} hari</p>
            <p class="box-subtitle" style="margin : 0;">Durasi {{$p->durasi}} hari</p>
            <p class="box-subtitle" style="margin : 0;">Durasi {{$p->durasi}} hari</p>
            <p class="box-harga">
              @php
                  echo "Rp ". number_format($p->harga,2,',','.');
              @endphp
            </p>
          </div>
          <a href="{{ route('pesan', $p->id) }}"><button class="btn btn-pesan">Pesan</button></a>
          </div>
        </div>
     @endif
     @endforeach
@endsection
