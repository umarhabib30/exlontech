<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $data =[
            'title' => 'Exlon Tech',
            'active' => 'home',
        ];
        return view('user.home', $data);
    }

    public function services(){
        $data =[
            'title' => 'Services',
            'active' => 'services',
        ];
        return view('user.services', $data);
    }
}
