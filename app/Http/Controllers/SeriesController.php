<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request, Response $response)
    {
        $series = Serie::all();
        //dd($series);
        //compact('series')= ["series"=> $series]

        return view('Series.index')->with('series', $series);
    }

    public function create(Request $request, Response $response)
    {
        return view('Series.create');
    }

    public function store(Request $request)
    {
        $name = $request->input('name');
        $serie = new Serie();
        $serie->name = $name;
        $serie->save();

        return redirect('/series');
    }
}
