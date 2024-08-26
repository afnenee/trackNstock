<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
  return $request->user();
});


// class ForgotPasswordApiController extends Controller
// {
//     public function sendResetLink(Request $request)
//     {
//         $validator = Validator::make($request->all(), [
//             'email' => 'required|email|exists:users,email',
//         ]);

//         if ($validator->fails()) {
//             return response()->json([
//                 'status' => 'error',
//                 'message' => $validator->errors()->first(),
//             ], 422);
//         }

//         $response = Password::sendResetLink(
//             $request->only('email')
//         );

//         return $response == Password::RESET_LINK_SENT
//             ? response()->json([
//                 'status' => 'success',
//                 'message' => Lang::get($response),
//             ])
//             : response()->json([
//                 'status' => 'error',
//                 'message' => Lang::get($response),
//             ], 500);
//     }
// }
