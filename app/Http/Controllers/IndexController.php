<?php

namespace App\Http\Controllers;

use App\Models\Active_awards;
use App\Models\Award_won;
use App\Models\Awards;
use App\Models\invited_users;
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

                $permitted_act = $user[0]['permitted_act'];


                $phone = $user[0]['phone'];
                $award_wons = Award_won::where('user_id',$user[0]['id'])->get();
                if ($award_wons->count() != 0) {
                    foreach ($award_wons as $item) {
                        $award_wonss[] = Awards::
                        leftjoin('active_awards', 'awards.id', 'active_awards.award_id')
                        ->where('awards.id',$item->awards_id)
                        ->select('name','code')
                        ->get();
                    }
                }else {
                    $award_wonss = 'new_login';
                }

                $invited_users=invited_users::
                where('caller_id',$user[0]['id'])
                ->count();

                if (Session::has('awrads'))
                {
                    $awrads = session('awrads');
                    $reques->session()->forget('awrads');


                    
                    return view('index',compact('login','awrads','phone','award_wonss','invitation_code','invited_users','permitted_act','award_wons'));
                }

                return view('index',compact('login','award_wonss','phone','invitation_code','invited_users','permitted_act','award_wons'));
            }
        }




        return view('index',compact('login'));
    }
}
