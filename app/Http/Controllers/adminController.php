<?php

namespace App\Http\Controllers;

use App\Content;
use App\Transaksi;
use Carbon\Carbon;
use http\Client;
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
        $this->validate($request, [
            'nama' => 'required',
            'lokasi' => 'required',
            'keyplayer' => 'required',
            'password' => 'required',
            'spesifikasi' => 'required',
        ]);

        $data = new Player();
        $data->nama = $request->nama;
        $data->lokasi = $request->lokasi;
        $data->KEYPLAYER = $request->keyplayer;
        $data->PASSWORD = $request->password;
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
        $this->validate($request, [
            'nama' => 'required',
            'lokasi' => 'required',
            'keyplayer' => 'required',
            'password' => 'required',
            'spesifikasi' => 'required',
        ]);

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
        $this->validate($request, [
            'nama' => 'required',
            'width' => 'required',
            'height' => 'required',
            'statusFullscreen' => 'required',
            'orientation' => 'required',
        ]);

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
        $this->validate($request, [
            'nama' => 'required',
            'width' => 'required',
            'height' => 'required',
            'statusFullscreen' => 'required',
            'orientation' => 'required',
        ]);

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

    public function addDataMasterKategori(){
        return view('admin.pages.formMasterKategori');
    }

    public function storeDataMasterKategori(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $data = new Kategori();
        $data->nama = $request->nama;
        $data->keterangan = $request->keterangan;
        $data->save();

        return redirect('/admin/player/master-kategori');
    }

    public function getEditDataMasterKategori($id){
        $kategori = Kategori::where('id',$id)
            ->get();

        return view('admin.pages.formMasterKategori',['kategori'=> $kategori, 'id'=>$id]);
    }

    public function editDataMasterKategori($id, Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        Kategori::where('id',$id)->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan
        ]);

        return redirect('/admin/player/master-kategori');
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

    public function getEditDataMasterClient($id){
        $client = User::where('id',$id)
            ->get();

        return view('admin.pages.formClient',['client'=> $client, 'id'=>$id]);
    }

    public function editDataMasterClient($id, Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'email' => 'required|email',
            'alamat' => 'required',
            'hp' => 'required',
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        User::where('id',$id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'hp'=>$request->hp,
            'username'=>$request->username,
            'password'=>bcrypt($request->password)
        ]);

        return redirect('/admin/client/list-client');
    }

    public function deleteClient ($id){
        User::find($id)->delete();

        return redirect('/admin/client/list-client');
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

    public function addDataMasterPaket(){
        return view('admin.pages.formSetupPaket');
    }

    public function storeDataMasterPaket(Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
            'jumlahPlayer' => 'required',
            'jenisContent' => 'required',
            'startShow' => 'required|date',
            'endShow' => 'required|date',
            'jumlahFile' => 'required',
            'status' => 'required'
        ]);

        $data = new Paket();
        $data->nama = $request->nama;
        $data->harga = $request->harga;
        $data->durasi = $request->durasi;
        $data->jumlahPlayer = $request->jumlahPlayer;
        $data->jenisContent = $request->jenisContent;
        $data->startShow = Carbon::parse($request->startShow)->format('Y-m-d');
        $data->endShow = Carbon::parse($request->endShow)->format('Y-m-d');
        $data->jumlahFile = $request->jumlahFile;
        $data->status = 0;
        $data->save();

        return redirect('/admin/client/setup-paket');
    }

    public function getEditDataMasterPaket($id){
        $paket = Paket::where('id',$id)
            ->get();

        return view('admin.pages.formSetupPaket',['paket'=> $paket, 'id'=>$id]);
    }

    public function editDataMasterPaket($id, Request $request){
        $this->validate($request, [
            'nama' => 'required',
            'harga' => 'required',
            'durasi' => 'required',
            'jumlahPlayer' => 'required',
            'jenisContent' => 'required',
            'startShow' => 'required|date',
            'endShow' => 'required|date',
            'jumlahFile' => 'required',
            'status' => 'required'
        ]);

        Paket::where('id',$id)->update([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'durasi' => $request->durasi,
            'jumlahPlayer' => $request->jumlahPlayer,
            'jenisContent' => $request->jenisContent,
            'startShow' => Carbon::parse($request->startShow)->format('Y-m-d'),
            'endShow' => Carbon::parse($request->endShow)->format('Y-m-d'),
            'jumlahFile' => $request->jumlahFile,
        ]);

        return redirect('/admin/client/setup-paket');
    }

    public function deletePaket ($id){
        Paket::find($id)->delete();

        return redirect('/admin/client/setup-paket');
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
            ->get(['playlist.id','player.nama AS namaplayer','file.nama AS namafile','playlist.duration','layout.nama AS namalayout','playlist.statusLoop','playlist.statusMedia','kategori.nama AS namakategori','paket.nama AS namapaket']);

        return view('admin.pages.setupPlaylist',['playlist'=>$playlist]);
    }

    public function addDataMasterPlaylist(){
        $player = Player::get();
        $media = Media::join('file','file.id','=','media.file_id')->get(['media.id','file.nama']);
        $layout = Layout::get();
        $kategori = Kategori::get();
        $paket = Paket::get();

        return view('admin.pages.formSetupPlaylist',[
            'player' => $player,
            'media' => $media,
            'layout' => $layout,
            'kategori' => $kategori,
            'paket' => $paket
        ]);
    }

    public function storeDataMasterPlaylist(Request $request){
        $this->validate($request, [
            'player_id' => 'required',
            'media_id' => 'required',
            'layout_id' => 'required',
            'kategori_id' => 'required',
            'paket_id' => 'required',
            'duration' => 'required',
            'statusLoop' => 'required',
            'statusMedia' => 'required',
        ]);

        $data = new Playlist();
        $data->player_id = $request->player_id;
        $data->media_id = $request->media_id;
        $data->layout_id = $request->layout_id;
        $data->kategori_id = $request->kategori_id;
        $data->paket_id = $request->paket_id;
        $data->duration = $request->duration;
        $data->statusLoop = $request->statusLoop;
        $data->statusMedia = $request->statusMedia;
        $data->save();

        return redirect('/admin/client/setup-playlist');
    }

    public function getEditDataMasterPlaylist($id){
        $player = Player::get();
        $media = Media::join('file','file.id','=','media.file_id')->get();
        $layout = Layout::get();
        $kategori = Kategori::get();
        $paket = Paket::get();
        $playlist = Playlist::where('id',$id)->get();

        return view('admin.pages.formSetupPlaylist',[
            'paket'=> $paket,
            'player' => $player,
            'playlist' => $playlist,
            'id'=>$id,
            'media' => $media,
            'layout' => $layout,
            'kategori' => $kategori,
            ]);
    }

    public function editDataMasterPlaylist($id, Request $request){
        $this->validate($request, [
            'player_id' => 'required',
            'media_id' => 'required',
            'layout_id' => 'required',
            'kategori_id' => 'required',
            'paket_id' => 'required',
            'duration' => 'required',
            'statusLoop' => 'required',
            'statusMedia' => 'required',
        ]);

        Playlist::where('id',$id)->update([
            'player_id' => $request->player_id,
            'media_id' => $request->media_id,
            'layout_id' => $request->layout_id,
            'kategori_id' => $request->kategori_id,
            'paket_id' => $request->paket_id,
            'duration' => $request->duration,
            'statusLoop' => $request->statusLoop,
            'statusMedia' => $request->statusMedia,
        ]);

        return redirect('/admin/client/setup-playlist');
    }

    public function deletePlaylist ($id){
        Playlist::find($id)->delete();

        return redirect('/admin/client/setup-playlist');
    }

    //=======================================

    //CONTROLLER WITHDRAW AFILIASi
    public function konfirmasiWithdraw (){
        $withdraw = Withdraw::join('users','users.id','=','withdraw.user_id')
            ->get(['users.id AS userid','users.nama','withdraw.tanggal','withdraw.nominal','withdraw.status','users.namaBank','users.nomorRekening','withdraw.id']);

        return view('admin.pages.konfirmasiWithdraw',['withdraw'=>$withdraw]);
    }

    public function makeKonfirmasiWithdraw($id){
        Withdraw::where('id',$id)->update([
            'status' => 1
        ]);

        return redirect('/admin/invoice/konfirmasi-withdraw');
    }

    //================================

    //CONTROLLER PESANAN TAYANG
    public function pesananTayang (){
        $pesanan = Content::join('transaksi','transaksi.id','=','content.transaksi_id')
            ->join('paket','paket.id','=','content.paket_id')
            ->join('playlist','playlist.id','=','content.playlist_id')
            ->join('users','users.id','=','content.user_id')
            ->get(['transaksi.id AS idtrans','paket.nama AS namapaket','playlist.id AS idplaylist','users.nama AS namauser','content.status','content.startTayang','content.endTayang','content.numberFile','content.typeFile','content.urlFile','content.orderFile','content.id as id']);

        return view('admin.pages.pesananTayang',['pesanan'=>$pesanan]);
    }

    public function onPesananTayang($id){
        Content::where('id',$id)->update([
            'status' => 1
        ]);

        return redirect('/admin/invoice/pesanan-tayang');
    }

    public function offPesananTayang($id){
    Content::where('id',$id)->update([
        'status' => 0
    ]);

    return redirect('/admin/invoice/pesanan-tayang');
}

    //=========================

    //CONTROLLER KONFIRMASI PEMBAYARAN
    public function konfirmasiPemabayaran (){
        $konfirmasi = Konfirmasi::join('transaksi','transaksi.id','=','konfirmasi.transaksi_id')
            ->get(['konfirmasi.type','konfirmasi.konfirmasiDari','konfirmasi.tanggal','transaksi.id AS idtransaksi','konfirmasi.namaBank','konfirmasi.namaRekening','konfirmasi.nominal','konfirmasi.status','konfirmasi.validasi','konfirmasi.dataBulb','konfirmasi.id']);

        return view('admin.pages.konfirmasiPemabayaran',['konfirmasi'=>$konfirmasi]);
    }

    public function makeKonfirmasiPemabayaran($id){
        Konfirmasi::where('id',$id)->update([
            'status' => 1,
            'validasi' => 1
        ]);

        return redirect('/admin/invoice/konfirmasi-pembayaran');
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
