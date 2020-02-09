<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
        $title = 'WELCOME TO THE JUNGLE, BABY!';
        //return view ('pages.index', compact('title'));    // Method 1: passing the value of title to the view
        return view ('pages.index')->with('title', $title); // Method 2: 'title': passed name, $title: passed value,  works well with arrays!
    }

    public function about(){
        $title = 'About Us';
        return view ('pages.about')->with('title', $title);
    }

    public function services(){
        $data = array(
            'title' => 'Services',
            'services' => ['Web Design', 'Progrsmming', 'SEO']
        );
        return view ('pages.services')->with($data);
    }
}
