<?php

namespace Controllers;

use \Entities\Repositories\UserRepository;
use \Entities\User;
use Mpwarfwk\Component\Http\HttpResponse;
use Mpwarfwk\Component\Http\Request;
use Mpwarfwk\Controller\ControllerAbstract;

class AuthController extends ControllerAbstract{

    public function login(Request $request){
        if($request->getMethod() !== Request::METHOD_POST){
            $view = $this->renderTwigView('content.twig', array("login" => false));
            return new HttpResponse($view);
        }
        $email = $request->postParams->getString('email');
        $password = $request->postParams->getString('password');

        /**
         * @var $userRepository UserRepository
         */
        $userRepository = $this->get('user-repository');
        /**
         * @var $user User
         */
        $user = $userRepository->find(array('email' => $email, 'password' => $password));

        if(!$user){
            $view = $this->renderTwigView('content.twig', array('login' => false));
            return new HttpResponse($view);
        }

        $view = $this->renderTwigView('content.twig', array(
            'login' => true,
            'user' => array(
                'email' => $user->getEmail(),
                'password' => $user->getPassword()
            )
        ));
        return new HttpResponse($view);
    }

    public function register(Request $request){
        if($request->getMethod() !== Request::METHOD_POST){
            $view = $this->renderTwigView('register.twig', array("register" => true));
            return new HttpResponse($view);
        }
        $email = $request->postParams->getString('email');
        $password = $request->postParams->getString('password');

        /**
         * @var $userRepository UserRepository
         */
        $userRepository = $this->get('user-repository');
        /**
         * @var $user User
         */
        $user = new User($email, $password);
        $result = $userRepository->insert($user);

        if($result){
            $view = $this->renderTwigView('register.twig', array('register' => false, 'success' => true));
            return new HttpResponse($view);
        } else{
            $view = $this->renderTwigView('register.twig', array('post' => false, 'success' => false));
            return new HttpResponse($view);
        }
    }
}