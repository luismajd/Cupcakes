<?php

namespace App\Http\Controllers;

use App\Postre;
use App\Pedido;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
//use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Gate::allows('administrador'))
        {
            $pedidos = Pedido::with(['user' => function($query){
                $query->where('clase', '!=', 'Admin');
            }])
            ->has('postres')
            ->whereDate('fecha_entrega', '>', Carbon::now())
            ->get();
            return view('pedidos.pedidoIndex', compact('pedidos'));
        }

        $postres = Postre::all();
        //$postres = DB::table('postres')->paginate(2);

        return view('pedidos.pedidoForm', compact('postres'));
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
        $request->validate([
            'fecha_entrega' => 'required|date',
        ]);

        $list = $request->all()['agregar']; //Arreglo completo de checkboxes

        $activated = array();

        //Llenar lista de activados 0/1
        $n = sizeof($list);
        for($i = 0; $i < $n; $i++)
        {
            if($list[$i] == '0')
            {
                if($i != $n-1)
                {
                    if($list[$i+1] == '1')
                    {
                        continue;
                    }
                }
            }
            $activated[] = $list[$i];
        }

        $id_postres = array();
        $precios = array();
        $cantidades = array();

        //Llenar listas de atributos para los productos activados
        $n = sizeof($activated);
        for($i = 0; $i < $n; $i++)
        {
            if($activated[$i] == '1')
            {
                $id_postres[] = $request->postre_id[$i];
                $precios[] = $request->precio[$i];
                $cantidades[] = $request->cantidad[$i];
            }
        }

        $pedido = Pedido::create($request->all());

        //Agregar a tabla pivote
        $n = sizeof($id_postres);

        for($i = 0; $i < $n; $i++)
        {
            $pedido->postres()->attach($id_postres[$i], ['precio_postre' => $precios[$i], 'cantidad' => $cantidades[$i]]);
        }

        return redirect()->route('home')->with(['mensaje' => 'Tu pedido ha sido registrado.']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        return view('pedidos.pedidoShow', compact('pedido'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function edit(Pedido $pedido)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pedido $pedido)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        //
    }
}
