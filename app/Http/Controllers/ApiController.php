<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Player;
use App\Requests;
use App\Playlist;
use App\Content;
use App\User;
use App\Withdraw;
use App\Komisi;

class ApiController extends Controller
{
    public function getSetupPlayer($id, $key) 
    {   
        try{
            $data   = Player::where('id', $id)->where('KEYPLAYER', $key)->first();
            if(empty($data)) {
                $status = 404;
                $error  = 'Player not found';
                $data   = null;
            } else {
                $status = 200;
                $error  = null;
            }            
        } catch(\Exception $e) {
            $data   = null;
            $status = 404;
            $error  = $e->getMessage();
        }
        
        return response()->json(['status' => $status, 'data' => $data, 'error' => $error], $status);
    }

    public function getDaftarIklan($id, $key, $unique)
    {
        try{
            $data   = Requests::where('uniqueId', $unique)->with('player')->first();
            if(!empty($data) && $data->player->id == $id && $data->player->KEYPLAYER == $key) {
                $status = 200;
                $error  = null;
            } else {
                $status = 404;
                $error  = 'Requests not found';
                $data   = null;
            }        
        } catch(\Exception $e) {
            $data   = null;
            $status = 404;
            $error  = $e->getMessage();
        }
        
        return response()->json(['status' => $status, 'data' => $data, 'error' => $error], $status);
    }
    
    public function getContentIklan($id, $key)
    {
        try{
            $playlist   = Playlist::where('player_id', $id)->with('player')->first();
            if(!empty($playlist) && $playlist->player->id == $id && $playlist->player->KEYPLAYER == $key) {
                $data   = Content::where('playlist_id', $playlist->id)->first();
                $status = 200;
                $error  = null;
            } else {
                $status = 404;
                $error  = 'Requests not found';
                $data   = null;
            }           
        } catch(\Exception $e) {
            $data   = null;
            $status = 404;
            $error  = $e->getMessage();
        }
        
        return response()->json(['status' => $status, 'data' => $data, 'error' => $error], $status);
    }

    public function getDaftarAfiliasiClient($id)
    {
        try{
            $data   = User::where('afiliasiFrom', $id)->get();
            if(empty($data[0])) {
                $status = 404;
                $error  = 'Requests not found';
                $data   = null;
            } else {
                $status = 200;
                $error  = null;
            }           
        } catch(\Exception $e) {
            $data   = null;
            $status = 404;
            $error  = $e->getMessage();
        }
        
        return response()->json(['status' => $status, 'data' => $data, 'error' => $error], $status);
    }

    public function postWithdrawAfiliasi(Request $request, $id)
    {
        try{
            $komisi         = Komisi::where('afiliasiFrom', $id)->get();

            if(empty($komisi[0])) {
                $status = 404;
                $error  = 'User not found';
                $data   = null;
            } else {
                
                $nilaiKomisi    = 0;
                foreach($komisi as $k) {
                    $nilaiKomisi += $k->nominal;
                }
                if($request->nominal > $nilaiKomisi) {
                    $status = 404;
                    $error  = 'Mohon masukan nominal kurang dari '. $nilaiKomisi;
                    $data   = null;
                } else {
                    $withdraw           = new Withdraw;
                    $withdraw->user_id  = $id;
                    $withdraw->tanggal  = \Carbon\Carbon::now()->format('Y-m-d');
                    $withdraw->nominal  = $request->nominal;
                    $withdraw->status   = 0;
                    $withdraw->save();
                    
                    $status = 200;
                    $error  = null;
                    $data   = $withdraw;
                }
            }           
        } catch(\Exception $e) {
            $data   = null;
            $status = 404;
            $error  = $e->getMessage();
        }
        
        return response()->json(['status' => $status, 'data' => $data, 'error' => $error], $status);
    }

    public function getRekapAfiliasi($id, $tanggal)
    {
        try{
            $data = Withdraw::where('user_id', $id)->where('tanggal', \Carbon\Carbon::parse($tanggal)->format('Y-m-d'))->get();
            if(empty($data[0])) {
                $status = 404;
                $error  = 'Requests not found';
                $data   = null;
            } else {
                $status = 200;
                $error  = null;
            }           
        } catch(\Exception $e) {
            $data   = null;
            $status = 404;
            $error  = $e->getMessage();
        }
        
        return response()->json(['status' => $status, 'data' => $data, 'error' => $error], $status);
    }

    public function postRegAfiliasi(Request $request, $kode)
    {
        try{
            $user                   = User::where('linkAfiliasi', $kode)->first();
            if(empty($user)) {
                $status = 404;
                $error  = 'Kode afiliasi not found';
                $data   = null;
            } else {
                $user->jumlahAfiliasi   += 1;
                $user->save();

                $data               = new User;
                $data->nama         = $request->nama;
                $data->username     = $request->username;
                $data->alamat       = $request->alamat;
                $data->hp           = $request->hp;
                $data->tipeClient   = 1;
                $data->dateTime     = \Carbon\Carbon::now()->format('Y-m-d');
                $data->email        = $request->email;
                $data->linkAfiliasi = str_random(10);
                $data->afiliasiFrom = $user->id;
                $data->password     = bcrypt($request->password);
                $data->namaBank             = $request->namaBank;
                $data->nomorRekening        = $request->nomorRekening;
                $data->namaRekening         = $request->namaRekening;
                $data->save();

                $status = 200;
                $error  = null;

            }
            
        } catch(\Exception $e) {
            $data   = null;
            $status = 404;
            $error  = $e->getMessage();
        }
        
        return response()->json(['status' => $status, 'data' => $data, 'error' => $error], $status);
    }
}
