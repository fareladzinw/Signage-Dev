<?php

namespace App\Http\Controllers;

use App\Content;
use App\Transaksi;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Paket;
use App\Player;
use App\User;
use App\Kategori;
use App\Layout;
use App\Media;
use App\File;
use App\Playlist;
use App\Komisi;
use App\Withdraw;
use App\Konfirmasi;
use App\Requests;


class adminController extends Controller
{

    // CONTROLLER PLAYER
    public function masterPlayer (){
        $player = Player::get();

        return view('admin.pages.masterPlayer',['player'=>$player]);
    }

    public function addDataMasterPlayer(){
        return view('admin.pages.formMasterPlayer');
    }

    public function storeDataMasterPlayer(Request $request){
        $data = new Player();
        $data->nama = $request->nama;
        $data->lokasi = $request->lokasi;
        $data->KEYPLAYER = $request->KEYPLAYER;
        $data->PASSWORD = $request->PASSWORD;
        $data->spesifikasi = $request->spesifikasi;
        $data->save();

        return redirect('/admin/player/master-player');
    }

    public function getEditDataMasterPlayer($id){
        $player = Player::where('id',$id)
            ->get();

        return view('admin.pages.formMasterPlayer',['player'=> $player, 'id'=>$id]);
    }

    public function editDataMasterPlayer($id, Request $request){
        Player::where('id',$id)->update([
            'nama' => $request->nama,
            'lokasi' => $request->lokasi,
            'KEYPLAYER' => $request->keyplayer,
            'PASSWORD' => $request->password,
            'spesifikasi' => $request->spesifikasi
        ]);

        return redirect('/admin/player/master-player');
    }

    public function deletePlayer ($id){
        $check = Playlist::where('player_id',$id)->first();
        $check2 = Requests::where('player_id',$id)->first();

        if($check === null && $check2 === null) {
            Player::where('id', $id)->delete();
            return redirect()->back()->with('alert-success','Player berhasil dihapus');
        }
        else{
            return redirect()->back()->with('alert-fail','Player gagal dihapus,karena Player sedang digunakan');
        }
    }
    //=======================================


    //CONTROLLER LAYOUT
    public function masterLayout (){
        $layout = Layout::get();

        return view('admin.pages.masterLayout',['layout'=>$layout]);
    }

    public function addDataMasterLayout(){
        return view('admin.pages.formMasterLayout');
    }

    public function storeDataMasterLayout(Request $request){
        $data = new Layout();
        $data->nama = $request->nama;
        $data->width = $request->width;
        $data->height = $request->height;
        $data->statusFullscreen = $request->statusFullscreen;
        $data->orientation = $request->orientation;
        $data->save();

        return redirect('/admin/player/master-layout');
    }

    public function getEditDataMasterLayout($id){
        $layout = Layout::where('id',$id)
            ->get();

        return view('admin.pages.formMasterLayout',['layout'=> $layout, 'id'=>$id]);
    }

    public function editDataMasterLayout($id, Request $request){
        Layout::where('id',$id)->update([
            'nama' => $request->nama,
            'width' => $request->width,
            'height' => $request->height,
            'statusFullscreen' => $request->statusFullscreen,
            'orientation' => $request->orientation
        ]);

        return redirect('/admin/player/master-layout');
    }

    public function deleteLayout ($id){
        $check = Playlist::where('layout_id',$id)->first();

        if($check === null) {
            Layout::where('id', $id)->delete();
            return redirect()->back()->with('alert-success','Layout berhasil dihapus');
        }
        else{
            return redirect()->back()->with('alert-fail','Layout gagal dihapus,karena layout sedang digunakan');
        }
    }
    //=============================


    //CONTROLLER KATEGORI

    public function masterKategori (){
        $kategori = Kategori::get();

        return view('admin.pages.masterKategori',['kategori'=>$kategori]);
    }

    public function deleteKategori ($id){
        $check = Playlist::where('kategori_id',$id)->first();
        if(empty($check)){
            Kategori::where('id',$id)->delete();
            return redirect()->back()->with('alert-success','Kategori berhasil dihapus');
        }
        else{
            return redirect()->back()->with('alert-fail','Kategori gagal dihapus,karena Kategori sedang digunakan');
        }
    }
    //=====================================

    //CONTROLLER MANAGER / MEDIA
    public function masterMedia (){
        $media = Media::join('file','file.id','=','media.file_id')
            ->get(['file.nama','file.type','file.size','file.duration','file.url','media.statusDownload','file.status']);

        return view('admin.pages.masterMedia',['media'=>$media]);
    }

