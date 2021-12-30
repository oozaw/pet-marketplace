<?php
/**
 */
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
// use Auth;
use IIluminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and 
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide  its functionality to your applications.
    |
    */

    
    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
     protected $redirectTo = '/welcome' ;
   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
    public function __construct()
    {
            $this->middleware('guest')->except('logout');
            $this->middleware('guest:admin')->except('logout');
            $this->middleware('guest:costumer')->except('logout');
            $this->middleware('guest:user')->except('logout');
    }

     public function showAdminLoginForm()
    {
        return view('auth.login', ['url' => 'admin']);
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect('admin/dashboard');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

     public function showCostumerLoginForm()
    {
        return view('auth.login', ['url' => 'costumer']);
    }

    public function costumerLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('costumer')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('/costumer');
        }
        return back()->withInput($request->only('email', 'remember'));
    }

    public function logoutadmin(){
        Auth::guard('admin')->logout();
        session()->flush();

        return redirect('/login/admin');
    }
    
}