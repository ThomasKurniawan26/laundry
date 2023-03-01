<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\member;

class MemberController extends Controller
{
    public function index(Request $request) {
        $DataMember = member::when(!empty($request->search_member), function($query) use ($request) {
            $query->where('id', 'like', '%' . $request->search_member . '%' )
            ->orWhere('nama', 'like', '%' . $request->search_member . '%')
            ->orWhere('alamat', 'like', '%' . $request->search_member . '%')
            ->orWhere('jenis_kelamin', 'like', '%' . $request->search_member . '%')
            ->orWhere('tlp', 'like', '%' . $request->search_member . '%');
        })->paginate(10);

        return view('member/data_member', ['tbl_member' => $DataMember]);
    }

    public function tambahMember(Request $request)
    {
        $newMember = new member();
        $newMember->nama = $request->nama;
        $newMember->alamat = $request->alamat;
        $newMember->jenis_kelamin = $request->jenis_kelamin;
        $newMember->tlp = $request->tlp;

        $newMember->save();
        return redirect('/member/data_member')->with('alert', ['bg' => 'success', 'message' => 'Berhasil menambahkan data member.']);
    }

        public function editMember(member $data_member, Request $request){

            $data_member->nama = $request->nama;
            $data_member->alamat = $request->alamat;
            $data_member->jenis_kelamin = $request->jenis_kelamin;
            $data_member->tlp = $request->tlp;

            $data_member->save();
            return redirect('/member/data_member')->with('alert', ['bg' => 'success', 'message' => 'data member berhasil diedit.']);
         }
            public function deleteMember(member $data_member){
                $data_member->delete();
                return redirect('/member/data_member')->with('alert', ['bg' => 'success', 'message' => 'data member berhasil dihapus.']);
         }
}
