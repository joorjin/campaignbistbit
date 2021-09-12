<?php

namespace App\Http\Controllers;

use App\Models\Awards;
use App\Models\Queue;
use App\Models\Start;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class StartController extends Controller
{
    public function start()
    {
        Artisan::call('migrate');

        $status = Start::where('status',1)->get();
        foreach ($status as $item) {
            $status_col = $item->status;
        }
        if (!isset($status_col)) {
            $status = new Start ;
            $status->status=1;
            $status->save();


            // ledger nano S
            $start = new Awards;
            $start->name = 'ledger nano S';
            $start->delivery_in_time = 50400;
            $start->time_open=Carbon::now()->addMinutes(50400);
            $start->number = 2;
            $start->number_left=2;
            $start->type = 'physical';
            $start->save();

            // mi band
            $start = new Awards;
            $start->name = 'mi band 5';
            $start->delivery_in_time = 25920;
            $start->time_open=Carbon::now()->addMinutes(25920);
            $start->number = 6;
            $start->number_left=6;
            $start->type = 'physical';
            $start->save();

            // 10,000 sat
            $start = new Awards;
            $start->name = '10,000 ساتوشی';
            $start->delivery_in_time = 2880;
            $start->time_open=Carbon::now()->addMinutes(2880);
            $start->number = 48;
            $start->number_left= 48;
            $start->type = 'sat';
            $start->save();


            // 7,500 sat
            $start = new Awards;
            $start->name = '7,500 ساتوشی';
            $start->delivery_in_time = 2460;
            $start->time_open=Carbon::now()->addMinutes(2460);
            $start->number = 48;
            $start->number_left= 48;
            $start->type = 'sat';
            $start->save();


            // 5,000 sat
            $start = new Awards;
            $start->name = '5,000 ساتوشی';
            $start->delivery_in_time = 2520;
            $start->time_open=Carbon::now()->addMinutes(2520);
            $start->number = 48;
            $start->number_left= 48;
            $start->type = 'sat';
            $start->save();


            // 2,000 sat
            $start = new Awards;
            $start->name = '2,000 ساتوشی';
            $start->delivery_in_time = 600;
            $start->time_open=Carbon::now()->addMinutes(600);
            $start->number = 180;
            $start->number_left= 180;
            $start->type = 'sat';
            $start->save();



            // 750 sat
            $start = new Awards;
            $start->name = '750 ساتوشی';
            $start->delivery_in_time = 254;
            $start->time_open=Carbon::now()->addMinutes(254);
            $start->number = 480;
            $start->number_left= 480;
            $start->type = 'sat';
            $start->save();


            //250 sat
            $start = new Awards;
            $start->name = '250 ساتوشی';
            $start->delivery_in_time = 152;
            $start->time_open=Carbon::now()->addMinutes(152);
            $start->number = 960;
            $start->number_left= 960;
            $start->type = 'sat';
            $start->save();


            //125 sat
            $start = new Awards;
            $start->name = '125 ساتوشی';
            $start->delivery_in_time = 261;
            $start->time_open=Carbon::now()->addMinutes(261);
            $start->number = 480;
            $start->number_left= 480;
            $start->type = 'sat';
            $start->save();



            //400 T
            $start = new Awards;
            $start->name = '400,000 تومان';
            $start->delivery_in_time = 11520;
            $start->time_open=Carbon::now()->addMinutes(11520);
            $start->number = 10;
            $start->number_left= 10;
            $start->type = 'cash';
            $start->save();



            //200 T
            $start = new Awards;
            $start->name = '200,000 تومان';
            $start->delivery_in_time = 10080;
            $start->time_open=Carbon::now()->addMinutes(10080);
            $start->number = 10;
            $start->number_left= 10;
            $start->type = 'cash';
            $start->save();


            //100 T
            $start = new Awards;
            $start->name = '100,000 تومان';
            $start->delivery_in_time = 6660;
            $start->time_open=Carbon::now()->addMinutes(6660);
            $start->number = 20;
            $start->number_left= 20;
            $start->type = 'cash';
            $start->save();



            //Discount -0/02 ٪
            $start = new Awards;
            $start->name = '-0/02 % تخفیف';
            $start->delivery_in_time = 540;
            $start->time_open=Carbon::now();
            $start->number = 100;
            $start->number_left= 100;
            $start->type = 'discount';
            $start->save();

            //Discount -0/03 ٪
            $start = new Awards;
            $start->name = '-0/03 % تخفیف';
            $start->delivery_in_time = 2760;
            $start->time_open=Carbon::now();
            $start->number = 50;
            $start->number_left= 50;
            $start->type = 'discount';
            $start->save();


            //Discount -0/04 ٪
            $start = new Awards;
            $start->name = '-0/04 % تخفیف';
            $start->delivery_in_time = 2760;
            $start->time_open=Carbon::now();
            $start->number = 25;
            $start->number_left= 25;
            $start->type = 'discount';
            $start->save();


            //Discount -0/05 ٪
            $start = new Awards;
            $start->name = '-0/05 % تخفیف';
            $start->delivery_in_time = 9780;
            $start->time_open=Carbon::now();
            $start->number = 12;
            $start->number_left= 12;
            $start->type = 'discount';
            $start->save();



            //Discount -0/06 ٪
            $start = new Awards;
            $start->name = '-0/06 % تخفیف';
            $start->delivery_in_time = 20160;
            $start->time_open=Carbon::now();
            $start->number = 6;
            $start->number_left= 6;
            $start->type = 'discount';
            $start->save();


            sleep(2);
            $awards = Awards::
            where('time_open','<',Carbon::now())
            ->get();
            $number =count( $awards);

            for ($i=0; $i < $number; $i++) {
                $queues = new Queue();
                $queues->award_id = $awards[$i]->id;
                $queues->save();

                Awards ::
                where('id',$awards[$i]->id)
                ->update([
                    "time_open"=> Carbon::now()->addMinutes($awards[$i]->delivery_in_time),
                ]);
            }


echo "با  موفقیت انجام شد";
        }else{
            echo "قبلا استارت شده است";
        }

    }
}
