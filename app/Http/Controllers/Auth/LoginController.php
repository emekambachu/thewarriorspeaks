<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Services\Auth\LoginService;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    private $login;
    public function __construct(LoginService $login){
        $this->login = $login;
        $this->middleware('guest')->except('logout');
    }

    public function login(LoginRequest $request): \Illuminate\Http\JsonResponse
    {
        try {
            $data = $this->login->adminLogin($request);
            return response()->json([
                'success' => $data['success'],
                'message' => $data['message'],
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ]);
        }
    }

    //add for logout function to work
    use AuthenticatesUsers {
        logout as performLogout;
    }

    //perform logout
    public function logout(): \Illuminate\Http\JsonResponse
    {
        Auth::guard('web')->logout();
        return response()->json([
            'success' => true,
            'message' => "Logged out",
        ]);
    }
}
