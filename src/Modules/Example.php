<?php

namespace My\Modules;

class Example extends \Nutshell\Abstracts\Module implements \Nutshell\Interfaces\Module
{
    private $dependencies;

    public function __construct(\My\Interfaces\Dependencies $dependencies)
    {
        $this->dependencies = $dependencies;
    }

    public function getIndex()
    {
        return 'Example index';
    }

    public function getHelloName($name_){
        return "Hello $name_";
    }
}
