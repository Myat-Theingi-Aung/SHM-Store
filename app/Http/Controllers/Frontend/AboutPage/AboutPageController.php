<?php

namespace App\Http\Controllers\Frontend\AboutPage;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutPageController extends Controller
{
    public function showAboutPage()
    {
        return view('about');
    }
}
