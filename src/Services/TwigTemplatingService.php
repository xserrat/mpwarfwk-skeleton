<?php

namespace Services;

use Mpwarfwk\Component\Template\TwigTemplate;

class TwigTemplatingService implements ServiceInterface{

    private $twig;

    public function __construct(TwigTemplate $twig){
        $this->twig = $twig;
    }

    public function run(){
        return $this->twig;
    }
}