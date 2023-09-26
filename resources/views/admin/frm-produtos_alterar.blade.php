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
                      <h1 class="m-0">Produto</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active">Alteração</li>
                          <li class="breadcrumb-item active"><a href="/admin/dashboard">Dashboard</a></li>
                          <li class="breadcrumb-item active">Alterar produto</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title">Alterar os dados dos Produtos</h4>

                           
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <div class="basic-form">
                      <form action="/public/admin/produtos-salva-alteracao" method="POST">
                          @csrf
                          <div class="form-row">
                              <div class="form-group col-md-8">
                                  <label>Cod</label>
                                  <input type="text" class="form-control" name="cod" required="required" value="{{ $dados->cod }}">
                              </div>
                              <div class="form-group col-md-8">
                                  <label>CodItem</label>
                                  <input type="text" class="form-control" name="coditem" required="required" value="{{ $dados->coditem }}">
                              </div>
                              <div class="form-group col-md-8">
                                  <label>Nome</label>
                                  <input type="text" class="form-control" name="nome" required="required" value="{{ $dados->nome }}">
                              </div>
                             
                              <div class="form-group col-md-8">
                                  <label>Categoria</label>
                                  <input type="text" class="form-control" name="grupo" required="required" value="{{ $dados->grupo }}">
                              </div>
                            
                              <div class="form-group col-md-6">
                                  <label>Descrição</label>
                                  <input type="text" class="form-control" name="descricao"  value="descr">
                              </div>
                              <div class="form-group col-md-8">
                                  <label>Imagem</label>
                                  <input type="text" class="form-control" name="imagem"  value="{{ $dados->imagem }}">
                              </div>
                              <input type="hidden" name="id" value="{{ $dados->id }}">
                          </div>
                          <a href="/public/admin/frm-lista-produto" class="btn btn-warning">Cancelar</a>
                          <button type="submit" class="btn btn-primary">Salvar</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
</div>

  @endsection