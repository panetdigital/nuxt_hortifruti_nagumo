<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
|
*/

/*  Route::get('/', function () {
    return view('welcome');
}); 
 */
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

// teste JSON COMO BD

use Illuminate\Support\Facades\File;

//teste auto complete co Json

Route::get('/autocomplete', function () {
    $dataPath = storage_path('data.json');

    if (File::exists($dataPath)) {
        $jsonData = File::get($dataPath);
        $data = json_decode($jsonData, true);

        $searchQuery = request('query');
        $suggestions = [];

        if ($searchQuery) {
            foreach ($data as $item) {
                if (str_contains(strtolower($item['nome']), strtolower($searchQuery))) {
                    $suggestions[] = $item['nome'];
                }
            }
        }

        return response()->json($suggestions);
    }

    return response()->json([]);
});

// teste novo impletacao pesquisar na arq Json
Route::get('/search', function () {
    $dataPath = storage_path('data.json');

    if (File::exists($dataPath)) {
        $jsonData = File::get($dataPath);
        $data = json_decode($jsonData, true);

        $searchQuery = request('query');
        $filteredData = [];

        if ($searchQuery) {
            foreach ($data as $item) {
                if (str_contains(strtolower($item['nome']), strtolower($searchQuery))) {
                    $filteredData[] = $item;
                }
            }
        } else {
         //   $filteredData = $data;
        }

        return view('search', ['data' => $filteredData, 'query' => $searchQuery]);
    }

    return view('search', ['data' => [], 'query' => '']);
});





// Route nota uma  lista produtos -sem usar
Route::get('/nota-produtos', [App\Http\Controllers\ProductController::class, 'notaprodutos'])->name('nota-produtos');


                //ROUTE PARA SERVIÇO DE PRODUTOS - tradicional controller nagumo

// Route de inicicialização pesquisar
Route::get('/', [App\Http\Controllers\NagumoController::class, 'index'])->name('inicio');
Route::get('/offline', [App\Http\Controllers\NagumoController::class, 'offline'])->name('offline');

// ROTA DE FILTRAGEM-----------------------------

// Route de inicicialização filtragem de pesquisar frutas pesquisar
Route::get('/filtrar-frutas',[App\Http\Controllers\ProductController::class, 'filtrarfrutas'])->name('filtrar-frutas');

// Route de inicicialização filtragem de pesquisar legumes pesquisar
Route::get('/filtrar-legumes',[App\Http\Controllers\ProductController::class, 'filtrarlegumes'])->name('filtrar-legumes');

// Route de inicicialização filtragem de pesquisar verduras pesquisar
Route::get('/filtrar-verduras',[App\Http\Controllers\ProductController::class, 'filtrarverduras'])->name('filtrar-verduras');

// Route de inicicialização filtragem de pesquisar granel pesquisar
Route::get('/filtrar-granel',[App\Http\Controllers\ProductController::class, 'filtrargranel'])->name('filtrar-granel');


// Route de inicicialização pesquisar pelo resultado simular 
Route::get('/pesquisar-porLink',[App\Http\Controllers\ProductController::class, 'pesquisarPorLink'])->name('pesquisar-porLink');

// resultado simular --------------------------------------------------


Route::get('/buscar-produto', [App\Http\Controllers\ProductController::class, 'buscarproduto'])->name('buscar-produto');

Route::get('/resultado-busca', [App\Http\Controllers\ProductController::class, 'resultadobusca'])->name('resultado-busca');

Route::get('/lista-todos-produtos', [App\Http\Controllers\ProductController::class, 'listatodosprodutos'])->name('lista-todos-produtos');


// cadastro novo produto
Route::post('/productos/cadastro-produtos', [App\Http\Controllers\ProductController::class, 'cadastroprodutos'])->name('cadastro-produtos');    
//frm para cadastro-novo-prod
Route::get('/admin/frm-cadastro-produtos' , [App\Http\Controllers\ProductController::class,'frmcadastroprodutos'])->name('frm-cadastro-produtos');

// este optimizacão nao estou usando

