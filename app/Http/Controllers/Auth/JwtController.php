<?php
namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Jwt\JwtLoginRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;


/**
 *
*/
class JwtController extends Controller
{

      public function __construct()
      {
           $this->middleware('auth:api', ['except' => ['login', 'register']]);
      }



      /**
       * @param Request $request
       * @return \Illuminate\Http\JsonResponse
      */
      public function login(Request $request)
      {
            $credentials = $request->only('email', 'password');

            if(! $token = auth()->attempt($credentials)) {
                  return response()->json([
                      'success' => false,
                      'message' => 'Введен неверный логин или пароль'
                  ], Response::HTTP_UNAUTHORIZED);
            }

            return response()->json(['success' => true, 'token' => $token]);
      }


      public function checkToken() {
           return response()->json(['success' => true]);
      }



      public function logout()
      {
            auth()->logout();
            return response()->json(['success' => true]);
      }
}
