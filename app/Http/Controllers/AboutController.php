<?php

namespace App\Http\Controllers;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke()
    {
        return view('about.index');
    }
}
