<?php

namespace My\Tools;

class Logger extends \Nutshell\Abstracts\Logger implements \My\Interfaces\Logger
{

    public function __construct(){
        $this->_setFilename(date('Y-m-d').'_log.txt');
        $this->_setPath(__DIR__.'/../../var/log/');
    }


    public function info($text_){
        $this->logLine('INFO',$text_);
    }
    public function error($text_){
        $this->logLine('ERROR',$text_);
    }
    public function log($text_){
        $this->logLine('APP',$text_);

    }

    public function logLine($prefix_,$text_){
        $this->_logLine(date('Y-m-d H:i:s').';'.$prefix_.';'.$text_);

    }
    

}