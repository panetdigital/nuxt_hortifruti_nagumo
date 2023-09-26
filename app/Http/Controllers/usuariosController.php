<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

// para lista usuarios cadastrados usei tbl user de propriar ravel
use App\Models\User;

//importer tabela produtos
use App\Models\produtos;

//-----------------------------------
class usuariosController extends Controller
{
    // methodo construc para filtra tudo rotas passa pra authentificacao
        // tem como filtra só uma rota basta colocar no final da rota "->middleware('auth');"
        public function __construct()
        {
            $this->middleware('auth');
        }
    
    //----------------------------------------------------------------------------------------------


    //EFETUAR LOGIN-------------------------------------------
    public function efetlogin(){
     
        if(!Session::get('lg_logado')) {
                return redirect('/login');
           
        } else {
                echo '<h1>Agarde autorização de administrador de sistema de Hortifruti!</h1><br>
                <img src="https://i.pinimg.com/originals/1f/2d/04/1f2d04072f0a32c729d6229eb39ac9d0.gif"><br>
                <a class="btn btn-primary btn-lg active" href="https://nagumo.marketingonline.click/public/">Retorno <-</a> ';
                //return redirect('/admin/usuarios');
              //  return view('home');
        }     
     }

//----------------------------------------------------------------------------------


 // USUARIOS - PROFILE
 public function dashboard() {
      
        //  $dados = User::find(Session::get('id'));
        //  session(['name'=>'sherif']);
        //  var_dump(Session::all());
        $fruta = "fruta";
        $legume = "legume";
        $granel = "granel";
        $verdura = "verdura";

        $usuarios = User::all()->count(); // contagem de usurios
        $produtos = produtos::all()->count(); // contagem de produtos

        $totalRegistrosfutas = produtos::where('grupo', $fruta)->count();
        $totalRegistroslegumes = produtos::where('grupo', $legume)->count();
        $totalRegistrosgranel = produtos::where('grupo', $granel)->count();
        $totalRegistrosverdura = produtos::where('grupo', $verdura)->count();


        $user = auth()->user();
        $dados = $user->ativo; 
        $dado_perm = $user->permissao001; 
        $dados = $user->name;


        //criar session/ importa class session
        Session::put('lg_permissao001', $dado_perm);  
        
        
          return view('/admin/dashboard', compact('usuarios','produtos',
          'totalRegistrosfutas','totalRegistroslegumes','totalRegistrosgranel','totalRegistrosverdura')); 
     
  }

    // USUARIOS - PROFILE
    public function frm_usuarios_profile() {
      
          //  $dados = User::find(Session::get('id'));
          //  session(['name'=>'sherif']);
          //  var_dump(Session::all());
          
          $user = auth()->user();
          $dados = $user->name;
            return view('/admin/p-frm-usuarios_profile',compact('dados'));
       
    }

    //----------------------------------------------------------------------------------------------
        // Atencão fiz uma logica if else no caso usuarios nao tem permissão001, seja direcionado profile
     public function list_usuarios()
    {
        //$nagumo = nagumo::all();
       // dd($nagumo);

       $user = auth()->user();
       $dados = $user->ativo; 
       $dado_perm = $user->permissao001; 
       Session::put('lg_logado', true);

       if($dado_perm) {
                $dados = User::all();
                return view('/admin/p-list-usuarios',compact('dados'));

        }else{
                return view('/admin/p-frm-usuarios_profile');
        }
       
    }


     //----------------------------------------------------------------------------------------------
    // USUARIOS - INCLUIR-novo registra
    public function frm_usuarios_insert() {
        
            return view('/admin/p-frm-usuarios_incluir');
      
    }

  // USUARIOS - SALVA INCLUSAO
  public function frm_usuarios_insert_salva(Request $request) {
       

    //  dd($request->all());
          $dados = new User;
          $dados->name = $request->nome;
          $dados->email = $request->email;
          $dados->password = Hash::make($request->email);
          $dados->ativo = true;
         $dados->save();
         // $dados->funcao = $request->funcao;
          
          // Adicionar mensagem à sessão flash
        $request->session()->flash('success', 'Cadastro salvo com sucesso!');
          return redirect('/admin/usuarios');
      
  }
  //-------------------------------------------------------------------------------------------------------- 
    // USUARIOS - ALTERAR
    public function frm_usuarios_edit($id) {
        //dd($id);
             $dados = User::find($id);
            return view('/admin/p-frm-usuarios_alterar', compact('dados')); 
        
    }

    //----------------------------------------------------------------------------------------------
    // USUARIOS - SALVA ALTERACAO
    public function frm_usuarios_edit_salva(Request $request) {
        
            $dados = User::find($request->id);
            $dados->name = $request->nome;
            $dados->email = $request->email;
            $dados->save();
            return redirect('/admin/usuarios');
        
    }

    
    // USUARIOS - EXCLUIR
    public function frm_usuarios_delete($id) {
        
            $dados = User::find($id);
            return view('/admin/p-frm-usuarios_excluir', compact('dados'));
        
    }

    //----------------------------------------------------------------------------------------------


    // USUARIOS - SALVA EXCLUSAO
    public function frm_usuarios_delete_salva(Request $request) {
        
            User::destroy($request->id);
            return redirect('/admin/usuarios');
       
    }

    //----------------------------------------------------------------------------------------------
  

     // USUARIOS - DESATIVAR
     public function frm_usuarios_desativar($id) {
           // dd($id);
            $dados = User::find($id);
            $dados->ativo = false;
            $dados->save();
            return redirect('/admin/usuarios');
        
    }

    //----------------------------------------------------------------------------------------------
    // USUARIOS - ATIVAR
    public function frm_usuarios_ativar($id) {
        
            $dados = User::find($id);
            $dados->ativo = true;
            $dados->save();
            return redirect('/admin/usuarios');
       
    }

     
    //----------------------------------------------------------------------------------------------
    // USUARIOS - PERMISSOES
    public function frm_usuarios_permissoes($id) {
               // dd($id);
            $dados = User::find($id);
            return view('/admin/p-frm-usuarios_permissoes', compact('dados'));
      
    }

    //----------------------------------------------------------------------------------------------
    // USUARIOS - SALVA PERMISSOES
    public function frm_usuarios_permissoes_salva(Request $request) {
        
            $dados = User::find($request->id);
            $dados->permissao001 = $request->boolean('permissao001');
            $dados->permissao002 = $request->boolean('permissao002');
          
            $dados->save();
            return redirect('/admin/usuarios');
        
    }

    //----------------------------------------------------------------------------------------------

}
