<?php
/**
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Couriers;

class CouriersController extends Controller
{
    public function index(){        
        $data_kurir = Couriers::all();
        return view('admin_layouts.couriers.admin_kurir',['data_kurir' => $data_kurir]);
    }

    public function buatkurir(){
        return view('admin_layouts.couriers.admin_tambahkurir');
    }

    public function tambahkurir(Request $request){
        $this->validate($request,[
            'courier' => 'required | unique :couriers',
        ]);

        \App\Couriers::create($request->all());
        return redirect('/admin/kurir')->with('sukses','Kurir baru berhasil di tambahkan');
    }

    public function editkurir($id){
        $data_kurir = Couriers::find($id);
        return view('admin_layouts.couriers.admin_editkurir',['data_kurir' => $data_kurir]);
    }

    public function updatekurir (Request $request, $id){
        $this->validate($request,[
            'courier' => 'required | unique :couriers',
        ]);
        $kurir = Couriers::find($id);
        $kurir ->update($request->all());
        return redirect('/admin/kurir')->with('sukses','Data produk telah diperbaharui');
    }

    public function hapuskurir ($id){
        $kurir = Couriers::find($id);
        $kurir->delete();
        return redirect ('/admin/kurir')->with('sukses','Data produk berhasil dihapus');
    }

}
