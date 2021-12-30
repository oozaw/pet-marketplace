<?php
/**
 */
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;
use App\Categories;
use App\Discounts;
use App\ProductImages;
use Illuminate\Support\Facades\Storage;

class ProductsController extends Controller
{
    public function index(){
        $data_produk = Products::all();
        return view('admin_layouts.product.admin_produk',['data_produk' => $data_produk]);
    }

    public function buatproduk(){
        $data_kategori = Categories::all();
        return view('admin_layouts.product.admin_tambahproduk', compact('data_kategori'));
    }

    public function tambahproduk(Request $request){
        // dd($request);

        $this->validate($request,[
            'product_name' => 'required | min :6',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'description' => 'required',

        ]);

        $tambahproduk = Products::create($request->all());
        // dd($request->pilih_foto);
        if($tambahproduk){
            $files = [];
            foreach($request->file('pilih_foto') as $foto){
                if($foto->isValid()){
                    $nama_image = md5(now().'_').$foto->getClientOriginalName();
                    $foto->storeAs('img/gambarproduk',$nama_image);
                    $files[] = [
                        'product_id' => $tambahproduk->id,
                        'image_name' => $nama_image,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ];

                }
            }
            ProductImages::insert($files);

        }

        $tambahproduk -> kategori()->attach(request('pilih_kategori'));
        // $tambahproduk -> productimage()->attach(request('pilih_foto'));

        // $tambahproduk = Products::all();
        // $tambahproduk = Products::create($request->all());
        // $tambahproduk -> kategori()->attach(request('pilih_kategori'));
        return redirect('/admin/produk')->with('sukses','Produk baru berhasil di tambahkan');
    }

    public function viewproduk ($id){
        $data_produk = Products::find($id);
        $daftarkategori = $data_produk->kategori->pluck('category_name')->toArray();
        $daftardiskon = Discounts::where('id_product',$data_produk->id)->get();
        // dd($daftardiskon);
        return view('admin_layouts.product.admin_viewproduk',['data_produk' => $data_produk, 'daftarkategori' => $daftarkategori, 'daftardiskon' => $daftardiskon]);
    }

    public function editproduk ($id){
        $data_kategori = Categories::all();
        $data_produk = Products::find($id);
        $daftar_kategori = $data_produk -> kategori;

        return view('admin_layouts.product.admin_editproduk',['data_produk' => $data_produk, 'daftar_kategori' => $daftar_kategori], compact('data_kategori'));
    }

    public function updateproduk(Request $request, $id){
        $this->validate($request,[
            'product_name' => 'required | min :6',
            'price' => 'required',
            'stock' => 'required',
            'weight' => 'required',
            'description' => 'required',

        ]);

        $produk = Products::find($id);
        $produk ->update($request->all());
        $kategori_baru = request('pilih_kategori');

        $produk -> kategori() ->sync($kategori_baru);

        return redirect('/admin/produk')->with('sukses','Data produk telah diperbaharui');
    }

    public function hapusproduk ($id){
        $produk = Products::find($id);
        $produk->delete();
        return redirect ('/admin/produk')->with('sukses','Data produk berhasil dihapus');
    }

    public function buatfoto ($id){
        $produk = Products::find($id);

        $this->data['productID'] = $produk->id;
        $this->data['productImages'] = $produk->productimage;

        return view('admin_layouts.product.admin_fotoproduk', $this->data, ['produk' => $produk]);
    }

    public function hapusfoto (ProductImages $produkimage){

        
        Storage::delete('img/gambarproduk/'.$produkimage->image_name);
        $produkimage->delete();
        // dd('img/gambarproduk/'.$produkimage->product_id);
        // dd($produkimage->product_id);

        return redirect('admin/produk/'.$produkimage->product_id.'/view')->with('sukses','Foto produk berhasil dihapus');
    }

    public function uploadfoto (Products $produk, Request $request){
        // $data_produk = Products::find($id);

        // dd($request->pilih_foto);
        // dd($produk->id);
        

        $files = [];

        foreach($request->file('pilih_foto') as $foto){
            // dd($request->file('pilih_foto'));
            if($foto->isValid()){
                $nama_image = md5(now().'_').$foto->getClientOriginalName();
                $foto->storeAs('img/gambarproduk',$nama_image);
                $files[] = [
                    'product_id' => $produk->id,
                    'image_name' => $nama_image,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];

            }
        }
        ProductImages::insert($files);
        return redirect('admin/produk/'.$produk->id.'/view')->with('sukses','Foto produk berhasil ditambahkan');
    }


}
