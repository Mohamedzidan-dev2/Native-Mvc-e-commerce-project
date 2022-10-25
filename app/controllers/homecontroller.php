<?php

namespace MVC\controllers;

use MVC\core\controller;

use MVC\core\model;

class homecontroller extends controller{

    public function index(){
        $this->view("home/index",["title"=>"boutique index"]);
    }
}