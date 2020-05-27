<?php

namespace App\Http\Controllers;

use App\Postre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $postres = Postre::all();

        return view('postres.postreIndex', compact('postres'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //echo "Entrando a create";
        return view('postres.postreForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'imagen' => 'required|ends_with:.jpg,.png'
        ]);

        Postre::create($request->all());

        return redirect()->route('postre.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Postre  $postre
     * @return \Illuminate\Http\Response
     */
    public function show(Postre $postre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Postre  $postre
     * @return \Illuminate\Http\Response
     */
    public function edit(Postre $postre)
    {
        return view('postres.postreForm', compact('postre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Postre  $postre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Postre $postre)
    {
        $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required',
            'imagen' => 'required|ends_with:.jpg,.png'
        ]);

        Postre::where('id', $postre->id)->update($request->except('_method', '_token'));

        return redirect()->route('postre.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postre  $postre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postre $postre)
    {
        $postre->delete();
        return redirect()->route('postre.index');
    }

    public function hidden()
    {
        if(Gate::allows('administrador'))
        {
            $postres = Postre::onlyTrashed()->get();

            return view('postres.postreHiddenList', compact('postres'));
        }
        return redirect()->route('postre.index');
    }

    public function unhide($id)
    {
        //echo "Entrando a unhide";
        Postre::onlyTrashed()->find($id)->restore();
        return redirect()->route('postre.index');
    }
}
