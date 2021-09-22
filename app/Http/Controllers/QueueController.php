<?php

namespace App\Http\Controllers;

use App\Models\Active_awards;
use App\Models\Award_won;
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
            return redirect('/?login=falss');
        }
        $user = User::
        where('remember_token',$_COOKIE['token'])
        ->get();

        if ($user->toArray() == null ) {
            return redirect('/?login=falss');
        }

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
            return redirect('/?login=falss');
        }
        $user = User::
        where('remember_token',$_COOKIE['token'])
        ->first();

        if ($user->toArray() == null ) {
            return redirect('/?login=falss');
        }

        // add next_spin
        // User::
        // where('id',$user->id)
        // ->update([
        //     "next_spin"=> Carbon::now()->addMinutes(10080)
        // ]);


        $queue = Queue::get();
        $award_id = $queue[0]->award_id;
        $queue_id=  $queue[0]->id;



        $awrads =  Awards::
        where('id',$award_id)
        ->get();

        session(['awrads' => $awrads]);

        foreach ($awrads as $item) {
            $award_id = $item->id;
            $awards_type = $item->type;
        }


        $del = Queue::where('id', $queue_id)->delete();


        $award_wons = new Award_won;
        $award_wons->user_id = $user->id;
        $award_wons->awards_id = $award_id;
        $award_wons->save();





        // rand
        $seed = str_split('ABCDEFGHIJKLMNOPQRSTUVWXYZ'
        .'0123456789');
        shuffle($seed);
        $rand = '';
        $token ='';
        foreach (array_rand($seed, 9) as $k) $rand .= $seed[$k];
            // end rand
            $award_code = $rand;


        if ($awards_type == 'cash' || $awards_type == 'discount') {
            $active_awards = new Active_awards;
            $active_awards->award_id = $award_id;
            $active_awards->code = $award_code;
            $active_awards->user_id = $user->id;
            $active_awards->status = 0;
            $active_awards->save();
        }




        $awards_add_queue = Awards::
        where('time_open','<',Carbon::now())
        ->get();
        $number =count( $awards_add_queue);

        for ($i=0; $i < $number; $i++) {
            $queues = new Queue();
            $queues->award_id = $awards_add_queue[$i]->id;
            $queues->save();

                    // تغیر تایم بعدی جایره
            Awards ::
            where('id',$awards_add_queue[$i]->id)
            ->update([
                "time_open"=> Carbon::now()->addMinutes($awards_add_queue[$i]->delivery_in_time),
                "number_left"=> $awards_add_queue[$i]->number_left - 1
            ]);
        }



        return redirect('/#spin-location');
    }
}
