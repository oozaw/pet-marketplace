<?php
/**
 */
namespace App\Http\Controllers;

use App\AdminNotifications;
use Illuminate\Http\Request;
use App\Transactions;
use Carbon\Carbon;
use App\Products;
use App\User;
use Illuminate\Support\Facades\Auth;

class AdminDashboardController extends Controller
{
   public function index(){
       $data_transaksi = Transactions::all();
       $hariini = Carbon::now()->setTimezone('GMT+8');
       
       foreach ($data_transaksi as $transaksi){
           $batas_waktu = $transaksi->timeout;
           
           $tanggal_hariini = Carbon::parse($hariini);
           $end_date = Carbon::parse($batas_waktu);
           if($transaksi->status == 'unverified'){
               if($tanggal_hariini >= $end_date){
                   $transaksi->status = 'expired';
                   $transaksi->save();
                }
            }
        }
        
        //    dd($newDateTime);
        foreach ($data_transaksi as $transaksi){
            $id_pelanggan= User::find($transaksi->user_id);
            $tambahlimamenit = $transaksi->updated_at->addMinutes(5)->toTimeString();

            $tanggal_hariini = Carbon::parse($hariini);
            $waktu_kirim = Carbon::parse($tambahlimamenit);

            if($transaksi->status == 'verified'){
                if($tanggal_hariini >= $waktu_kirim){
                    $transaksi->status = 'delivered';
                    $transaksi->save();
                    // return ('Barang terkirim');

                    $user = User::find($transaksi->user_id);
                    $data = [
                        'nama'=>$id_pelanggan->name,
                        'massage'=>'Barang pesanan sedang dalam perjalanan',
                        'id'=>$transaksi->id
                    ];
                    
                    // dd($user);
                    $data_encode = json_encode($data);
            
                    $user->createNotifUser($data_encode);
                }

            }
        }
       
       return view('admin_layouts.admin_transaksi', compact('data_transaksi'));
   }

   public function viewdetail($id){
       $data_transaksi = Transactions::find($id);
    //    return ($data_transaksi->proof_of_payment);

       return view('admin_layouts.admin_transaksi_view', compact('data_transaksi'));
   }

   public function readNotif($id)
   {
       $notif = AdminNotifications::find($id);
       $notif->read_at = NOW();
       $notif->save();

       return response()->json(['code' => 200]);
   }

   public function updatestatus(Request $request, $id){
        $data_transaksi = Transactions::find($id);
        $id_pelanggan= User::find($data_transaksi->user_id);
        // dd($request->pilih_status);
        // $data_transaksi ->update($request->all());

        $data_transaksi->status = $request->pilih_status;
        $data_transaksi->save();

        $user = User::find($data_transaksi->user_id);
        $data = [
            'nama'=>$id_pelanggan->name,
            'massage'=>'produk telah diterima dengan selamat',
            'id'=>$data_transaksi->id
        ];
        
        // dd($user);
        $data_encode = json_encode($data);

        $user->createNotifUser($data_encode);

        return redirect('/admin/transaksi');
   }

   public function verifikasipembayaran ($id, Request $request){
        $data_transaksi= Transactions::find($id);
        $id_pelanggan= User::find($data_transaksi->user_id);
        // dd($id_pelanggan->name);

        $data_transaksi = Transactions::find($id);
        $data_transaksi->status = $request->pilih_status;
        $data_transaksi->save();

        if($request->pilih_status == 'canceled'){
    
            $user = User::find($data_transaksi->user_id);
            $data = [
                'nama'=>$id_pelanggan->name,
                'massage'=>'transaksi anda telah dibatalkan karena tidak sesuai ketentuan',
                'id'=>$data_transaksi->id
            ];
            
            // dd($user);
            $data_encode = json_encode($data);
    
            $user->createNotifUser($data_encode);
        }

        if($request->pilih_status == 'verified'){
            foreach($data_transaksi->detail_transaksi as $transaksi){
                // --Buat saat barang di checkout maka stock barang akan di kurangi dengan qty--
                $stock_barang = $data_transaksi->produk[0]->stock;
                $jumlah_beli = $data_transaksi->detail_transaksi[0]->qty;
                // $w = $stock_barang - $jumlah_beli;
    
                // dd($w);
    
                Products::where('id', $transaksi->product_id )->update([
                    'stock' => $stock_barang - $jumlah_beli
                ]);
            }
    
            $user = User::find($data_transaksi->user_id);
            $data = [
                'nama'=>$id_pelanggan->name,
                'massage'=>'pembayaran anda telah terverifikasi',
                'id'=>$data_transaksi->id
            ];
            
            // dd($user);
            $data_encode = json_encode($data);
    
            $user->createNotifUser($data_encode);
        }


        return redirect('/admin/transaksi');
   }
}
