<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::all();
        //dd($series);
        //compact('series')= ["series"=> $series]

        $succesMessage = $request->session()->get('success.message');
        //var_dump($succesMessage);
        //Usar se usar o input para criar sucess.message em vez de usar o flesh na criação
        //$request->session()->forget('success.message');

        return view('series.index')->with('series', $series)->with('successMessage', $succesMessage);
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        // Tem que adicionar o $fillable = ['name'] no Series Model para funcionar
        $serie = Serie::create($request->all());

        //Outra sintasse para criar
        // $name = $request->input('name');
        // $serie = new Serie();
        // $serie->name = $name;
        // $serie->save();



        return redirect()->route('series.index')
            ->with('success.message', "Série {$serie->name} adicionada com sucesso");
    }

    //Quando tipo o paramentro como Serie e dou o nome do parametro com o esperado pelo padrão do laravel, então é como se o laravel fizesse $series = Serie::find($series);
    public function destroy(Serie $series, Request $request)
    {
        $series->delete();

        //$request->session()->flash('success.message', "A série {$series->name} foi removida com sucesso");
        //O with cria um flash no session e passa para a rota indicada
        return redirect()->route('series.index')
            ->with('success.message', "A série {$series->name} foi removida com sucesso");
    }

    public function edit(Serie $series)
    {
        return view('series.edit')->with('serie', $series);
    }


    public function update(Serie $series, Request $request)
    {
        $series->name = $request->name;
        $series->save();

        return redirect()->route('series.index')
            ->with('success.message', "A série '{$series->name}' foi atualizada com sucesso");
    }
}
