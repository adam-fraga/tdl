<?php

namespace App\Controllers;

class MainController extends Controller
{

    public function index( array $params = null){
        $this->render('main/index');
    }
}