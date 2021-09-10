<?php

namespace App\Http\Controllers;

use App\Models\Awards;
use Illuminate\Http\Request;
use App\Models\Queue;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;


class QueueController extends Controller
{
    public function checkLicense(Request $request)
    {
        if (!isset($_COOKIE['token'])) {
            return redirect('/');
        }
        $user = User::
        where('remember_token',$_COOKIE['token'])
        ->get();

        foreach ($user as $item) {
            if ($item->next_spin <= Carbon::now()) {
                return redirect('selectAward');
            }else {
                return redirect('/?spin_permission=0');
            }
        }
    }


    public function selectAward()
    {
        if (!isset($_COOKIE['token'])) {
            return redirect('/');
        }

        $queue = Queue::get();
        $award_id = $queue[0]->award_id;

        

        $awrads =  Awards::
        where('id',$award_id)
        ->get();
        session(['awrads' => $awrads]);
        return redirect('/#spin');
    }
}
