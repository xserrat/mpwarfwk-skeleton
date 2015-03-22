<?php
/**
 * Created by PhpStorm.
 * User: xserrat
 * Date: 22/03/15
 * Time: 14:23
 */

namespace Controllers;

use Entities\Repositories\UserRepository;
use Mpwarfwk\Component\Http\HttpResponse;
use Mpwarfwk\Controller\ControllerAbstract;

class DemoController extends ControllerAbstract{

    public function init(){
        $view = $this->get('templating-twig');
        return new HttpResponse($view->render('main.twig'));
    }

    public function showAllUsers(){
        /**
         * @var $userRepository UserRepository
         */
        $userRepository = $this->get('user-repository');
        $users = $userRepository->findAll();
        $view = $this->get('templating-twig');
        return new HttpResponse($view->render('table-users.twig',
            array(
                'login' => true,
                'users' => $users
            )
        ));
    }
}