<?php

namespace App\Http\Controllers;

use App\Content;
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
            return redirect()->back()->with('alert-success','Layout berhasil dihapus');
        }
        else{
            return redirect()->back()->with('alert-fail','Layout gagal dihapus,karena layout sedang digunakan');
        }
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

    public function masterAfiliasi (){
        $afiliasi = Komisi::join('users','users.id','=','komisi.user_id')
            ->get(['komisi.persentase','komisi.tanggal','users.namaBank','users.nomorRekening','users.namaRekening','komisi.afiliasiFrom','users.linkAfiliasi']);

        return view('admin.pages.masterAfiliasi',['afiliasi'=>$afiliasi]);
    }

    public function setupPaket (){
        $paket = Paket::get();

        return view('admin.pages.setupPaket',['paket'=>$paket]);
    }

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

    public function pesananTayang (){
        $pesanan = Content::join('transaksi','transaksi.id','=','content.transaksi_id')
            ->join('paket','paket.id','=','content.paket_id')
            ->join('playlist','playlist.id','=','content.playlist_id')
            ->join('users','users.id','=','content.user_id')
            ->get(['transaksi.id AS idtrans','paket.nama AS namapaket','playlist.id AS idplaylist','users.nama AS namauser','content.status','content.startTayang','content.endTayang','content.numberFile','content.typeFile','content.urlFile','content.orderFile']);

        return view('admin.pages.pesananTayang',['pesanan'=>$pesanan]);
    }

    public function konfirmasiPemabayaran (){
        $konfirmasi = Konfirmasi::join('transaksi','transaksi.id','=','konfirmasi.transaksi_id')
            ->get(['konfirmasi.type','konfirmasi.konfirmasiDari','konfirmasi.tanggal','transaksi.id','konfirmasi.namaBank','konfirmasi.namaRekening','konfirmasi.nominal','konfirmasi.status','konfirmasi.validasi','konfirmasi.dataBulb']);

        return view('admin.pages.konfirmasiPemabayaran',['konfirmasi'=>$konfirmasi]);
    }

    public function konfirmasiWithdraw (){
        $withdraw = Withdraw::join('users','users.id','=','withdraw.user_id')
            ->get(['users.id','users.nama','withdraw.tanggal','withdraw.nominal','withdraw.status','users.namaBank','users.nomorRekening']);

        return view('admin.pages.konfirmasiWithdraw',['withdraw'=>$withdraw]);
    }

}
