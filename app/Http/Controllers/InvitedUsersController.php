<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InvitedUsersController extends Controller
{
    public function checkLink($inviteCode)
    {


        if (isset($_COOKIE['token'])) {
            $user = User::
            where('remember_token',$_COOKIE['token'])
            ->get()->toArray();
            return redirect('/?Old_user');
        }

        $user = User::
        where('invitation_code',$inviteCode)
        ->get();
        if ($user->count() == 1) {

            setcookie('inviteCode', $user[0]['id'], time ()+86400*3,"/");
            return redirect('/?inviteCode=1');
        }else {
            return redirect('/?inviteCode=0');
        }
    }
}
