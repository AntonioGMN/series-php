<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index()
    {
        $series = Serie::all();
        //dd($series);
        //compact('series')= ["series"=> $series]

        return view('series.index')->with('series', $series);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        Serie::create($request->all()); // tem que adicionar o $fillable = ['name'] no Series Model para funcionar

        // $name = $request->input('name');
        // $serie = new Serie();
        // $serie->name = $name;
        // $serie->save();

        return redirect()->route('series.index');
    }

    public function destroy(Request $request)
    {
        //dd($request->id);
        Serie::destroy($request->series);
        return redirect()->route('series.index');
    }
}
