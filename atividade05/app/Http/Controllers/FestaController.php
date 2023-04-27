<?php

namespace App\Http\Controllers;

use App\Models\Festa;
use Illuminate\Http\Request;

class FestaController extends Controller
{
    
        /**
     * @var Festa
     */
    private $festa;

    public function __construct()
    {
        $this->festa = new Festa();
    }

    public function index()
    {


        // return response()->json($this->festa->all());
        return view('festas.index', ['festas' => $this->festa->all()]);
        // return view('nome_page.blade', ['nome_variavel_noblade'=>$this->festa->all()]);
    }
    public function show($id)
    {

        return view('festas.show', [
            "festa" => $this->festa->find($id)
        ]);
    }}
