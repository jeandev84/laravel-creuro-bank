<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;


/**
 *
*/
class LoginController extends Controller
{

      /**
        * @param Request $request
        * @return Response
      */
      public function index(Request $request)
      {
          $credentials = $request->only(['email', 'password']);

          if (Auth::attempt($credentials)) {
              return response(Auth::user(), Response::HTTP_OK);
          }

          return response(null, Response::HTTP_UNAUTHORIZED);
      }
}
