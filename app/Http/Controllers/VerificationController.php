<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VerificationController extends Controller
{    // VerificationController.php
public function index()
{
    return view('/email/verify');
}

public function verify(Request $request)
{
    // Handle the email verification logic
}

public function resend(Request $request)
{
    // Handle resending of verification emails
}

}
