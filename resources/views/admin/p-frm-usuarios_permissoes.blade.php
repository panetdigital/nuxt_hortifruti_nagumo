@extends('layouts.paneladmin')
<!--title dinamico-->
@section('title') {{'Permissões'}} @endsection

@section('content_permissao')

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
                          <li class="breadcrumb-item active">Permissões</li>
                          <li class="breadcrumb-item active"><a href="/paneladmin/p-usuarios">Usuários</a></li>
                          <li class="breadcrumb-item active"><a href="/paneladmin/homeadmin">Home</a></li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Permissões do(a) Usuário(a) {{ $dados->nome }}</h4>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <div class="basic-form">
                      <form action="/public/admin/p-usuarios-salva-permissoes" method="POST">
                          @csrf
                          <div class="form-row">
                              <div class="col-md-12">
                                  <div class="card card-secudary">
                                      <div class="card-header">
                                          <h3 class="card-title">Permissões do Sistema</h3>
                                      </div>
                                      <div class="card-body">
                                          <div class="form-row">
                                              <div class="col-md-3">
                                                  <div class="icheck-success">
                                                     <input type="checkbox" @if($dados->permissao001) checked @endif name="permissao001" id="permissao001"><label for="permissao001">Cadastro de Usuários</label>
                                                  </div>
                                              </div>
                                              <div class="col-md-3">
                                                  <div class="icheck-success">
                                                     <input type="checkbox" @if($dados->permissao001) checked @endif name="permissao001" id="permissao005"><label for="permissao001">Config do Sistema</label>
                                                  </div>
                                              </div>
                                              <div class="col-md-3">
                                                  <div class="icheck-success">
                                                     <input type="checkbox" @if($dados->permissao002) checked @endif name="permissao002" id="permissao002"><label for="permissao002">Cadastro de Produtos</label>
                                                  </div>
                                              </div>
                                             
                                              </div>
                                              
                                          </div>
                                      </div>
                                  </div>
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