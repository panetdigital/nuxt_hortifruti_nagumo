<?php

namespace App\Http\Controllers;

use App\Models\nagumo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class NagumoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    
        return view(view:'inicio');
       // dd($nagumo);
      // return view(view:'index')->with('nagumo', $nagumo);
     // return redirect()->away('https://teste.promocaoonline.club/index.html');

    }
    public function offline()
    {
    
        return view(view:'offline');
    
    }
    public function login(){
        return view('/vendor/adminlte/auth.login');
           
        }
    // resultado de buscar---------------------------------------------------------

    public  function resultadobusca(Request $request){

         //$resultados = nagumo::all();

        $termoPesquisa = $request->input('name');

        if (is_string($termoPesquisa)) {

            $resultados = DB::table('nagumos')
            ->where('nome', 'like', '%' . $termoPesquisa . '%')
            ->orWhere('cod', '=', $termoPesquisa)
            ->get();
    
            $registro = nagumo::where('nome', $termoPesquisa)->first();
            // função explode do PHP para dividir a frase
             //  registros similares com base em algum critério (por exemplo,  "nome")

             $palavras = explode(' ', $termoPesquisa); // Divide a frase em palavras usando o espaço como delimitador

             $primeiroTrecho = $palavras[0]; // Obtém o primeiro trecho da frase
             
            $registrosSimilares = DB::table('nagumos')
                                ->where(function ($query) use ($primeiroTrecho) {
                                    $query->where('nome', 'LIKE', '%' . $primeiroTrecho . '%')
                                        ->orWhere('cod', 'LIKE', '%' . $primeiroTrecho . '%');
                                })
                                ->get();

            return view('/produtos/resultado-busca',compact('resultados','registrosSimilares'));
           
        } else {
           // return "no inicio campo de texto vazio.";
           return view('inicio');
   
        }
           
    
        // -------------------Teste primeiro--------------------------------------------------

       /*  $resultados = DB::table('nagumos')
        ->where('nome', 'like', '%' . $termoPesquisa . '%')
        ->orWhere('cod', '=', $termoPesquisa)
        ->get();

        //$resultados = nagumo::all();

        $registro = nagumo::where('nome', $termoPesquisa)->first();

        //  registros similares com base em algum critério (por exemplo,  "nome")
        $registrosSimilares = nagumo::where('nome', 'LIKE', '%' . $primeiroTrecho . '%')
            ->where('cod', '!=', $registro->cod)
            ->get();

        
        return view('/produtos/resultado-busca',compact('resultados','registrosSimilares')); */
        
    }// -------------------Fim Teste primeiro--------------------------------------------------
    




    // buscar produto
    public function buscarproduto(Request $request)
    {
        if($request->ajax()){

            

            $data = nagumo::where('nome','LIKE',$request->name.'%')
            ->orWhere('cod', '=', $request->name)
            ->limit(3)->get();
            $output ='';
            if(count($data) >0){
                $output = '<ul class="list-group" style="display:block;position:relative;z-indez:1">';
                    foreach($data as $row){
                        $output .='<li class="list-group-item">'.$row->nome.'</li>';
                    }
                $output .='</ul>';
            }else{
                $output .='<p class="alert alert-danger" role="alert">Nenhum produto correspondente.</p><br>
                                 <a href="">Porfavor cadastra novo produto!</a>';
            }
            return $output;

        }
       //echo "ola buscarproduto";
      // return view(view:'resultado-busca');
   
    }
    // resultado de buscar
    public function listatodosprodutos()
    {
        //$data = nagumo::all();
        $data = DB::table('nagumos')->orderBy('cod', 'desc')->paginate(9);
        return view('/produtos/lista-todos-produtos',compact('data'));
  
    }

    /**
     * cadastro novo produto.
     */
    public function create()
    {
        return view('/produtos/cadastro-produtos');
    }

    /**
     * .
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
