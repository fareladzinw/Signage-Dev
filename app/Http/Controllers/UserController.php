<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Paket;
use App\Pesanan;
use App\User;
use App\Komisi;
use App\Withdraw;

class UserController extends Controller
{
    /**
     * Load landing page user
     * @return Resource\Views\Users\Pages\home.blade.php
     */   
    public function homepage() 
    {
        $pakets = Paket::all();
        return view('user.pages.home')->with(['pakets' => $pakets]);
    }

    /**
     * Load landing page user
     * @return Resource\Views\Users\Pages\paketAktif.blade.php
     */   
    public function paketAktif() 
    {
        $user     = User::where('id', Auth::user()->id)->get();
        if($user[0]->tipeClient == 'user') {
            $pesanans = Pesanan::where('user_id', $user[0]->id)->get();
            return view('user.pages.paketAKtif')->with(['pesanans' => $pesanans]);
        }
    }

    /**
     * Load list afiliasi page user
     * @return Resource\Views\Users\Pages\listAfiliasi.blade.php
     */   
    public function listAfiliasi() 
    {
        $afiliasi = User::where('afiliasiFrom', Auth::user()->id)->get();
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->get();
        return view('user.pages.listAfiliasi')->with(['afiliasi' => $afiliasi, 'komisi' => $komisi]);
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
        $komisi = Komisi::where('afiliasiFrom', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $nilaiKomisi = 0;
        foreach($komisi as $k) {
            $nilaiKomisi += $k->nominal;
        }

        $withdraw = Withdraw::where('user_id', Auth::user()->id)->orderBy('id', 'DESC')->get();
        $nilaiWithdraw = 0;
        foreach($withdraw as $key => $w) {
            $nilaiWithdraw += $w->nominal;
            $balance[] = $nilaiKomisi - $nilaiWithdraw;
        }
        $jmlWithdraw = count($withdraw) - 1;

        return view('user.pages.rekapAfiliasi')->with(['withdraw' => $withdraw, 'balance' => $balance, 'jmlWithdraw' => $jmlWithdraw]);
    }
    
}
