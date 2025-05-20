<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;

class CustomVerificationController  extends BaseController
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function redirectPath()
    {
        return $this->redirectTo;
    }
    protected $redirectTo = '/redirects_after_login';

    public function verify(Request $request)
    {
        if (
            $request->route('id') == $request->user()->getKey() &&
            hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))
        ) {
            $request->user()->markEmailAsVerified();
        }

        return redirect($this->redirectPath());
    }
}
