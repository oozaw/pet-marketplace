<?php
/**
 */
namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\ActivationService;

class AuthController extends Controller
{

protected $activationService;



public function __construct(ActivationService $activationService)
{
    $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    $this->activationService = $activationService;
}

public function register(Request $request)
{
    $validator = $this->validator($request->all());

    if ($validator->fails()) {
        $this->throwValidationException(
            $request, $validator
        );
    }

    $user = $this->create($request->all());

    $this->activationService->sendActivationMail($user);

    return redirect('/login')->with('status', 'We sent you an activation code. Check your email.');
}
}