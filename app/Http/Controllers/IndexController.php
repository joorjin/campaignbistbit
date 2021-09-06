<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $reques)
    {
        $login = true;
        if (isset($_COOKIE['token'])) {
            $user = User::
            where('remember_token',$_COOKIE['token'])
            ->get()->toArray();

            if ($user != null) {
                $login=false;
                
            }
        }

        return view('index',compact('login'));
    }
}
