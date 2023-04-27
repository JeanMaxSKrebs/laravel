<?php

namespace App\Http\Controllers;

use App\Models\Salao;
use Illuminate\Http\Request;

class SalaoController extends Controller
{
    /**
     * @var Salao
     */
    private $salao;

    public function __construct()
    {
        $this->salao = new Salao();
    }

    public function index()
    {


        // return response()->json($this->salao->all());
        return view('salaos.index', ['salaos' => $this->salao->all()]);
        // return view('nome_page.blade', ['nome_variavel_noblade'=>$this->salao->all()]);
    }
    public function show($id)
    {

        return view('salaos.show', [
            "salao" => $this->salao->find($id)
        ]);
    }}
