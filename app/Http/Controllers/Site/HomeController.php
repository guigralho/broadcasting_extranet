<?php

namespace Broadcasting\Http\Controllers\Site;

use Illuminate\Http\Request;
use Broadcasting\Http\Controllers\Admin\Controller;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    	return view('Site.home.index');
    }
}
