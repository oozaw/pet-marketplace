<?php
/**
 */
namespace App\Http\Controllers;

use App\Categories;
use Illuminate\Http\Request;


class CategoriesController extends Controller
{
    public function index(){
        $data_kategori = Categories::all();
        return view('admin_layouts.categories.admin_kategori',['data_kategori' => $data_kategori]);
    }

    public function buatkategori(){
        return view('admin_layouts.categories.admin_tambahkategori');
    }

    public function tambahkategori (Request $request){
        $this->validate($request,[
            'category_name' => 'required|min:5',
        ]);

        // dd($request);
        \App\Categories::create($request->all());
        return redirect('/admin/kategori')->with('sukses','Kategori baru berhasil di tambahkan');
    }

    public function editkategori ($id){


        $data_kategori = Categories::find($id);
        return view('admin_layouts.categories.admin_editkategori',['data_kategori' => $data_kategori]);
    }

    public function updatekategori(Request $request, $id){
        $this->validate($request,[
            'category_name' => 'required|min:5',

        ]);

        $kategori = Categories::find($id);
        $kategori ->update($request->all());
        return redirect('/admin/kategori')->with('sukses','Data kategori telah diperbaharui');
    }

    public function hapuskategori($id){
        $kategori = Categories::find($id);
        $kategori->delete();
        return redirect ('/admin/kategori')->with('sukses','Data kategori berhasil dihapus');
    }

    
}
