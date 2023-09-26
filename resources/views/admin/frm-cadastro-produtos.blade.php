
@extends('layouts.paneladmin')
<!--title dinamico-->
@section('title') {{'Painel admin'}} @endsection

@section('content_cadastro_pro')

<div class="container">
  <div class="content-wrapper">
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h3 class="m-0">Cadastro novo Produto</h3>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active"><a href="/public/admin/dashboard">Dashboard</a></li>
                          <li class="breadcrumb-item active">Cadastra Produto</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
            <!--Msg de validaçao de capos  -->
          @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
             <!-- Fim Msg de validaçao de capos  -->
              <div class="card-body">
                  <h4 class="card-title"></h4>
                  <div class="table-responsive">
                  <form action="{{ route('cadastro-produtos') }}" method="post">
                        @csrf
                        <div class="row">
                        <div class="col-12">
                            <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <!--  Msg de sucessos  -->  
                                @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            <!-- Fim Msg sucesso  -->
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                <label for="code">Code produto</label>
                                <input type="text" class="form-control" id="item_code" name="cod" value="">
                                </div>
                                <div class="form-group">
                                <label for="code etiq<">Code etiq</label>
                                <input type="text" class="form-control" id="item_codetiq" name="coditem" value="">
                                </div>
                                <div class="form-group">
                                <label for="productname">Nome Produto</label>
                                <input type="text" class="form-control" id="productname" name="nome" value="">
                                </div>

                                <!-- Controle de permissao -->
                                @if (Session::get('lg_permissao001'))

                                <div class="form-group">
                                <label for="item_price">Preço/kg </label>
                                <input type="number step=0.01" class="form-control" id="item_price" name="preco" value="">
                                </div>
                                <div class="form-group">
                                <label for="item_price">Preço Promo</label>
                                <input type="number step=0.01" class="form-control" id="item_price_promo" name="precopromo" value="">
                                </div>

                                @endif
                            <!-- Fim Controle de permissao -->
                                <div class="form-group">
                                <label for="grupo">Categoria</label>
                                <select name="grupo" id="grupo" class="custom-select">
                                      <option value="fruta" selected >Fruta</option>
                                      <option value="legume" selected >Legume</option>
                                      <option value="legume" selected >Verduras</option>
                                       <option value="0" selected >-- Escolhe Categoria --</option>             
                                </select>
                                </div>
                            <!--Fim  Controle de permissao -->
                                @if (Session::get('lg_permissao001'))
                                <div class="form-group">
                                <label for="descr">Descrição</label>
                                <input type="text" class="form-control" id="desc" name="desc" value="">
                                </div>
                                <div class="form-group">
                                <label for="imagem">Imagem</label>
                                <input type="text" class="form-control" id="imagem" name="imagem" value="">
                                </div>
                                @endif
                        <!-- Fim  Controle de permissao -->
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  @endsection