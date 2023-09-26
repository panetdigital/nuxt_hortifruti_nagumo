<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Este CONTROLLER NAO ESTA SENDO USADO.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

          $user = auth()->user();
          $dados = $user->ativo; 
          $dado_perm = $user->permissao001; 
          Session::put('lg_logado', true);

          if($dados) {
            Session::put('lg_logado', true);
            
            Session::put('lg_permissao001', $dado_perm);
           // return view('home');
            return view('/admin/dashboard');

           //return view('/admin/p-frm-usuarios_profile');
           
        } else {
           
            return redirect('/admin/efetua-login');

        }
         
        //return view('home',compact('dados'));
    }
}
