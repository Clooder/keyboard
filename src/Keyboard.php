<?php

namespace Clooder;


class Keyboard
{
    private $file;
    public function __construct()
    {
        exec('stty -icanon -echo');
        $this->file = fopen('php://stdin', 'r');
        stream_set_blocking($this->file, false);
    }

    public function check()
    {
        $key = fread($this->file, 1);

        if($key != null){
           return $key;
        }
    }
}