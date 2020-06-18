<?php

namespace My;

class Application extends \Nutshell\Applications\Rest
{

    protected $dependencies = null;

    public function __construct(Interfaces\Dependencies $dependencies_)
    {
        $this->dependencies = $dependencies_;
    }

    public function run(): \Nutshell\Http\Response
    {
        try {

            $routing = new \Nutshell\Routing\Manager($this->getRequest());

            $routing->add('GET', '#/Hello/([a-zA-Z]*)#', function ($name_) {
                $module = new Modules\Example($this->getDependencies());

                return $module->getHelloName($name_);
            });

            $routing->add('GET', '#/#', function () {
                $module = new Modules\Example($this->getDependencies());

                return $module->getIndex();
            });

            $output = $routing->process();

            if ($routing->isStatusRouteFound()) {
                return $this->jsonResponse($output);
            } else if ($routing->isStatusMethodNotAllowed()) {
                return $this->jsonResponseMethodNotAllowed($output);
            }
            return $this->jsonResponsePageNotFound($output);
        } catch (\Exception $e) {
            return $this->jsonResponseException($e);
        }
    }
}
