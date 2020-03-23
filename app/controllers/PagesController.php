<?php

namespace App\Controllers;

class PagesController
{
    /**
     * Display a listing of the resource.
     *
     * @return view
     */
    public function index()
    {
        return view('index');
    }

    /**
     * Display a system guide resource
     *
     * @return view
     */
    public function guide()
    {
        return view('guide');
    }

    /**
     * Display a not found resource
     *
     * @return view
     */
    public function notFound()
    {
        return view('404');
    }
}
