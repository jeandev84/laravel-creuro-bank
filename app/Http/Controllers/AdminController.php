<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

     public function __construct()
     {
          $this->middleware('auth:api');
     }


     public function index()
     {
          return response()->json(['success' => true, 'message' => 'Your are in the Dashboard']);
     }
}
