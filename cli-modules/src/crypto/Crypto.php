<?php

namespace CliStack\Modules\Crypto;

use CliStack\Modules\Exec;


class Crypto
{
    public function createHash(String $string, String $hashType)
    {
        $process = new Exec();
        return $process->exec("crypto", $hashType, '--text=' . $string);
    }
}
