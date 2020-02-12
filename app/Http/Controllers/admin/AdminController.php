<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $html = <<<php
<nav>
    <a href="/">Главная</a>
    <a href="/admin">АДминка</a>
    <a href="/news">Новости</a>
    <a href="/about">о Нас</a>
</nav>
php;
        $html .= "<h2>Hello Admin!!!</h2>";
        return $html;
    }

    public function test($x){
        return "AdminController@test " . $x;
    }
}
