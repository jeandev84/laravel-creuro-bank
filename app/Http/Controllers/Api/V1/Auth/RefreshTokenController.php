<?php
namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;


/**
 *
*/
class RefreshTokenController extends Controller
{

      public function index()
      {
          try {

              $token = auth()->refresh();

          } catch (\Exception $e) {

              return \response()->json([
                  'error' => true,
                  'message' => $e->getMessage()
              ], Response::HTTP_UNAUTHORIZED);
          }


          return \response()->json(['token' => $token]);
      }
}
