<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use App\Paket;
use App\Pesanan;
use App\User;
use App\Komisi;
use App\Withdraw;
use App\File;
use App\Pembayaran;
use App\Transaksi;
use App\Konfirmasi;

class UserController extends Controller
{
    /**
     * Load landing page user
     * @return Resource\Views\Users\Pages\home.blade.php
     */   
    public function homepage() 
    {
        $pakets = Paket::all();
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->get();
        $nilaiKomisi = 0;
        foreach($komisi as $k) {
            $nilaiKomisi += $k->nominal;
        }
        $withdraw = Withdraw::where('user_id', Auth::user()->id)->get();
        $nilaiWithdraw = 0;
        foreach($withdraw as $w) {
            if($w->status === 1){
                $nilaiWithdraw += $w->nominal;
            }
        }
        
        $balance = $nilaiKomisi - $nilaiWithdraw;
        return view('user.pages.home')->with(['pakets' => $pakets, 'balance' => $balance]);
    }

    /**
     * Load landing page user
     * @return Resource\Views\Users\Pages\paketAktif.blade.php
     */   
    public function paketAktif() 
    {
        $user     = User::where('id', Auth::user()->id)->get();
        $pesanans = Pesanan::where('user_id', $user[0]->id)->orderBy('updated_at', 'DESC')->get();
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->get();
        $nilaiKomisi = 0;
        foreach($komisi as $k) {
            $nilaiKomisi += $k->nominal;
        }
        $withdraw = Withdraw::where('user_id', Auth::user()->id)->get();
        $nilaiWithdraw = 0;
        foreach($withdraw as $w) {
            if($w->status === 1){
                $nilaiWithdraw += $w->nominal;
            }
        }
        
        $balance = $nilaiKomisi - $nilaiWithdraw;
        return view('user.pages.paketAktif')->with(['pesanans' => $pesanans, 'balance' => $balance]);
    }

    /**
     * Load list afiliasi page user
     * @return Resource\Views\Users\Pages\listAfiliasi.blade.php
     */   
    public function listAfiliasi() 
    {
        $afiliasi = User::where('afiliasiFrom', Auth::user()->id)->get();
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->get();
        $nilaiKomisi = 0;
        foreach($komisi as $k) {
            $nilaiKomisi += $k->nominal;
        }
        
        $withdraw = Withdraw::where('user_id', Auth::user()->id)->get();
        $nilaiWithdraw = 0;
        foreach($withdraw as $w) {
            if($w->status === 1){
                $nilaiWithdraw += $w->nominal;
            }
        }
        $balance = $nilaiKomisi - $nilaiWithdraw;
        return view('user.pages.listAfiliasi')->with(['afiliasi' => $afiliasi, 'komisi' => $komisi, 'balance' => $balance]);
    }

    /**
     * Load withdraw page
     * @return Resource\Views\Users\Pages\withdrawAmountBlade.blade.php
     */   
    public function withdrawPage() 
    {
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->get();
        $nilaiKomisi = 0;
        foreach($komisi as $k) {
            $nilaiKomisi += $k->nominal;
        }
        $withdraw = Withdraw::where('user_id', Auth::user()->id)->get();
        $nilaiWithdraw = 0;
        foreach($withdraw as $w) {
            if($w->status === 1){
                $nilaiWithdraw += $w->nominal;
            }
        }
        $balance = $nilaiKomisi - $nilaiWithdraw;
        return view('user.pages.withdrawAmount')->with(['balance' => $balance]);
    }

    /**
     * Storing withdraw into database
     * @return Resource\Views\Users\Pages\withdrawAmountBlade.blade.php
     */   
    public function withdrawStore(Request $request) 
    {
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->get();
        $nilaiKomisi = 0;
        foreach($komisi as $k) {
            $nilaiKomisi += $k->nominal;
        }
        $withdraw = Withdraw::where('user_id', Auth::user()->id)->get();
        $nilaiWithdraw = 0;
        foreach($withdraw as $w) {
            if($w->status === 1){
                $nilaiWithdraw += $w->nominal;
            }
        }
        
        $balance = $nilaiKomisi - $nilaiWithdraw;

        $this->validate($request, [
            'amount' => 'required|numeric|max:'. $balance,
        ]);

        $withdraw = new Withdraw;
        $withdraw->user_id = Auth::user()->id;
        $withdraw->tanggal = Carbon::now();
        $withdraw->nominal = $request->amount;
        $withdraw->status = 0;
        $withdraw->save();

        return redirect()->route('withdrawHistory')->with('alert-success', 'Mohon tunggu admin akan mengkonfirmasi');
    }

    /**
     * Load page withdraw history
     * @return Resource\Views\Users\Pages\rekapAfiliasi.blade.php
     */   
    public function withdrawHistory() 
    {   
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->get();
        $nilaiKomisi = 0;
        foreach($komisi as $k) {
            $nilaiKomisi += $k->nominal;
        }
        
        $withdraw = Withdraw::where('user_id', Auth::user()->id)->orderBy('updated_at', 'DESC')->get();
        $nilaiWithdraw = 0;
        foreach($withdraw as $w) {
            if($w->status === 1){
                $nilaiWithdraw += $w->nominal;
            }
        }
        
        $balance = $nilaiKomisi - $nilaiWithdraw;

        return view('user.pages.rekapAfiliasi')->with(['withdraw' => $withdraw, 'balance' => $balance]);
    }
    
