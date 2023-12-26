<?php

namespace App\Http\Responses;

use Illuminate\Support\Facades\Auth;
use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    public function toResponse($request)
    {
        // below is the existing response
        // replace this with your own code
        // the user can be located with Auth facade
        $route  = config('fortify.home');

        if (Auth::user()->isClub()) {
            $route = config('fortify.club');
        }

        if (Auth::user()->isStaff()) {
            $route = config('fortify.staff');
        }

        return $request->wantsJson()
                    ? response()->json(['two_factor' => false])
                    : redirect()->intended($route);
    }
}
