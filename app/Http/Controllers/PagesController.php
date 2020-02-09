<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'WELCOME TO THE JUNGLE, BABY!';
        return view ('pages.index', compact('title')); // passing the value of title to the view
    }

    public function about(){
        return view ('pages.about');
    }

    public function services(){
        return view ('pages.services');
    }
}
