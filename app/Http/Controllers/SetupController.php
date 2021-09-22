<?php
namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

use App\Http\Requests;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SetupController extends Controller
{
    public function setup(){
        // $process = Process::fromShellCommandline('git fetch https://github.com/joorjin/campaignbistbit.git');
        // $process = Process::fromShellCommandline('git reset --hard origin/master');

        $process = Process::fromShellCommandline('git pull https://github.com/joorjin/campaignbistbit.git');

        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                echo 'ERR > ' . $buffer;
            } else {
                echo 'OUT > ' . $buffer;
            }
        });
    }
}
