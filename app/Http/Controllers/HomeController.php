<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $homeroute = route('home');


        $html = <<<php
<nav>
    <a href="{$homeroute}">Главная</a>
    <a href="/admin">АДминка</a>
    <a href="/news">Новости</a>
    <a href="/about">о Нас</a>
</nav>
php;

        return $html;
    }
}
