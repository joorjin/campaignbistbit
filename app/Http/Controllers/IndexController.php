<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $reques)
    {
        $login = false;
        if (isset($_COOKIE['token'])) {
            $user = User::
            where('remember_token',$_COOKIE['token'])
            ->get()->toArray();

            // اگر ثبت نام نبود
            if ($user == null) {
                return redirect('/add_phone');

            }
            else{
                $login=true;
            }
        }

        return view('index',compact('login'));
    }
}
