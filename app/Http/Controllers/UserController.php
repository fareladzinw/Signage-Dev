<?php

namespace App\Http\Controllers;

use App\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;
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
use App\Mail\Payment;

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
     * Load profile user
     * @return Resource\Views\Users\Pages\home.blade.php
     */   
    public function profile() 
    {
        $user = User::find(Auth::user()->id);
        return view('user.pages.profile')->with(['user' => $user]);
    }

    /**
     * Load view update profile user
     * @return Resource\Views\Users\Pages\home.blade.php
     */   
    public function editProfile($id) 
    {
        $user = User::find($id);
        return view('user.pages.formEditProfile')->with(['user' => $user]);
    }

    /**
     * Update profile user
     * @return Resource\Views\Users\Pages\home.blade.php
     */   
    public function updateProfile(Request $request, $id) 
    {
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required',
            'norek' => 'required',
            'bank' => 'required',
            'namaRek' => 'required',
        ]);

        $user = User::find($id);
        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->nomorRekening = $request->norek;
        $user->namaBank = $request->bank;
        $user->namaRekening = $request->namaRek;
        if(!is_null($request->password))$user->password = bcrypt($request->password);
        if(!empty($request->fotoProfile)) {
            $user->foto = $request->fotoProfile->getClientOriginalName();   

            $image = $request->file('fotoProfile');
            $target = '/public/images';
            $image->move(\base_path() . $target, $image->getClientOriginalName());
        }

        $user->save();     

        return redirect()->route('indexProfile')->with('alert-success', 'Profile sudah diupdate');
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
            'startShow' => 'required|date'
        ]);
            
            $pesanan            = new Pesanan;
            $pesanan->paket_id  = $id;
            $pesanan->user_id   = Auth::user()->id;
            $pesanan->tanggal   = Carbon::now();
            $pesanan->status    = 0;
            $pesanan->startShow = Carbon::parse($request->startShow)->format('Y-m-d');
            $pesanan->endShow   = Carbon::parse($request->startShow)->addDays($pesanan->paket['durasi'])->format('Y-m-d');
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
            $transaksi->pesanan_id      = $pesanan->id;
            $transaksi->jumlahPesanan   = 1;
            $transaksi->tanggal         = Carbon::now();
            $transaksi->nominal         = $request->harga;
            $transaksi->discount        = 0;
            $transaksi->total           = substr($transaksi->nominal, 0, -3) . rand(1, 9) . rand(1, 9) . rand(1, 9);
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
            $konfirmasi->save();

            Mail::to(Auth::user()->email)->send(new Payment($transaksi)); 

            return redirect()->route('paket')->with('alert-success', 'Masukan bukti transfer anda untuk melakukan konfirmasi pembayaran');
        
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

        $media = new Media();
        $media->file_id = $file->id;
        $media->statusDownload = 0;
        $media->save();

        
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
        $transaksi = Transaksi::where('pesanan_id', $id)->first();
        return view('user.pages.uploadBP')->with(['pesanan' => $pesanan, 'transaksi' => $transaksi]);
    }

    /**
     * Store bukti pembayaran
     * @return Resource\Views\Users\Pages\paketAktif.blade.php
     */   
    public function buktiStore(Request $request, $id) 
    {
        $pembayaran = Pembayaran::where('pesanan_id', $id)->first();
        $pembayaran->urlFile = $request->buktiPembayaran->getClientOriginalName();

        $transaksi = Transaksi::where('pesanan_id', $id)->first();

        $konfirmasi = Konfirmasi::where('transaksi_id', $transaksi->id)->first();
        $konfirmasi->konfirmasiDari = $request->norek;
        $konfirmasi->type = 1;
        $konfirmasi->tanggal = Carbon::now();
        $konfirmasi->namaBank = $request->bank;
        $konfirmasi->namaRekening = $request->nama_pengirim;
        $konfirmasi->dataBulb = $request->buktiPembayaran->getClientOriginalName();
        
        $konfirmasi->save();
        $pembayaran->save();

        $image = $request->file('buktiPembayaran');
        $target = '/public/images';
        $image->move(\base_path() . $target, $image->getClientOriginalName());

        return redirect()->route('paket')->with('alert-success', 'Mohon tunggu admin mengkonfirmasi pembayaran');
    }
}
