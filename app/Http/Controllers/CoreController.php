<?php

namespace App\Http\Controllers;

class CoreController extends Controller
{
    /**
     * Load landing page
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function error_404()
    {
        return view('error_404');
    }
}
