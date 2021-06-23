<?php

namespace CliStack\Modules;

use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class Exec
{
    public function exec(String $module, String $command, String $flags)
    {

        $process = new Process([base_path() . '\cli-modules\src\\' . $module .  '\\' . $module, $command, $flags]);

        $process->run();

        // executes after the command finishes
        if (!$process->isSuccessful()) {
            throw new ProcessFailedException($process);
        }

        return $process->getOutput();
    }
}
