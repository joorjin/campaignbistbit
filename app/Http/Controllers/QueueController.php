<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Queue;

class QueueController extends Controller
{
    public function selectAward()
    {
        $queue = Queue::get();
        $queue = $queue[0];
        ->پیدا کردن جایره
    }
}
