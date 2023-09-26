
@extends('layouts.paneladmin')
<!--title dinamico-->
@section('title', 'Liste produto')

@section('content_liste_prod')
<div class="container">
  <div class="content-wrapper">
      <div class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1 class="m-0">Liste produtos</h1>
                      
                      <!--  Msg de sucessos  -->  
                      @if(session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                            <!-- Fim Msg sucesso  -->

                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active"><a href="/public/admin/dashboard">Dashboard</a></li>
                          <li class="breadcrumb-item active">Lista produtos</li>
                      </ol>
                  </div>
              </div>
          </div>
      </div>

      <div class="content">
        <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h6 class="m-0 font-weight-bold text-primary">Informações produtos</h6>
      
    </div>
    <div class="card-body">
           
      <a href="{{ route('frm-cadastro-produtos') }}" class="btn btn-primary mb-3">Adicionar produto</a>
           
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              
              <th>code </th>
              <th>nome </th>
                      
              <th>Ação</th>
                           
            </tr>
          </thead>
          <tbody>
           
            @foreach ($data as $row)
              <tr>
                
                <td>{{ $row->cod }}</td>
                <td>{{ $row->nome }}</td>
                
                
                                
                <td>
               
                  <a href="/public/admin/frm-produtos-editar/{{ $row->cod }}" class="btn btn-warning">Editar</a>


                  <!-- Atribucao de permissao -->
                @if (Session::get('lg_permissao001'))
                  <a href="" data-toggle="modal" data-target="#confirmModal" 
                    class="btn btn-danger" >Excluir</a>
                @endif 

                </td>
                                
              </tr>
            @endforeach
          </tbody>

          
        </table>
        <a href="{{route('frm-lista-produtos-continue')}}">Continue...</a>

      </div>
    </div>
  </div>

    <!-- Modal de confirmação de exluisão de prodt(OBSR: LIGADO COM BOTAO EXCLUIS)-->
    <div class="modal fade" id="confirmModal" tabindex="-1" role="dialog" aria-labelledby="confirmModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmModalLabel">Confirmação de Exclusão</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Você tem certeza que deseja excluir este produto?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <form method="POST" action="{{ route('produto.excluir', $row->cod) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Excluir</button>
                    </form>
                </div>
            </div>
        </div>

</div>
   
   
</div>



@endsection