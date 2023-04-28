<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * @var Produto
     */
    private $produto;

    public function __construct()
    {
        $this->produto = new Produto();
    }

    public function index()
    {


        // return response()->json($this->produto->all());
        return view('produtos.index', ['produtos' => $this->produto->all()]);
        // return view('nome_page.blade', ['nome_variavel_noblade'=>$this->produto->all()]);
    }
    public function show($id)
    {

        return view('produtos.show', [
            "produto" => $this->produto->find($id)
        ]);
    }

    public function store(Request $request)
    {
        $newProduto = $request->all();
        $newProduto['importado'] = $request->has('importado');
        if (!Produto::create($newProduto)) {
            dd("Error ao criar produto!!");
        }
        return redirect('/produtos');
    }

    public function create()
    {
        return view('produtos.create');
    }

    public function edit($id)
    {
        return view('produtos.edit',[
            'produto'=>Produto::find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        $newProduto = $request->all();
        $newProduto['importado'] = $request->has('importado');
        if (!Produto::find($id)->update($newProduto)) {
            dd("Error ao criar produto!!");
        }
        return redirect('/produtos');
    }

}