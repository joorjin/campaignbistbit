<?php

namespace App\Http\Controllers;

use App\Models\Active_awards;
use App\Models\Award_won;
use App\Models\Awards;
use Illuminate\Http\Request;
use App\Models\Queue;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use phpDocumentor\Reflection\Types\Null_;

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

        $permitted_act = $user[0]['permitted_act'];

        if ($permitted_act == 0) {

            foreach ($user as $item) {
                if ($item->next_spin <= Carbon::now()) {
                    return redirect('selectAward');
                }else {
                    return redirect('/?spin_permission=0');
                }
            }
        }
        else {
            return redirect('selectAward');
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

        $permitted_act = $user['permitted_act'];
        if ($permitted_act == 0) {
         // add next_spin
        // User::
        // where('id',$user->id)
        // ->update([
        //     "next_spin"=> Carbon::now()->addMinutes(10080)
        // ]);
        }else {
            User::
            where('id',$user->id)
            ->update([
                "permitted_act"=> $permitted_act - 1
            ]);
        }


        $queue = Queue::get();

        if ($queue->count() <= 2) {
            $queues = new Queue();
            $queues->award_id = 13;
            $queues->save();

            $queues = new Queue();
            $queues->award_id = 14;
            $queues->save();
        }
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


        Queue::where('id', $queue_id)->delete();



        if ($awards_type == "discount") {
            if ($award_id == 13) {
                $text = Storage::get('off/0.2.txt');
            }elseif ($award_id == 14) {
                $text = Storage::get('off/0.3.txt');
            }elseif ($award_id == 15) {
                $text = Storage::get('off/0.4.txt');
            }elseif ($award_id == 16) {
                $text = Storage::get('off/0.5.txt');
            }elseif ($award_id == 17) {
                $text = Storage::get('off/0.6.txt');
            }

            $Award_won = Award_won::
            orderBy('code_id','DESC')
            ->whereNotNull('code_id')
            ->first();
            $res =  explode(PHP_EOL,$text);

            $award_code = $res[$Award_won['code_id']+1];
            $Award_won_num =$Award_won['code_id']+1;
        }else {
            $award_code = null;
            $Award_won_num = null;
        }




        $award_wons = new Award_won;
        $award_wons->user_id = $user->id;
        $award_wons->awards_id = $award_id;
        $award_wons->code = $award_code;
        $award_wons->code_id = $Award_won_num;
        $award_wons->save();


            session(['code_off' => $awrads]);

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


        $queue = Queue::get();
        

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