Route::controller(ProductController::class)->group(function () {
   
    Route::get('edit/{id}', 'edit')->name('admin.frm-produtos_alterar');
    Route::post('edit/{id}', 'update')->name('products.update');
    Route::get('delete/{id}', 'delete')->name('products.delete');
});
//------------------------------------------------------------


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// DASHBOARD--produtos--------------------------------------------------

//Alterar registro prdt
Route::get('/admin/frm-produtos-editar/{cod}', [App\Http\Controllers\ProductController::class,'frm_produtos_edit'])->name('frm-produtos-editar');
Route::post('/admin/produtos-salva-alteracao',[App\Http\Controllers\ProductController::class,'frm_produtos_edit_salva'])->name('produtos-salva-alteracao');
//---------------------------------------------------------------------------------------------------

// DELETA REGISTRO ------------------------------------------------------
Route::get('/admin/frm_produtos_deletar/{cod}', [App\Http\Controllers\ProductController::class,'frm_produtos_deletar'])->name('frm_produtos_deletar');
Route::delete('/produto/excluir/{id}', [App\Http\Controllers\ProductController::class, 'excluir'])->name('produto.excluir');


//nao estou usando
//Route::get('/admin/produtos-deletar/{cod}', [App\Http\Controllers\ProductController::class,'produtos_deletar'])->name('produtos-deletar');


//------------------------------------------------------------------------


// entrada do painel DASBOARD-usuarios------------------

// Profile
Route::get('/admin/dashboard', [App\Http\Controllers\usuariosController::class,'dashboard'])->name('dashboard');

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home'); antes era este para acesso panel

// Profile
Route::get('/admin/p-usuarios-profile', [App\Http\Controllers\usuariosController::class,'frm_usuarios_profile']);

// Lista user cadastrado
Route::get('/admin/usuarios',[App\Http\Controllers\usuariosController::class,'list_usuarios'])->name('usuarios');

// Inclusao no user
Route::get('/admin/p-frm-usuarios_incluir',[App\Http\Controllers\usuariosController::class,'frm_usuarios_insert']);
Route::post('/admin/p-usuarios-salva-inclusao',[App\Http\Controllers\usuariosController::class,'frm_usuarios_insert_salva']);

//Alterar registro user
Route::get('/admin/p-usuarios-editar/{id}', [App\Http\Controllers\usuariosController::class,'frm_usuarios_edit']);
Route::post('/admin/p-usuarios-salva-alteracao',[App\Http\Controllers\usuariosController::class,'frm_usuarios_edit_salva']);


//Exclui registro user
Route::get('/admin/p-usuarios-excluir/{id}', [App\Http\Controllers\usuariosController::class,'frm_usuarios_delete']);
Route::post('/admin/p-usuarios-salva-exclusao', [App\Http\Controllers\usuariosController::class,'frm_usuarios_delete_salva']);


//Ativar user
Route::get('/admin/p-usuarios-desativar/{id}', [App\Http\Controllers\usuariosController::class,'frm_usuarios_desativar']);
Route::get('/admin/p-usuarios-ativar/{id}', [App\Http\Controllers\usuariosController::class,'frm_usuarios_ativar']);

// Permissao
Route::get('/admin/p-usuarios-permissoes/{id}',[App\Http\Controllers\usuariosController::class, 'frm_usuarios_permissoes']);
Route::post('/admin/p-usuarios-salva-permissoes',[App\Http\Controllers\usuariosController::class, 'frm_usuarios_permissoes_salva']);


// Lista Produtos-------------------------------
Route::get('/admin/frm-lista-produto', [App\Http\Controllers\ProductController::class, 'listaprodutos'])->name('lista-produtos');

Route::get('/admin/frm-lista-produtos-continue', [App\Http\Controllers\ProductController::class, 'listaprodutoscontinue'])->name('frm-lista-produtos-continue');
//----------------------------------------------
// caminho para criar session de aotorizao user logado
Route::get('/admin/efetua-login',[App\Http\Controllers\usuariosController::class,'efetlogin']);

/* Route::get('/login',[App\Http\Controllers\AuthController::class,'login'])->name('login');
Route::post('/login',[App\Http\Controllers\AuthController::class,'loginAction'])->name('login.action');
 */
// 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
/* Route::get('/auth',function(){
    return view('auth.login');
}); */

//Auth::routes();

