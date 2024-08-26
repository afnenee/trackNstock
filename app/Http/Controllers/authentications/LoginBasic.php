<?php
// namespace App\Http\Controllers\authentications;

// use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Hash;
// use Illuminate\Support\Facades\Validator; // Ensure this is imported
// use App\Models\User; // Update this to your model

// class LoginBasic extends Controller
// {
//     public function index()
//     {
//         return view('content.authentications.auth-login-basic');
//     }

//     public function login(Request $request)
//     {
//         // Validate the request data
//         $validator = Validator::make($request->all(), [
//             'email' => 'required|email',
//             'password' => 'required|min:6',
//         ]);

//         // Check if the validation fails
//         if ($validator->fails()) {
//             return back()->withErrors($validator)->withInput();
//         }

//         // Attempt to log the user in
//         $credentials = $request->only('email', 'password');

//         // Find the user in the users table
//         $user = User::where('email', $request->email)->first();

//         if (!$user || !Hash::check($request->password, $user->password)) {
//             // Authentication failed
//             return back()->withErrors([
//                 'email' => 'The provided credentials do not match our records.',
//             ])->withInput();
//         }

//         Auth::login($user);

//         // Authentication was successful
//         $request->session()->regenerate();

//         return redirect()->intended('/');
//     }
// }
namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function login(Request $request)
  {
    $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
      'email' => 'required|email',
      'password' => 'required|min:6',
    ]);

    if ($validator->fails()) {
      return back()->withErrors($validator)->withInput();
    }

    $credentials = $request->only('email', 'password');

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();
      return redirect()->intended('/dashboard/Analytics');
    }

    return back()->withErrors([
      'password' => 'The provided password is incorrect.',
    ])->withInput();
  }
}
