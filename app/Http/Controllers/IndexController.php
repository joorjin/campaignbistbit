<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

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
                setcookie("token", "", time() - 3600);
                return redirect('/add_phone');
            }
            else{
                $login=true;
            }
        }

        if (Session::has('awrads'))
        {
            $awrads = session('awrads');
            $reques->session()->forget('awrads');
            return view('index',compact('login','awrads'));
        }



        return view('index',compact('login'));
    }
}
