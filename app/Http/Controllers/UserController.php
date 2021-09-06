<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class UserController extends Controller
{
    public function add_phone(Request $request)
    {

        


        $validated = $request->validate([
            'phone' => 'required|size:11',
            'pass' => 'required',
        ]);
        $phone = $request->phone;
        $pass = $request->pass;

        // rand
            $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
            .'abcdefghijklmnopqrstuvwxyz'
            .'*/-!@#$%^&*+=-'
            .'0123456789');
            shuffle($seed);
            $rand = '';
            $token ='';
            foreach (array_rand($seed, 10) as $k) $rand .= $seed[$k];
            foreach (array_rand($seed, 53) as $k) $token .= $seed[$k];
        // end rand
        $invitation_code = $rand;
        $remember_token = $token;
        setcookie('token', $token, time()+31536000,"/");

        $user = new User;
        $user->phone = $phone;
        $user->password = $pass;
        $user->invitation_code= $invitation_code;
        $user->remember_token=$remember_token;
        $user->save();
        return redirect('/?login_tr=1');
    }
}
