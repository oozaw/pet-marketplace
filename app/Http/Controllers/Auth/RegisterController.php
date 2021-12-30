<?php
/**
 */
namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Costumer;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
     protected $redirectTo = '/home';
    

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:admin');
        $this->middleware('guest:costumer');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' =>'required|string|max:255', 
            'email' =>'required|string|email|max:255|unique:users',
            'password' =>'required|string|min:6|confirmed',
             
             ]);
    }
   
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showAdminRegisterForm()
    {
        return view('auth.register', ['url' => 'admin']);
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showCostumerRegisterForm()
    {
        return view('auth.register', ['url' => 'costumer']);
    }

    /**
     * @param array $data
     *
     * @return mixed
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),

            // $foto = $data['foto_pengguna'],
            // $nama_image = md5(now().'_').$foto->getClientOriginalName(),
            // $foto->storeAs('img/profilepengguna',$nama_image),
            // 'profile_image' => $nama_image,

            
            // foreach($data->file('foto_pengguna') as $foto){
            //     // dd($data_transaksi->produk->pluck('id'));
    
            //     $nama_image = md5(now().'_').$foto->getClientOriginalName();
            //     $foto->storeAs('img/profilepengguna',$nama_image);

            //     $data_transaksi = Transactions::find($id);
            //     $data_transaksi->proof_of_payment = $nama_image;

            //     $data_transaksi->save();
    
            // }
           
        ]);

    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createAdmin(Request $request)
    {
        $this->validator($request->all())->validate();
        Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),

            // $foto = $data['foto_pengguna'],
            // $nama_image = md5(now().'_').$foto->getClientOriginalName(),
            // $foto->storeAs('img/profilepengguna',$nama_image),
            // 'profile_image' => $nama_image,

          
        ]);
        return redirect()->intended('login/admin');
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    protected function createCostumer(Request $request)
    {
        $this->validator($request->all())->validate();
        Costumer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            
        ]);
        return redirect()->intended('login/costumer');
    }
     
    
} 