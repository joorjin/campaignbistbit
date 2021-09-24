<?php

namespace App\Http\Controllers;

use App\Models\Award_won;
use App\Models\Awards;
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
                $invitation_code = $user[0]['invitation_code'];
                $award_wons = Award_won::where('user_id',$user[0]['id'])->get();
                if ($award_wons->count() != 0) {
                    foreach ($award_wons as $item) {
                        $award_wonss[] = Awards::where('id',$item->awards_id)->select('name')->get();
                    }
                }else {
                    $award_wonss = 'new_login';
                }

                if (Session::has('awrads'))
                {
                    $awrads = session('awrads');
                    $reques->session()->forget('awrads');
                    return view('index',compact('login','awrads'));
                }

                return view('index',compact('login','award_wonss','invitation_code'));
            }
        }

        if (Session::has('awrads'))
        {
            $awrads = session('awrads');
            $reques->session()->forget('awrads');
            return view('index',compact('login','awrads'));

            return view('index',compact('login','awrads'));
        }



        return view('index',compact('login'));
    }
}
