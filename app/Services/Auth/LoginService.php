<?php

namespace App\Services\Auth;

use Illuminate\Support\Facades\Auth;

/**
 * Class LoginService.
 */
class LoginService
{
    public function adminLogin($request): array
    {

        if(Auth::guard('web')->attempt([
            'email' => $request->email,
            'password' => $request->password
        ],
            $request->get('remember'))) {
            return [
                'success' => true,
                'message' => 'user authenticated',
            ];
        }
        return [
            'success' => false,
            'message' => 'unauthenticated user',
        ];
    }

    public function adminLogout(): array
    {
        Auth::guard('web')->logout();
        return [
            'success' => true,
            'message' => "Logged out",
        ];
    }
}
