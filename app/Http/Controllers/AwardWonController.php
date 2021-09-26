<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AwardWonController extends Controller
{
    public function checkAwardWon(Request $request)
    {

        if ($request->isMethod('post')) {
            $phone = $request->phone;

            $info = User::
            where('phone',$phone)
            ->join('award_wons', 'users.id','award_wons.user_id')
            ->join('awards', 'award_wons.awards_id','awards.id')
            ->select('phone','awards.name','status')
            ->get();

            return view('panel.checkAwardWon',compact('info'));
        }

        return view('panel.checkAwardWon');
    }
}
