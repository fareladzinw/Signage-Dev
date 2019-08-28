<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Paket;
use App\Player;
use App\User;
use App\Kategori;
use App\Layout;
use App\Media;
use App\File;
use App\Playlist;

class adminController extends Controller
{
    public function masterPlayer (){
        $player = Player::get();

        return view('admin.pages.masterPlayer',['player'=>$player]);
    }

    public function listClient (){
        $client = User::orderBy('tipeClient','asc')->get();

        return view('admin.pages.listClient',['client'=>$client]);
    }

    public function masterLayout (){
        $layout = Layout::get();

        return view('admin.pages.masterLayout',['layout'=>$layout]);
    }

    public function masterKategori (){
        $kategori = Kategori::get();

        return view('admin.pages.masterKategori',['kategori'=>$kategori]);
    }

    public function masterMedia (){
        $media = Media::join('file','file.id','=','media.file_id')
            ->get(['file.nama','file.type','file.size','file.duration','file.url','media.statusDownload','file.status']);

        return view('admin.pages.masterMedia',['media'=>$media]);
    }

    public function deleteLayout ($id){
        $check = Playlist::where('layout_id',$id)->first();

        if($check === null) {
            Layout::where('id', $id)->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

    public function deleteKategori ($id){
        $check = Playlist::where('kategori_id',$id)->first();
        if(empty($check)){
            Kategori::where('id',$id)->delete();
            return redirect()->back();
        }
        else{
            return redirect()->back();
        }
    }

}
