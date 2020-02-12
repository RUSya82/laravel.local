<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function __invoke(){
        $html = <<<php
<nav>
    <a href="/">Главная</a>
    <a href="/admin">АДминка</a>
    <a href="/news">Новости</a>
    <a href="/about">о Нас</a>
</nav>
php;
        $html .= "<h2>This is about page</h2>";
        return $html;
    }
}
