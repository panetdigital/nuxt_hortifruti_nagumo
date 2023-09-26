
@extends('adminlte::page')
<!--title dinamico-->
@section('title') {{'Cadastro novo usuario'}} @endsection

@section('content')

<div class="container">

  <div class="content-wrapper">
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Usuários</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active">Inclusão</li>
                          <li class="breadcrumb-item active"><a href="/public/admin/usuarios">Usuários</a></li>
                          <li class="breadcrumb-item active"><a href="/public/home">Início</a></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Incluir um(a) Novo(a) Usuário(a)</h4>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <div class="basic-form">
                      <form action="/public/admin/p-usuarios-salva-inclusao" method="POST">
                          @csrf
                          <div class="form-row">
                          <div class="form-group col-md-6">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" required="required">
                              </div>
                              <div class="form-group col-md-8">
                                  <label>Nome</label>
                                  <input type="text" class="form-control" name="nome" required="required">
                              </div>
                             
                             
                             
                              
                          </div>
                          <a href="/public/admin/usuarios" class="btn btn-warning">Cancelar</a>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  @endsection