    /**
     * Load page pesanan
     * @return Resource\Views\Users\Pages\pesan.blade.php
     */   
    public function pesanIndex($id) 
    {   
        $paket = Paket::find($id);
        $dates = $this->generateDateRange(Carbon::parse($paket->startShow), Carbon::parse($paket->endShow));
        
        return view('user.pages.pesan')->with(['paket' => $paket, 'dates' => $dates]);
    }

    private function generateDateRange(Carbon $to, Carbon $from)
    {
        for($date = $to; $date->lte($from); $date->addDay()) {
            $dates[] = $date->format('Y-m-d');
        }
        return $dates;
    }

    /**
     * Store pesanan
     * @return Resource\Views\Users\Pages\paketAktif.blade.php
     */   
    public function pesanStore(Request $request, $id) 
    {   
        $this->validate($request, [
            'startShow' => 'required|date',
            'endShow'   => 'required|date'
        ]);
            
        if(Carbon::parse($request->startShow)->format('Y-m-d') > Carbon::parse($request->endShow)->format('Y-m-d')) {
            return redirect()->route('paket')->with('alert-danger', 'Masukkan tanggal yang benar!');
        } else {
            $pesanan            = new Pesanan;
            $pesanan->paket_id  = $id;
            $pesanan->user_id   = Auth::user()->id;
            $pesanan->tanggal   = Carbon::now();
            $pesanan->status    = 0;
            $pesanan->startShow = Carbon::parse($request->startShow)->format('Y-m-d');
            $pesanan->endShow   = Carbon::parse($request->endShow)->format('Y-m-d');
            $pesanan->save();
            
            $pembayaran             = new Pembayaran;
            $pembayaran->pesanan_id = $pesanan->id;
            $pembayaran->user_id    = Auth::user()->id;
            $pembayaran->tanggal    = Carbon::now();
            $pembayaran->status     = 0;
            $pembayaran->harga      = $request->harga;
            $pembayaran->save();

            $transaksi                  = new Transaksi;
            $transaksi->user_id         = Auth::user()->id;
            $transaksi->paket_id        = $id;
            $transaksi->jumlahPesanan   = 1;
            $transaksi->tanggal         = Carbon::now();
            $transaksi->nominal         = $request->harga;
            $transaksi->discount        = 0;
            $transaksi->total           = $request->harga;
            $transaksi->statusUpload    = 0;
            $transaksi->statusTayang    = 0;
            $transaksi->save();

            $konfirmasi = new Konfirmasi;
            $konfirmasi->transaksi_id = $transaksi->id;
            $konfirmasi->type = null;
            $konfirmasi->konfirmasiDari = null;
            $konfirmasi->tanggal = Carbon::now();
            $konfirmasi->namaBank = Auth::user()->namaBank;
            $konfirmasi->namaRekening = Auth::user()->namaRekening;
            $konfirmasi->nominal = $request->harga;
            $konfirmasi->status = 0;
            $konfirmasi->validasi = 0;
            $konfirmasi->dataBulb = null;
            $konfirmasi->save();

            return redirect()->route('paket')->with('alert-success', 'Mohon konfirmasi pembayaran');
        }
    }

    /**
     * Load upload iklan
     * @return Resource\Views\Users\Pages\uploadContent.blade.php
     */   
    public function uploadIndex($id) 
    {   
        $pesanan = Pesanan::find($id);
        if($pesanan->status === 1) {
            return view('user.pages.uploadContent')->with(['pesanan' => $pesanan]);
        } else {
            return redirect()->route('paket')->with('alert-danger', 'Mohon konfirmasi pembayaran');
        }
    }

    /**
     * Store file iklan
     * @return Resource\Views\Users\Pages\paketAktif.blade.php
     */   
    public function uploadStore(Request $request, $id) 
    {   
        $pesanan    = Pesanan::find($id);

        $file               = new File;
        $file->paket_id     = $pesanan->paket->id;
        $file->user_id      = Auth::user()->id;
        $file->pesanan_id   = $id;
        $file->nama         = $request->file->getClientOriginalName();
        $type               = explode(".", $file->nama);
        $file->type         = $type[1];
        $file->size         = $request->file('file')->getSize();
        $file->duration     = null;
        $file->status       = 0;
        $file->url          = "http://aksesdatautama.com/arba_signage/public/". $file->nama;
        $file->save();


        
        $image = $request->file('file');
        $target = '/public/images';
        $image->move(\base_path() . $target, $image->getClientOriginalName());
        
        return redirect()->route('paket')->with('alert-success', 'Mohon tunggu admin mengkonfirmasi');
    }

    /**
     * Load bukti pembayaran page
     * @return Resource\Views\Users\Pages\uploadBP.blade.php
     */   
    public function buktiIndex($id) 
    {   
        $pesanan = Pesanan::find($id);
        return view('user.pages.uploadBP')->with(['pesanan' => $pesanan]);
    }

    /**
     * Store bukti pembayaran
     * @return Resource\Views\Users\Pages\paketAktif.blade.php
     */   
    public function buktiStore(Request $request, $id) 
    {   
        $pembayaran = Pembayaran::where('pesanan_id', $id)->first();

        $pembayaran->urlFile = $request->buktiPembayaran->getClientOriginalName();
        $pembayaran->save();
        
        $transaksi = Transaksi::where('pesanan_id', $id)->first();

        $transaksi = $request->buktiPembayaran->getClientOriginalName();
        $transaksi->save();

        $image = $request->file('buktiPembayaran');
        $target = '/public/images';
        $image->move(\base_path() . $target, $image->getClientOriginalName());

        return redirect()->route('paket')->with('alert-success', 'Mohon tunggu admin mengkonfirmasi pembayaran');
    }
}
