<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ForgotPasswordController extends Controller
{
    public function index()
    {
        return view('content.authentications.auth-forgot-password-basic');
    }

    public function sendResetLink(Request $request)
    {
        // Handle the sending of the reset link here
    }

    public function sendResetLinkEmail(Request $request)
    {
        // Handle sending reset link via email
    }
}
