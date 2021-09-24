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

    public function push(){
        $commit = now();
        $process = Process::fromShellCommandline('
        cd ..
        git config user.name "joorjin"
        git config user.email "joorjin2@gmail.com"
        git commit -a -m "'.$commit.'"
        echo "git commit ok "
        git push origin master
        echo "git push ok"
        ');


        $process->run(function ($type, $buffer) {
            if (Process::ERR === $type) {
                echo 'ERR > ' . $buffer;
            } else {
                echo 'OUT > ' . $buffer;
            }
        });
    }
}
