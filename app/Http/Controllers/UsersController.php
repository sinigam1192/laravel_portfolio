<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Auth;

class UsersController extends Controller
{
    //
    public function index()
    {
      $user = Auth::user();
      //$変数 = DB::select('SQL文')；
      //$users = DB::select('select * from users');
      $users = User::all();
      return view('users.index', compact('user', 'users'));
    }
}
