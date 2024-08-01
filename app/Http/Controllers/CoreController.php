<?php

namespace App\Http\Controllers;

class CoreController extends Controller
{
    /**
     * Load landing page
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('index');
    }

    public function news()
    {
        return view('news');
    }

    public function news_details($id)
    {
        $categories = [
            1 => 'Access to Justice',
            2 => 'Self Advocacy',
            3 => 'Vocational Training',
        ];
        return view('news_details', ['category' => @$categories[$id]]);
    }

    public function program_details($id)
    {
        $programs = [
            1 => 'Access to Justice',
            2 => 'Access to Quality Healthcare',
            3 => 'Self Advocacy',
            4 => 'Vocational Training',
            5 => 'Quality Inclusive Education',
            6 => 'Family Empowerment'
        ];
        return view('program_details', ['program' => @$programs[$id]]);
    }

    public function error_404()
    {
        return view('error_404');
    }
}
