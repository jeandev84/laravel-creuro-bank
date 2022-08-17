<?php
namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 *
*/
class LoginController extends Controller
{

      /**
        * @param Request $request
        * @return \Illuminate\Http\JsonResponse
      */
      public function index(Request $request)
      {
          $credentials = $request->only(['email', 'password']);

          if (! $token = auth()->attempt($credentials)) {

              return \response()->json([
                  'success'  => false,
                  'meessage' => 'Введен неверный логин или пароль'
              ], Response::HTTP_UNAUTHORIZED);
          }

          return response()->json(['success' => true, 'token' => $token]);
      }
}
