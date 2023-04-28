<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    
        /**
     * @var Cliente
     */
    private $cliente;

    public function __construct()
    {
        $this->cliente = new Cliente();
    }

    public function index()
    {


        // return response()->json($this->cliente->all());
        return view('clientes.index', ['clientes' => $this->cliente->all()]);
        // return view('nome_page.blade', ['nome_variavel_noblade'=>$this->cliente->all()]);
    }
    public function show($id)
    {

        return view('clientes.show', [
            "cliente" => $this->cliente->find($id)
        ]);
    }
    
    public function store(Request $request)
    {
        $newCliente = $request->all();
        if (!Cliente::create($newCliente)) {
            dd("Error ao criar cliente!!");
        }
        return redirect('/clientes');
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function edit($id)
    {
        return view('clientes.edit',[
            'cliente'=>Cliente::find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        $newCliente = $request->all();
        if (!Cliente::find($id)->update($newCliente)) {
            dd("Error ao criar cliente!!");
        }
        return redirect('/clientes');
    }

}
