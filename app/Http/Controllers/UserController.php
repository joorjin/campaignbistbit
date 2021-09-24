<?php

namespace App\Http\Controllers;

use App\Models\invited_users;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class UserController extends Controller
{
    public function add_phone(Request $request)
    {
        $phone = $request->phone;
        $pass = $request->pass;

        $validated = $request->validate([
            'phone' => 'required|size:11',
            'pass' => 'required ',
        ]);


        $user_login = User::
        where('phone',$phone)
        ->get();
        foreach ($user_login as $item) {
            if ($item->password != $pass) {
                return redirect('/?pass=0');
            }
        }
        //  ساخت حساب
        if ($user_login->toArray() == null) {

            // rand
                $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                .'abcdefghijklmnopqrstuvwxyz'
                .'*/-!@#$%^&*+=-'
                .'0123456789');
                shuffle($seed);
                $token ='';
                foreach (array_rand($seed, 53) as $k) $token .= $seed[$k];


                $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
                .'0123456789');
                shuffle($seed);
                $rand = '';
                foreach (array_rand($seed, 5) as $k) $rand .= $seed[$k];
            // end rand
            $invitation_code = $rand;
            $remember_token = $token;
            setcookie('token', $token, time()+1123200,"/");

            $user = new User;
            $user->phone = $phone;
            $user->password = $pass;
            $user->next_spin = Carbon::now();
            $user->invitation_code= $invitation_code;
            $user->remember_token=$remember_token;
            $user->save();

            if (isset($_COOKIE['inviteCode'])) {
                $inviteCode = $_COOKIE['inviteCode'];

                $invitedUsers = new  invited_users;
                $invitedUsers->caller_id = $inviteCode;
                $invitedUsers->invited_id = $user['id'];
                $invitedUsers->save();
            }
            return redirect('/?register=1');
        }else{

        // ورود
            foreach ($user_login as $item) {
                setcookie('token', $item->remember_token, time()+1123200,"/");
                return redirect('/?login=1');
            }
        }


    }
}
