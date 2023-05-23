<?php

namespace App\Http\Controllers\ThemeController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomePageController extends Controller
{
    public function index(){
        return view('layouts.themes.homepage');
    }
}
