<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class RedirectAfterLoginController extends Controller
{
    public function __invoke(): RedirectResponse
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Check if email is verified (only if User implements MustVerifyEmail)
        if (
            $user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail &&
            !$user->hasVerifiedEmail()
        ) {
            return redirect()->back()->with('message', 'Please verify your email address.');
        }

        return match ((int) $user->role) {
            1 => redirect()->route('admin.dashboard'),
            2 => redirect()->route('sub_admin.dashboard'),
            3 => redirect()->route('user.dashboard'),
            default => redirect()->route('dashboard'),
        };
    }
}
