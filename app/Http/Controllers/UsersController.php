<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
    //
    public function index()
    {
      $name = 'name';
      //$変数 = DB::select('SQL文')；
      $users = DB::select('select * from users');
      return view('users.index', compact('name', 'users'));
    }
}
