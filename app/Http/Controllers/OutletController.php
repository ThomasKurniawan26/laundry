<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\outlet;

class OutletController extends Controller
{
    public function index(Request $request) {
        $DataOutlet = outlet::when(!empty($request->search_outlet), function($query) use ($request) {
            $query->where('id', 'like', '%' . $request->search_outlet . '%' )
            ->orWhere('nama', 'like', '%' . $request->search_outlet . '%')
            ->orWhere('alamat', 'like', '%' . $request->search_outlet . '%')
            ->orWhere('tlp', 'like', '%' . $request->search_outlet . '%');
        })->paginate(10);

        return view('outlet/data_outlet', ['tbl_outlet' => $DataOutlet]);
    }

    public function tambahOutlet(Request $request)
    {
        $newOutlet = new outlet();
        $newOutlet->nama = $request->nama;
        $newOutlet->alamat = $request->alamat;
        $newOutlet->tlp = $request->tlp;

        $newOutlet->save();
        return redirect('/outlet/data_outlet')->with('alert', ['bg' => 'success', 'message' => 'Berhasil menambahkan data outlet.']);
    }
    public function editOutlet(outlet $data_outlet, Request $request){

        $data_outlet->nama = $request->nama;
        $data_outlet->alamat = $request->alamat;
        $data_outlet->tlp = $request->tlp;

        $data_outlet->save();
        return redirect('/outlet/data_outlet')->with('alert', ['bg' => 'success', 'message' => 'data outlet berhasil diedit.']);
     }
        public function deleteOutlet(outlet $data_outlet){
            $data_outlet->delete();
            return redirect('/outlet/data_outlet')->with('alert', ['bg' => 'success', 'message' => 'data outlet berhasil dihapus.']);
     }

}
