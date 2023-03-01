<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\paket;
use App\Models\member;
use App\Models\outlet;
use App\Models\transaksi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\detail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    public function index(Request $request) {
        $DataTransaksi = Transaksi::when(!empty($request->search_transaksi), function($query) use ($request) {
            $query->where('id', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('id_outlet', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('kode_invoice', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('id_member', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('tgl', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('batas_waktu', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('tgl_bayar', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('biaya_tambahan', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('diskon', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('pajak', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('status', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('dibayar', 'like', '%' . $request->search_transaksi . '%')
            ->orWhere('id_user', 'like', '%' . $request->search_transaksi . '%');
        })->paginate(20);

        $dataoutlet = outlet::all();
        $datamember = member::all();
        $dataouser = User::all();
        $datapaket = paket::all();

        return view('/transaksi/data_transaksi', [
            'transaksi' => $DataTransaksi,
            'dataoutlet' => $dataoutlet,
            'datamember' => $datamember,
            'datapaket' => $datapaket,
            'datauser' => $dataouser]);
    }

    public function tambahTransaksi(Request $request)
    {
        
        $newTransaksi = new Transaksi();
        $newTransaksi->id_outlet = $request->id_outlet;
        $newTransaksi->kode_invouce= Str::random(15);
        $newTransaksi->id_member = $request->id_member;
        $newTransaksi->tgl = date('Y-m-d H:i:s', strtotime($request->tgl));
        $newTransaksi->batas_waktu = $request->batas_waktu;
        $newTransaksi->tgl_bayar = date('Y-m-d H:i:s', strtotime($request->tgl_bayar));
        $newTransaksi->biaya_tambahan = $request->biaya_tambahan;
        $newTransaksi->diskon = $request->diskon;
        $newTransaksi->pajak = $request->pajak;
        $newTransaksi->status = 'baru';
        $newTransaksi->dibayar = 'belum_dibayar';
        $newTransaksi->id_user = Auth::User()->id;

        $newTransaksi->save();
        foreach($request ->input('id_paket',[]) as $i => $idpaket){
            detail::create([
                'id_transaksi' => $newTransaksi -> id,
                'id_paket' =>  $idpaket,
                'qty' => $request['qty'][$i],
                'keterangan' => $request['keterangan'][$i],
            ]);
        }
        return redirect('/transaksi/data_transaksi')->with('alert', ['bg' => 'success', 'message' => 'Berhasil menambahkan data transaksi.']);
    }

        public function editTransaksi(transaksi $data_transaksi, Request $request){

            $data_transaksi->status = $request->status;
            $data_transaksi->dibayar = $request->dibayar;
            $data_transaksi->save();
            return redirect('/transaksi/data_transaksi')->with('alert', ['bg' => 'success', 'message' => 'data transaksi berhasil diedit.']);
         }
            public function deleteTransaksi(transaksi $data_transaksi){
                $data_transaksi->delete();
                return redirect('/transaksi/data_transaksi')->with('alert', ['bg' => 'success', 'message' => 'data transaksi berhasil dihapus.']);
         }
         public function DetailTransaksi(transaksi $transaksi){
            $transaksi -> outlet;
            $transaksi -> member;
            $transaksi -> user;
            $totalHargaPaket = $transaksi -> detailTransaksi()->sum('harga');
            $pajak = (($totalHargaPaket / 1000) * $transaksi -> pajak);
            $diskon =(($totalHargaPaket/1000)* $transaksi -> diskon);
            $total_bayar = $totalHargaPaket + $transaksi -> biaya_tambahan + $transaksi -> pajak - $transaksi -> diskon;

            return view('transaksi/detail_transaksi',[
                'transaksi' => $transaksi,
                'pajak' => $pajak,
                'diskon' => $diskon,
                'total_bayar' => $total_bayar,
                'total_harga' => $totalHargaPaket
            ]);
         }
}