<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index(){
        $title = "Admin panel";
        return view('admin.index', ['title' => $title]);
    }

    public function test($x){
        return "AdminController@test " . $x;
    }
}
