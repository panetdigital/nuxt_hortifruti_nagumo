<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\produtos;

 
class ProductController extends Controller
{
     // buscar produto NO APPLICATIVO-------------------
    public function notaprodutos() 
    {
        return view('nota-produtos');
    }




    // buscar produto NO APPLICATIVO-------------------

    public function buscarproduto(Request $request)
    {
        if($request->ajax()){

            

            $data = produtos::where('nome','LIKE',$request->name.'%')
            ->orWhere('cod', '=', $request->name)
            ->limit(5)->get();
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
       
   
    }
   //-----------------fim-----------------------------------

// Route de inicicialização pesquisar pelo resultado simular teste

   public function pesquisarPorLink(Request $request)
   {
    
          $termoPesquisa = $request->input('name');
//dd($termoPesquisa);
          if (is_string($termoPesquisa)) {
   
              $resultados = DB::table('produtos')
              ->where('nome', 'like', '%' . $termoPesquisa . '%')
              ->orWhere('cod', '=', $termoPesquisa)
              ->get();
      
              $registro = produtos::where('nome', $termoPesquisa)->first();
              // função explode do PHP para dividir a frase
               //  registros similares com base em algum critério (por exemplo,  "nome")
   
               $palavras = explode(' ', $termoPesquisa); // Divide a frase em palavras usando o espaço como delimitador
   
               $primeiroTrecho = $palavras[0]; // Obtém o primeiro trecho da frase
               
              $registrosSimilares = DB::table('produtos')
                                  ->where(function ($query) use ($primeiroTrecho) {
                                      $query->where('nome', 'LIKE', '%' . $primeiroTrecho . '%')
                                          ->orWhere('cod', 'LIKE', '%' . $primeiroTrecho . '%');
                                  })
                                  ->get();
   
              return view('/produtos/resultado-busca',compact('resultados','registrosSimilares'));
       } else {
           // Caso o produto não seja encontrado, você pode redirecionar para uma página de erro ou retornar uma mensagem de erro
           return view('inicio');
       }
   }
// Route de inicicialização pesquisar pelo resultado simular teste-------------------------------------------------------------





    // funcao de resultado de buscar---------------------------------------------------------

    public  function resultadobusca(Request $request){

        //$resultados = nagumo::all();

       $termoPesquisa = $request->input('name');

       if (is_string($termoPesquisa)) {

           $resultados = DB::table('produtos')
           ->where('nome', 'like', '%' . $termoPesquisa . '%')
           ->orWhere('cod', '=', $termoPesquisa)
           ->get();
   
           $registro = produtos::where('nome', $termoPesquisa)->first();
           // função explode do PHP para dividir a frase
            //  registros similares com base em algum critério (por exemplo,  "nome")

            $palavras = explode(' ', $termoPesquisa); // Divide a frase em palavras usando o espaço como delimitador

            $primeiroTrecho = $palavras[0]; // Obtém o primeiro trecho da frase
            
           $registrosSimilares = DB::table('produtos')
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
          
   
       
   }// -------------------Fim Teste primeiro--------------------------------------------------
   

    
    // funcao para lista todos produtos

    public function listatodosprodutos()
    {
        //$data = nagumo::all();
        $data = DB::table('produtos')->orderBy('nome', 'ASC')->paginate(9);
        return view('/produtos/lista-todos-produtos',compact('data'));
  
    }
    //-----------------fim-----------------------------------

 // funcao de lista os produtos NO PAINEL ADMIN----------------------

    public function listaprodutos(Request $request)
    {

            // Obter os parâmetros de filtro do formulário
            $filternomeprd = $request->input('filternomeprd');

            // Consulta inicial para produtos
            $query = produtos::query();


            // Aplicar as condições de filtro
            if ($filternomeprd) {
                $query->where('nome', 'like', "%$filternomeprd%" );

                // Executar a consulta e obter os resultados
                $data = $query->get();
                return view('/admin/frm-lista-produtos',compact('data'));
            }


            //Liste todos produtos

                $data = produtos::all();
                //dd($data);
                $data = DB::table('produtos')->orderBy('nome', 'ASC')->paginate(6);
                return view('/admin/frm-lista-produtos',compact('data'));
    }
 
    //LISTA PRDT CONTINUE

    public function listaprodutoscontinue(Request $request)
    {

            // Obter os parâmetros de filtro do formulário
            $filternomeprd = $request->input('filternomeprd');

            // Consulta inicial para produtos
            $query = produtos::query();


            // Aplicar as condições de filtro
            if ($filternomeprd) {
                $query->where('nome', 'like', "%$filternomeprd%" );

                // Executar a consulta e obter os resultados
                $data = $query->get();
                return view('/admin/frm-lista-produtos',compact('data'));
            }


            //Liste todos produtos

                $data = produtos::all();
                //dd($data);
                $data = DB::table('produtos')->orderBy('nome', 'ASC')->paginate(5);
                return view('/admin/frm-lista-produtos-continue',compact('data'));
    }
 //---------------------------------------------------------------------------------------------
 
// FOLTRAGEM DE PRODUTOS


// link para frm Filtrarfrutas de prdts----------------------------
public function filtrarfrutas(){

    // Filtra os registros na tabela "produtos" pela categoria "frutas"
    $frutas = produtos::where('grupo', 'fruta')->get();

    return view('produtos/filtrar-frutas', compact('frutas'));
}


// link para frm Filtrarlegumes de prdts----------------------------
public function filtrarlegumes(){

    // Filtra os registros na tabela "produtos" pela categoria "frutas"
    $legumes = produtos::where('grupo', 'legume')->get();

    return view('produtos/filtrar-legumes', compact('legumes'));
}

// link para frm Filtrarlegumes de prdts----------------------------
public function filtrarGranel(){

    // Filtra os registros na tabela "produtos" pela categoria "frutas"
    $granel = produtos::where('grupo', 'granel')->get();

    return view('produtos/filtrar-granel', compact('granel'));
}

// link para frm Filtrarverdura de prdts----------------------------
public function filtrarverduras(){

    // Filtra os registros na tabela "produtos" pela categoria "frutas"
    $verdura = produtos::where('grupo', 'verdura')->get();

    return view('produtos/filtrar-verduras', compact('verdura'));
}

 // link para frm do cadastro de prdts----------------------------
    public function frmcadastroprodutos(){
        return view('admin/frm-cadastro-produtos');
    }
 // fim frm do cadastro de prdts----------------------------


// cadastro novo prdt------------------------------------------
    public function cadastroprodutos(Request $request)
    {
      //  dd($request->all());  // depuraçao de resultado de forms

      // estrutura de validaçao(obs:importa class:validor em cima )
                $validator = Validator::make($request->all(), [
                    'coditem' => 'required',
                    'nome' => 'required',
                    // Adicione mais regras de validação para outros campos
                ]);

                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

        //---------------------------------------------------------
      try {
            $produto = new Produtos;
            $produto->cod = $request->cod;
            $produto->coditem = $request->coditem;
            $produto->nome = $request->nome;
            $produto->preco = $request->preco;
            $produto->precopromo = $request->precopromo;
            $produto->grupo = $request->grupo;
           // $produto->descricao = $request->desc;
            $produto->imagem = $request->imagem;
                
            $produto->save();

            return redirect()->route("lista-produtos")->with('success', 'Produto salvo com sucesso!');

        } catch (QueryException $e) {
            return redirect()->route("lista-produtos")->with('error', 'Falha ao salvar o produto: bd' . $e->getMessage());
        }
      
    }
 //-----------------fim-----------------------------------
 


    public function edit($id)
    {
        $product = products::find($id);
        $category = category::get();
 
        return view('products.form', ['product' => $product, 'category' => $category]);
    }
 
    public function update($id, Request $request)
    {
        $data = [
            'item_code' => $request->item_code,
            'productname' => $request->productname,
            'category' => $request->id_category,
            'price' => $request->price
        ];
 
        products::find($id)->update($data);
 
        return redirect()->route('products');
    }
 
    public function delete($id)
    {
        products::find($id)->delete();
 
        return redirect()->route('products');
    }



    
// Editar registro produtos-------------------------------------------

 // PRODUTOS - ALTERAR
 public function frm_produtos_edit($cod) {
    //dd($id);
        // $dados = produtos::find($cod);

        // $codigoProduto = 'COD123'; // Código do produto que você deseja encontrar

$dados = Produtos::where('cod', $cod)->first();

    if ($dados) {
        // Produto encontrado
    /*   echo "Código: " . $produto->cod . "<br>";
        echo "Nome: " . $produto->nome . "<br>"; */
        return view('/admin/frm-produtos_alterar', compact('dados'));
    } else {
        // Produto não encontrado
        echo "Produto não encontrado.";
    }
        
    
}

//----------------------------------------------------------------------------------------------
// PRODUTOS - SALVA ALTERACAO
public function frm_produtos_edit_salva(Request $request) {
    
       // $dados = Produtos::where('cod', $request->cod)->first();
        $dados = produtos::find($request->id);
      /*   $dados->cod = $request->cod;
        $dados->coditem = $request->coditem;
        $dados->nome = $request->nome;
        $dados->preco = $request->preco;
        $dados->precopromo = $request->precopromo;
        $dados->grupo = $request->grupo;
        $dados->descricao = $request->descricao;
        $dados->imagem = $request->imagem;
        $dados->save();
        return redirect('/admin/frm-lista-produto'); */

        if ($dados) {
            // Atualizar os dados do produto ///  $dados = User::find($request->id);
            $dados->id = $request->id;
            $dados->cod = $request->cod;
            $dados->coditem = $request->coditem;
            $dados->nome = $request->nome;
            $dados->preco = $request->preco;
            $dados->precopromo = $request->precopromo;
            $dados->grupo = $request->grupo;
            $dados->link = $request->link;
            $dados->imagem = $request->imagem;
            
            // Salvar as alterações no banco de dados
            $dados->save();
            return redirect('/admin/frm-lista-produto')->with('success', 'Produto alterado com sucesso!');
         
           // echo "Produto atualizado com sucesso.";
        } else {
            echo "Produto não encontrado.";
        }
    
}

public function excluir($cod)
{
    $produto = Produtos::where('cod', $cod)->first();
    // return redirect()->back()->with('success', 'Produto excluído com sucesso.');

    if ($produto) {

        $produto->delete();
                                                                          
        return redirect('/admin/frm-lista-produto')->with('success', 'Produto excluído com sucesso.');

    } else {
       return redirect('/admin/frm-lista-produto')->with('success', 'Produto não encontrado.'); 
    }
}


/* public function produtos_deletar($cod) {


}
 */

}