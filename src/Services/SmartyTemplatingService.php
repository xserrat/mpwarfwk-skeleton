<?php

namespace Services;

use Mpwarfwk\Component\Template\SmartyTemplate;

class SmartyTemplatingService implements ServiceInterface{

    private $smarty;

    public function __construct(SmartyTemplate $smarty){
        $this->smarty = $smarty;
    }

    public function run(){
        return $this->smarty;
    }
}