<?php

namespace App\Http\Controllers;

use App\Postre;
use Illuminate\Http\Request;

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Postre  $postre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Postre $postre)
    {
        //
    }
}
