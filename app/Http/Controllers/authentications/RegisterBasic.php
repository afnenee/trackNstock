<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Notification;

class RegisterBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }

  // public function register(Request $request)
  // {
  //   $validated = $request->validate([
  //     'name' => 'required|string|max:255',
  //     'email' => 'required|email|unique:users,email',
  //     'password' => 'required|string|min:6|confirmed',
  //   ]);

  //   $user = User::create([
  //     'name' => $validated['name'],
  //     'email' => $validated['email'],
  //     'password' => Hash::make($validated['password']),
  //   ]);

  //   event(new Registered($user));

  //   return redirect('/')->with('success', 'Registered successfully. Please check your email for verification.');
  // }

  // app/Http/Controllers/Auth/RegisterController.php

  // public function register(Request $request)
  // {
  //   $this->validator($request->all())->validate();

  //   $user = $this->create($request->all());

  //   event(new Registered($user));

  //   Auth::login($user);

  //   return redirect()->route('verification.notice');
  // }
  // public function register(Request $request)
  // {
  //   $validated = $request->validate([
  //     'name' => 'required|string|max:255',
  //     'email' => 'required|email|unique:users,email',
  //     'password' => 'required|string|min:6|confirmed',
  //   ]);

  //   $user = User::create([
  //     'name' => $validated['name'],
  //     'email' => $validated['email'],
  //     'password' => Hash::make($validated['password']),
  //   ]);

  //   event(new Registered($user));
  //   $user->sendEmailVerificationNotification();

  //   return redirect()->route('verification.notice')
  //     ->with('success', 'Registered successfully. Please check your email for verification.');
  // }
  public function register(Request $request)
  {
    $validated = $request->validate([
      'name' => 'required|string|max:255',
      'email' => 'required|email|unique:users,email',
      'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::create([
      'name' => $validated['name'],
      'email' => $validated['email'],
      'password' => Hash::make($validated['password']),
    ]);

    event(new Registered($user));

    // Send email verification notification
    $user->sendEmailVerificationNotification();

    // Redirect to the email verification notice page
    return redirect()->route('verification.notice')
      ->with('success', 'Registered successfully. Please check your email for verification.');
  }

}
