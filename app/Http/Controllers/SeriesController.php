<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SeriesController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $series = ['Punishe', 'Lost'];
        //compact('series')= ["series"=> $series]

        return view('Series.index')->with('series', $series);
    }

    public function create(Request $request, Response $response)
    {
        return view('Series.create');
    }
}
