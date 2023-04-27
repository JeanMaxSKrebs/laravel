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
}