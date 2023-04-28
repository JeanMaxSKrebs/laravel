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
    }
    
    public function store(Request $request)
    {
        $newFesta = $request->all();
        if (!Festa::create($newFesta)) {
            dd("Error ao criar festa!!");
        }
        return redirect('/festas');
    }

    public function create()
    {
        return view('festas.create');
    }

    public function edit($id)
    {
        return view('festas.edit',[
            'festa'=>Festa::find($id)
        ]);
    }

    public function update(Request $request,$id)
    {
        $newFesta = $request->all();
        if (!Festa::find($id)->update($newFesta)) {
            dd("Error ao criar festa!!");
        }
        return redirect('/festas');
    }

}
