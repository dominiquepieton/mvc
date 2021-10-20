<?php

namespace App\Controller;


class MainController extends Controller
{
    public function index()
    {
        
        $this->render('home/homepage');
        //$this->render('home/homepage', ['hello' => $hello]);
    }
}