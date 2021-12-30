<?php
/**
 */
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::view('/', 'welcome');
Auth::routes();

Route::group(['middleware'=> ['guest']],function () {
    Route::get('/login/admin', 'Auth\LoginController@showAdminLoginForm');
    Route::get('/register/admin', 'Auth\RegisterController@showAdminRegisterForm');
    
    Route::post('/login/admin', 'Auth\LoginController@adminLogin');
    Route::post('/register/admin', 'Auth\RegisterController@createAdmin');
});

Route::get('/login/costumer', 'Auth\LoginController@showCostumerLoginForm');
Route::get('/register/costumer', 'Auth\RegisterController@showCostumerRegisterForm');

Route::post('/login/costumer', 'Auth\LoginController@costumerLogin');
Route::post('/register/costumer', 'Auth\RegisterController@createCostumer');

Route::view('/home', 'home')->middleware('auth');
Route::view('/admin', 'admin/dashboard');
Route::view('/costumer', 'costumer');

Route::get('/logout/admin', 'Auth\LoginController@logoutadmin');


/*
|--------------------------------------------------------------------------
| LOGIN
|--------------------------------------------------------------------------
*/

Route::get('loginuser', function () {
    return view('newLogin');
});

Route::get('sigupnuser', function () {
    return view('newRegister');   
});

Route::get('forgotpass', function () {
    return view('newForget');
});

Route::get('login_master', function () {
    return view('/login/login_master');
});

Route::get('loginadmin', function () {
    return view('newLoginAdmin');
});





/*
|--------------------------------------------------------------------------
| LOGIN 2
|--------------------------------------------------------------------------
*/


 Route::get('/new-login', function(){
     return view ('newLogin');
});

Route::get('/new-register', function(){
    return view ('newRegister');
});

Route::get('/new-forget', function(){
    return view ('newForget');
});

Auth::routes(['verify' => true]);
// Route::get('/', function () {
//     return view('/welcome');
// });

Route::get('/', 'WelcomeController@index');

Route::get('/login');
 
Auth::routes(['verify' => true]);
 
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/welcome', 'WelcomeController@index')->name('/welcome');



/*
|--------------------------------------------------------------------------
| USER
|--------------------------------------------------------------------------
*/


// Route::get('about', function () {
//     return view('/user_layouts/user_about');
// });

// Route::get('kategori', function () {
//     return view('/user_layouts/user_kategori');
// });

Route::get('/about','MainController@about');
Route::get('/kategori','MainController@tampilproduk');
Route::get('/kategori/{product_categories:id}','MainController@kategorifilter');
Route::get('/produk/{produk:id}/tampil','MainController@tampildetailproduk');


Route::group(['middleware'=> ['auth']],function (){
    
    Route::get('/profile', 'MainController@tampilprofile')->name('profile');
    Route::get('/produk/cart','CartController@cartproduk');
    Route::delete('/produk/cart/{cart:id}/deletecart','CartController@hapuscart');
    Route::post('/cart/store','CartController@store');

    Route::get('/produk/checkout','CheckoutController@checkoutproduk');
    Route::post('/produk/cekongkir','CheckoutController@cekongkir');
    Route::post('/produk/checkout-produk','CheckoutController@store');
    Route::get('/produk/upload-pembayaran/{id}','CheckoutController@konfirmasiproduk');
    Route::post('/produk/cancel/{id}','CheckoutController@cancelproduk');

    // Belum isi fungsi upload foto sama kurangi data stock
    Route::post('/produk/uploadpembayaran/{id}','CheckoutController@uploadpembayaran');
    Route::get('/produk/sukses-bayar/{id}','CheckoutController@suksesbayar');


    Route::get('/produk/buynow','BuyNowController@buynow');
    Route::post('/produk/store/buynow','BuyNowController@storebuynow');
    Route::delete('/produk/buynow/{cart:id}/hapusbuynow','BuyNowController@hapusbuynow');
    // Route::get('/cardpage_2', function () {
    //     return view('/user_layouts/user_cardpage_2');
    // });
    Route::post('/produk/addqty/{id}','CheckoutController@addqty');
    Route::post('/produk/minusqty/{id}','CheckoutController@minusqty');
    
    // Route::get('/cardpage_3', function () {
    //     return view('/user_layouts/user_cardpage_3');
    // });
    
    // Route::get('/cardpage_4', function () {
    //     return view('/user_layouts/user_cardpage_4');
    // });

    Route::post('/produk/addqty/{id}','CartController@addqty');
    Route::post('/produk/minusqty/{id}','CartController@minusqty');
    
    Route::get('/user/read-notif/{id}','MainController@readNotifUser');

    // Route::get('/checkout', function () {
    //     return view('/user_layouts/user_checkout');
    // });
    
    // Route::get('/pesan', function () {
    //     return view('/user_layouts/user_pesan');
    // });
    
    // Route::get('/notifikasi', function () {
    //     return view('/user_layouts/user_notifikasi');
    // });

    Route::get('/notifikasi','MainController@tampilnotifikasi');

    Route::get('/edit_profile/{id}','MainController@editfotoprofile');
    Route::post('/profile/uploadfoto/{id}','MainController@uploadfotoprofile');

});
// Route::get('user_item', function () {
//     return view('/user_layouts/user_item');
// });

// Route::get('cardpage_1', function () {
//     return view('/user_layouts/user_cardpage_1');
// });

// Route::get('profile', function () {
//     return view('/user_layouts/user_profile');
// });




/*
|--------------------------------------------------------------------------
| ADMIN
|--------------------------------------------------------------------------
*/

