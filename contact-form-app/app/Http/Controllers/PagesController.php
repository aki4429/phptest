<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //
    public function greeting()
    {
        $name = 'おだちん';
        return view('greeting', ['name' => $name]);
    }
    public function home()
    {
        return view('pages.home');
    }
    public function about()
    {
        return view('pages.about');
    }
    public function works()
    {
        return view('pages.works');
    }
    public function contact()
    {
        return view('pages.contact');
    }
    public function create()
    {
        return view('reservation.create');
    }
}