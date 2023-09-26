
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
                          <li class="breadcrumb-item active">Exclusão</li>
                          <li class="breadcrumb-item active"><a href="/admin/usuarios">Usuários</a></li>
                          <li class="breadcrumb-item active"><a href="/admin/home">Início</a></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Excluir o(a) Usuário(a)</h4>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <div class="basic-form">
                      <form action="/public/admin/p-usuarios-salva-exclusao" method="POST">
                          @csrf
                          <div class="form-row">
                              <div class="form-group col-md-8">
                                  <label style="font-weight: bolder;">Nome</label><br>
                                  <span style="font-style: italic;">{{ $dados->name }}</span>
                              </div>
                              
                              <div class="form-group col-md-6">
                                  <label style="font-weight: bolder;">Email</label><br>
                                  <span style="font-style: italic;">{{ $dados->email }}</span>
                              </div>
                              <input type="hidden" name="id" value="{{ $dados->id }}">
                          </div>
                          <a href="/public/admin/usuarios" class="btn btn-warning">Cancelar</a>
                          <button type="submit" class="btn btn-danger">Excluir</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>
  @endsection