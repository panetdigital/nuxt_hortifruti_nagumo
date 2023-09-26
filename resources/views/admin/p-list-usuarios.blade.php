
@extends('layouts.paneladmin')
<!--title dinamico-->
@section('title') {{'Painel admin'}} @endsection

@section('content_list_user')

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
                          <li class="breadcrumb-item active"><a href="/public/admin/dashboard">Dashboard</a></li>
                          <li class="breadcrumb-item active">Usuários</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
          <div class="card">
              <div class="card-body">
                  <h4 class="card-title"></h4>
                  <div class="table-responsive">
                      <div id="DataTables_Table_0_wrapper" class="dataTables-wrapper container-fluid dt_bootstrap4">
                          <a href="/public/admin/p-frm-usuarios_incluir" type="button" class="btn mb-1 btn-primary">Incluir um novo usuário</a>
                          <div class="row">
                              <div class="col-sm-12">
                              
                              <!-- msg retorno cadastro -->
                              @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                              @endif
                                <!-- fim msg retorno cadastro -->

                                  <table class="table table-striped table-bordered" role="grid">
                                      <thead>
                                          <tr role="row">
                                              <th>Nome</th>
                                              <th>Email</th>
                                              <th>Ações</th>
                                          </tr>
                                      </thead>
                                      <tbody>
                                         @foreach ($dados as $dado)
                                          <tr role="row" class="odd">
                                              <td style="width: 30%">{{ $dado->name }}</td>
                                              <td style="width: 30%">{{ $dado->email }}</td>
                                              <td style="width: 280px">
                                                  <a href="/public/admin/p-usuarios-editar/{{ $dado->id }}" type="button" class="btn mb-1 btn-warning">Alterar</a>
                                                  <a href="/public/admin/p-usuarios-excluir/{{ $dado->id }}" type="button" class="btn mb-1 btn-danger">Excluir</a>
                                                  <a href="/public/admin/p-usuarios-permissoes/{{ $dado->id }}" type="button" class="btn mb-1 btn-primary">Permissões</a>
                                                  @if ($dado->ativo)
                                                  <a href="/public/admin/p-usuarios-desativar/{{ $dado->id }}" type="button" class="btn mb-1 btn-danger">Desativar</a>
                                                  @else
                                                  <a href="/public/admin/p-usuarios-ativar/{{ $dado->id }}" type="button" class="btn mb-1 btn-success">Ativar</a>
                                                  @endif
                                              </td>
                                          </tr>
                                          @endforeach 
                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
  </div>
  @endsection