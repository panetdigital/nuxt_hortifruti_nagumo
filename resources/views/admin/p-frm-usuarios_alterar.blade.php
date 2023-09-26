@extends('layouts.paneladmin')
<!--title dinamico-->
@section('title') {{'Alterar usuario'}} @endsection

@section('content_alterar')

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
                          <li class="breadcrumb-item active">Alteração</li>
                          <li class="breadcrumb-item active"><a href="/admin/usuarios">Usuários</a></li>
                          <li class="breadcrumb-item active"><a href="/admin/home">inicio</a></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Alterar os dados do(a) Usuário(a)</h4>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <div class="basic-form">
                      <form action="/public/admin/p-usuarios-salva-alteracao" method="POST">
                          @csrf
                          <div class="form-row">
                              <div class="form-group col-md-8">
                                  <label>Nome</label>
                                  <input type="text" class="form-control" name="nome" required="required" value="{{ $dados->name }}">
                              </div>
                            
                              <div class="form-group col-md-6">
                                  <label>Email</label>
                                  <input type="email" class="form-control" name="email" required="required" value="{{ $dados->email }}">
                              </div>
                              <input type="hidden" name="id" value="{{ $dados->id }}">
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