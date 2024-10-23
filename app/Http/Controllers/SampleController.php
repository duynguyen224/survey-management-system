<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SampleController extends Controller
{
    public function index(){
        return view('sample.index');
    }

    public function create(){
        return view('sample.create');
    }
}