    //=============================

    //CONTROLLER CLIENT
    public function listClient (){
        $client = User::orderBy('tipeClient','asc')->get();

        return view('admin.pages.listClient',['client'=>$client]);
    }

    //===============================

    //CONTROLLER AFILIASI
    public function masterAfiliasi (){
        $afiliasi = Komisi::join('users','users.id','=','komisi.user_id')
            ->get(['komisi.persentase','komisi.tanggal','users.namaBank','users.nomorRekening','users.namaRekening','komisi.afiliasiFrom','users.linkAfiliasi']);

        return view('admin.pages.masterAfiliasi',['afiliasi'=>$afiliasi]);
    }

    //==================================

    //CONTORLLER PAKET
    public function setupPaket (){
        $paket = Paket::get();

        return view('admin.pages.setupPaket',['paket'=>$paket]);
    }

    //=================================

    //CONTROLLER PLAYLIST
    public function setupPlaylist (){
        $playlist = Playlist::join('player','player.id','=','playlist.player_id')
            ->join('media','media.id','=','playlist.media_id')
            ->join('layout','layout.id','=','playlist.layout_id')
            ->join('kategori','kategori.id','=','playlist.kategori_id')
            ->join('paket','paket.id','=','playlist.paket_id')
            ->join('file','file.id','=','media.file_id')
            ->get(['playlist.id','player.nama AS namaplayer','file.nama AS namafile','file.duration','layout.nama AS namalayout','playlist.statusLoop','playlist.statusMedia','kategori.nama AS namakategori','paket.nama AS namapaket']);

        return view('admin.pages.setupPlaylist',['playlist'=>$playlist]);
    }

    //=======================================

    //CONTROLLER WITHDRAW AFILIASi
    public function konfirmasiWithdraw (){
        $withdraw = Withdraw::join('users','users.id','=','withdraw.user_id')
            ->get(['users.id','users.nama','withdraw.tanggal','withdraw.nominal','withdraw.status','users.namaBank','users.nomorRekening']);

        return view('admin.pages.konfirmasiWithdraw',['withdraw'=>$withdraw]);
    }

    //================================

    //CONTROLLER PESANAN TAYANG
    public function pesananTayang (){
        $pesanan = Content::join('transaksi','transaksi.id','=','content.transaksi_id')
            ->join('paket','paket.id','=','content.paket_id')
            ->join('playlist','playlist.id','=','content.playlist_id')
            ->join('users','users.id','=','content.user_id')
            ->get(['transaksi.id AS idtrans','paket.nama AS namapaket','playlist.id AS idplaylist','users.nama AS namauser','content.status','content.startTayang','content.endTayang','content.numberFile','content.typeFile','content.urlFile','content.orderFile']);

        return view('admin.pages.pesananTayang',['pesanan'=>$pesanan]);
    }

    //=========================

    //CONTROLLER KONFIRMASI PEMBAYARAN
    public function konfirmasiPemabayaran (){
        $konfirmasi = Konfirmasi::join('transaksi','transaksi.id','=','konfirmasi.transaksi_id')
            ->get(['konfirmasi.type','konfirmasi.konfirmasiDari','konfirmasi.tanggal','transaksi.id','konfirmasi.namaBank','konfirmasi.namaRekening','konfirmasi.nominal','konfirmasi.status','konfirmasi.validasi','konfirmasi.dataBulb']);

        return view('admin.pages.konfirmasiPemabayaran',['konfirmasi'=>$konfirmasi]);
    }

    //============================================

    //CONTROLLER REQUEST PLAYER
    public function daftarRequestPlayer (){
        return view('admin.pages.daftarRequestPlayer');
    }

    //==========================================

    //CONTROLLER DAFTAR PESANAN TAYANG
    public function riwayatPesanan (){
        $transaksi = Transaksi::join('users','users.id','=','transaksi.user_id')
            ->join('paket','paket.id','=','transaksi.paket_id')
            ->get(['users.nama AS namauser','paket.nama AS namapaket','transaksi.jumlahPesanan','transaksi.tanggal','transaksi.nominal','transaksi.discount','transaksi.total','transaksi.statusUpload','transaksi.statusTayang']);

        return view('admin.pages.riwayatTransaksiPesanan',['transaksi'=>$transaksi]);
    }

    //==================================================

}
