<?php
namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;


/**
 *
*/
class LogoutController extends Controller
{
      /**
        * @return void
       */
       public function index()
       {
            auth()->logout();
       }
}
