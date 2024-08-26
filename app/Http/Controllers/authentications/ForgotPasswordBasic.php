<!-- < ?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Auth\Passwords\SendsPasswordResetEmails;

class ForgotPasswordBasic extends Controller
{
  // use SendsPasswordResetEmails;

  public function index()
  {
    return view('content.authentications.auth-forgot-password-basic');
  }
}
< ?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordBasic extends Controller
{
  use SendsPasswordResetEmails;

  /**
   * Display the form to request a password reset link.
   *
   * @return \Illuminate\View\View
   */
  public function showLinkRequestForm()
  {
    return view('auth.passwords.email');
  }
} -->
<?php

// namespace App\Http\Controllers\authentications;

// use App\Http\Controllers\Controller;
// use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
// use Illuminate\Http\Request;

// class ForgotPasswordBasic extends Controller
// {
//   use SendsPasswordResetEmails;

//   /**
//    * Display the form to request a password reset link.
//    *
//    * @return \Illuminate\View\View
//    */
//   public function showLinkRequestForm()
//   {
//     return view('authentications.password.email');
//   }

//   /**
//    * Send a reset link to the given user.
//    *
//    * @param  \Illuminate\Http\Request  $request
//    * @return \Illuminate\Http\RedirectResponse
//    */
//   public function sendResetLinkEmail(Request $request)
//   {
//     $this->validate($request, ['email' => 'required|email']);

//     $response = $this->broker()->sendResetLink(
//       $request->only('email')
//     );

//     return $response == \Password::RESET_LINK_SENT
//       ? back()->with('status', trans($response))
//       : back()->withErrors(['email' => trans($response)]);
//   }

//   /**
//    * Display the password reset view for the given token.
//    *
//    * @param  string|null  $token
//    * @return \Illuminate\View\View
//    */
//   public function showResetForm(Request $request, $token = null)
//   {
//     return view('authentications.password.reset')->with(
//       ['token' => $token, 'email' => $request->email]
//     );
//   }
// }

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;

class ForgotPasswordBasic extends Controller
{
  use SendsPasswordResetEmails;

  public function showLinkRequestForm()
  {
    return view('content.authentications.auth-forgot-password-basic');
  }

  // public function sendResetLinkEmail(Request $request)
  // {
  //   $request->validate(['email' => 'required|email']);

  //   $response = $this->broker()->sendResetLink($request->only('email'));

  //   return $response == \Password::RESET_LINK_SENT
  //     ? back()->with('status', trans($response))
  //     : back()->withErrors(['email' => trans($response)]);
  // }
  public function sendResetLinkEmail(Request $request)
  {
    // Log message to check if the method is called
    \Log::info('sendResetLinkEmail method called');

    // Validate the email field
    $request->validate(['email' => 'required|email']);

    // Attempt to send the reset link
    $response = $this->broker()->sendResetLink($request->only('email'));

    // Redirect to the 'Forgot Password Basic' page with appropriate feedback
    return $response == \Password::RESET_LINK_SENT
      ? redirect()->route('auth-forgot-password-basic') // Redirect to the form
        ->with('status', trans($response)) // With success message
      : redirect()->route('auth-forgot-password-basic') // Redirect to the form
        ->withErrors(['email' => trans($response)]); // With error message
  }


  public function showResetForm(Request $request, $token = null)
  {
    return view('auth.passwords.reset')->with(
      ['token' => $token, 'email' => $request->email]
    );
  }
}
