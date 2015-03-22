<?php

namespace Controllers;

use Mpwarfwk\Component\Http\HttpResponse;
use Mpwarfwk\Controller\ControllerAbstract;

class DefaultController extends ControllerAbstract{

    public function welcome(){
        $view = $this->renderTwigView('welcome.twig');
        return new HttpResponse($view);
    }

    public function showTemplate(){
        $smarty = $this->get('templating-twig');
        return new HttpResponse($smarty->render('template.twig', array('name' => 'Xavi')));
    }

    public function showTemplateNoContainer(){
        $view = $this->renderSmartyView('template.tpl', array('name' => 'Xavi'));
        return new HttpResponse($view);
    }
}