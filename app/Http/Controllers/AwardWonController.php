<?php

namespace App\Http\Controllers;

use App\Models\Award_won;
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
            ->select('award_wons.id','phone','awards.name','status','code')
            ->get();

            return view('panel.checkAwardWon',compact('info'));
        }

        return view('panel.checkAwardWon');
    }

    public function del(Request $request)
    {
        Award_won::
        where('id',$_GET['id'])
        ->update([
            'status'=>0
        ]);

        $info = User::
        where('phone',$_GET['phone'])
        ->join('award_wons', 'users.id','award_wons.user_id')
        ->join('awards', 'award_wons.awards_id','awards.id')
        ->select('award_wons.id','phone','awards.name','status')
        ->get();

        $del='ok';
        return view('panel.checkAwardWon',compact('info','del'));
    }
}
