<?php

namespace Controllers;

use Mpwarfwk\Component\Http\HttpResponse;
use Mpwarfwk\Controller\ControllerAbstract;

class DefaultController extends ControllerAbstract{

    public function welcome(){
        $view = $this->renderTwigView('welcome.twig');
        return new HttpResponse($view);
    }
}