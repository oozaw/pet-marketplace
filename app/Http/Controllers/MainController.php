<?php
/**
 */
namespace App\Http\Controllers;

use App\Categories;
use App\Discounts;
use Illuminate\Http\Request;
use App\Products;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Transactions;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\UserNotifications;

class MainController extends Controller
{
    public function tampilproduk(){
        $data_kategori = Categories::all();
        $data_produk = Products::paginate(9);
        $hariini = Carbon::now()->setTimezone('GMT+8');
        $tanggal_hariini = Carbon::parse($hariini);
        
        // $data_produk = Products::all()->paginate(7);
        // $diskon = Discounts::with('produk')->orderBy('id','desc')->get();
        // dd($tanggal_hariini);
        // $category->with('languages')->limit(4);

        return view('user_layouts.user_kategori',['data_produk' => $data_produk, 'data_kategori' => $data_kategori, 'tanggal_hariini' => $tanggal_hariini]);
    }

    public function kategorifilter($product_categories){
        // dd($product_categories);
        $data_kategori = Categories::all();
        $value = $product_categories;
        $filterkategori = Products::whereHas('kategori', function ($query) use ($value) {
            return $query->where('category_id', '=',  $value);
        })->paginate(6);

        // dd($filterkategori);
        return view('user_layouts.user_kategorifilter',['filterkategori' => $filterkategori, 'data_kategori' => $data_kategori]);
    }

    public function tampildetailproduk (Products $produk){


        $data_kategori = Categories::all();
        return view('user_layouts.user_item', ['produk'=>$produk, 'data_kategori'=>$data_kategori]);
    }

    public function about (){
        $data_kategori = Categories::all();

        return view('user_layouts.user_about', ['data_kategori' => $data_kategori]);
    }

    public function tampilprofile(){
        $data_transaksi = Transactions::where('user_id', Auth::user()->id)->get();
        // $data_user = User::find($id);


        return view('user_layouts.user_profile', compact('data_transaksi'));
    }

    public function editfotoprofile($id){
        $data_user = User::find($id);
        

        return view('user_layouts.edit_profile', compact('data_user'));
    }

    public function uploadfotoprofile ($id, Request $request){
        $data_user = User::find($id);

        foreach($request->file('foto_user') as $foto){
            // dd($data_transaksi->produk->pluck('id'));

            $nama_image = md5(now().'_').$foto->getClientOriginalName();
            $foto->storeAs('img/fotoprofilepengguna',$nama_image);

            $data_user = User::find($id);
            $data_user->profile_image = $nama_image;
            // $data_transaksi->status = 'verified';
            $data_user->save();

        }

        return redirect('/profile');
    }

    public function readNotifUser($id)
    {
        $notif = UserNotifications::find($id);
        $notif->read_at = NOW();
        $notif->save();
 
        return response()->json(['code' => 200]);
    }

    public function tampilnotifikasi(){
        $data_usernotofikassi = UserNotifications::where('notifiable_id', Auth::user()->id)->where('read_at', null)->orderBy('created_at','desc')->get();
        // $data_cart= Carts::where('user_id', Auth::user()->id)->where('status', 'notyet')->get();

        return view('/user_layouts/user_notifikasi', compact('data_usernotofikassi'));
    }

}
