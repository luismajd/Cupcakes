<?php

namespace App\Http\Controllers;

use App\Archivo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $archivos = Archivo::where('user_id', '=', Auth::user()->id)->get();

        return view('archivos.archivoIndex', compact('archivos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('archivos.archivoForm');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->mi_archivo->isValid()) { //Valida carga

            //Guarda en storage/app/archivos_cargados
            $nombreHash = $request->mi_archivo->store('archivos_cargados');

            //Crea registro en tabla archivos
            Archivo::create([
                'nombre_original' => $request->mi_archivo->getClientOriginalName(),
                'nombre_hash' => $nombreHash,
                'mime' => $request->mi_archivo->getClientMimeType(),
                'tamaño' => $request->mi_archivo->getSize(),
                'user_id' => Auth::user()->id,
            ]);
        }

        return redirect()->route('pedido.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function show(Archivo $archivo)
    {
        //Download file

        //Obtiene ruta del archivo
        $rutaArchivo = storage_path('app\\' . $archivo->nombre_hash);

        //La respuesta contiene el archivo con el tipo de documento
        return response()->download($rutaArchivo, $archivo->nombre_original, ['Content-Type' => $archivo->mime]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function edit(Archivo $archivo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Archivo $archivo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Archivo  $archivo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Archivo $archivo)
    {
        //
    }

    public function delete(Archivo $archivo)
    {
        //Delete file

        $rutaArchivo = storage_path($archivo->hash);

        //Verifica la existencia del archivo
        if (Storage::exists($archivo->nombre_hash)) {
            Storage::delete($archivo->nombre_hash); //Elimina archivo
            $archivo->delete(); //Elimina registro en tabla
        }

        return redirect()->back();
    }
}