Route::group(['middleware'=> ['auth:admin']],function () {
    
    Route::get('admin/dashboard', function () {
        return view('/admin_layouts/admin_dashboard');
    });
    
    // Route::get('admin/transaksi', function () {
    //     return view('/admin_layouts/admin_transaksi');
    // });

    Route::get('/admin/transaksi','AdminDashboardController@index');
    Route::get('/admin/detail-transaksi/{id}/view','AdminDashboardController@viewdetail');
    Route::post('/admin/transaksi/{id}/status','AdminDashboardController@updatestatus');
    Route::post('/admin/transaksi/{id}/verifikasi','AdminDashboardController@verifikasipembayaran');
    Route::get('/admin/read-notif/{id}','AdminDashboardController@readNotif');


    //Buat editfoto dan tampilan profile admin
    Route::get('/edit_profile/{id}','MainController@editfotoprofile');
    Route::post('/profile/uploadfoto/{id}','MainController@uploadfotoprofile');


    // Route::get('admin/produk', function () {
    //     return view('/admin_layouts/product/admin_produk');
    // });


    /*
    |--------------------------------------------------------------------------
    | PRODUK
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/produk','ProductsController@index');
    Route::get('/admin/produk/buat','ProductsController@buatproduk');
    Route::post('/admin/produk/create','ProductsController@tambahproduk');
    Route::get('/admin/produk/{id}/view','ProductsController@viewproduk');
    Route::get('/admin/produk/{id}/edit','ProductsController@editproduk');
    Route::post('/admin/produk/{id}/update','ProductsController@updateproduk');
    Route::post('/admin/produk/{id}/delete','ProductsController@hapusproduk');

    /*
    |--------------------------------------------------------------------------
    | FOTO PRODUK
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/produk/{id}/buatfoto','ProductsController@buatfoto');
    Route::post('/admin/produk/{produk:id}/updategambar','ProductsController@uploadfoto');
    Route::delete('/admin/produk/{produkimage:id}/deletegambar','ProductsController@hapusfoto');

    // Route::get('/admin/produk/{id}/createfoto','ProductsController@tambahfoto');
    // Route::post('/admin/produk/{id}','ProductsController@uploadfoto');
    // Route::delete('/admin/produk/{id}','ProductsController@hapusfoto');

    /*
    |--------------------------------------------------------------------------
    | KATEGORI
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/kategori','CategoriesController@index');
    Route::get('/admin/kategori/buat','CategoriesController@buatkategori');
    Route::post('/admin/kategori/create','CategoriesController@tambahkategori');
    Route::get('/admin/kategori/{id}/edit','CategoriesController@editkategori');
    Route::post('/admin/kategori/{id}/update','CategoriesController@updatekategori');
    Route::post('/admin/kategori/{id}/delete','CategoriesController@hapuskategori');


    /*
    |--------------------------------------------------------------------------
    | Kurir
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/kurir','CouriersController@index');
    Route::get('/admin/kurir/buat','CouriersController@buatkurir');
    Route::post('/admin/kurir/create','CouriersController@tambahkurir');
    Route::get('/admin/kurir/{id}/edit','CouriersController@editkurir');
    Route::post('/admin/kurir/{id}/update','CouriersController@updatekurir');
    Route::post('/admin/kurir/{id}/delete','CouriersController@hapuskurir');


    /*
    |--------------------------------------------------------------------------
    | Diskon
    |--------------------------------------------------------------------------
    */
    Route::get('/admin/diskon','DiscountsController@index');
    Route::get('/admin/diskon/buat','DiscountsController@buatdiskon');
    Route::get('/admin/diskon/{diskon:id}/viewdiskon','DiscountsController@viewdiskon');
    Route::post('/admin/diskon/create','DiscountsController@creatediskon');
    Route::get('/admin/diskon/{diskon:id}/editdiskon','DiscountsController@editdiskon');
    Route::post('/admin/diskon/{diskon:id}/updatediskon','DiscountsController@updatediskon');
    Route::delete('/admin/diskon/{diskon:id}/deletediskon','DiscountsController@hapusdiskon');


    // Route::get('admin/tambah_produk', function () {
    //     return view('/admin_layouts/admin_tambahproduk');
    // });

    // Route::get('admin/edit_produk', function () {
    //     return view('/admin_layouts/admin_editproduk');
    // });

    // Route::get('admin/view_produk', function () {
    //     return view('/admin_layouts/admin_viewproduk');
    // });

    // Route::get('admin/tambah_foto_produk', function () {
    //     return view('/admin_layouts/admin_fotoproduk');
    // });

    // Route::get('admin/diskon_produk', function () {
    //     return view('/admin_layouts/admin_diskon');
    // });

    // Route::get('admin/tambah_diskon', function () {
    //     return view('/admin_layouts/admin_tambahdiskon');
    // });

    // Route::get('admin/edit_diskon', function () {
    //     return view('/admin_layouts/admin_editdiskon');
    // });

    // Route::get('admin/kategori', function () {
    //     return view('/admin_layouts/admin_kategori');
    // });

    // Route::get('admin/tambah_kategori', function () {
    //     return view('/admin_layouts/admin_tambahkategori');
    // });

    // Route::get('admin/edit_kategori', function () {
    //     return view('/admin_layouts/admin_editkategori');
    // });

    // Route::get('admin/kurir', function () {
    //     return view('/admin_layouts/admin_kurir');
    // });

    // Route::get('admin/tambah_kurir', function () {
    //     return view('/admin_layouts/admin_tambahkurir');
    // });

    // Route::get('admin/edit_kurir', function () {
    //     return view('/admin_layouts/admin_editkurir');
    // });

});