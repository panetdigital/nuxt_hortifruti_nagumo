
@extends('layouts.paneladmin')
<!--title dinamico-->
@section('title')
 {{'Painel admin'}} 
 @endsection

<!--TESTEGRAFICO-->
@section('script')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  const ctx = document.getElementById('myChart');

  new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Frutas', 'Legumes', 'Granel', 'Temperos', 'Verduras' ],
      datasets: [{
        label: '# of Votes',
        data: [12, 19, 3, 5, 2],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        y: {
          beginAtZero: true
        }
      }
    }
  });
  
</script>

<script>console.log('olá beko')</script>
@endsection
<!--TESTEGRAFICO-->


@section('content_profile_user')

<div class="container">


  <div class="content-wrapper">
      <section class="content-header">
          <div class="container-fluid">

              <div class="row mb-2">
                  <div class="col-sm-6">
                  <h1 class="m-0">Bem-vindo! {{ auth()->user()->name}}</h1>

                  <div class="alert alert-info alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-info"></i> MURAL DE AVISOS!</h5>
                        Não há mensagens no mural de avisos.
                 </div>

                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item active"><a href="/public/admin/dashboard">Dashboard</a></li>
                          <li class="breadcrumb-item active">Profile</li>
                      </ol>
                  </div>
              </div>
          </div>
      </section>

      <section class="content-header">
          <div class="container-fluid">
              <div class="row">

                  <div class="col-md-3">
                      <div class="card card-primary card-outline">
                          <div class="card-body box-profile">
                              <div class="text-center">
                                  @if (Session::get('lg_foto'))
                                  <img class="profile-user-img img-fluid img-circle" src="{{asset('img/usuarios')}}/{{ Session::get('lg_nome_foto') }}" style="width: 100%">
                                  @else
                                  <img class="profile-user-img img-fluid img-circle" src="https://nagumo.marketingonline.click/public/vendor/img/desenho_nagumo.png" style="width: 100%">
                                  @endif
                              </div>
                              <h3 class="profile-username text-center">Ola! {{ auth()->user()->name}}</h3>
                              <p class="text-muted text-center"></p>
                          </div>
                      </div>
                  </div>


                  <div class="col-md-9">
                      <div class="card">

                          <div class="card-header p-2">
                              <ul class="nav nav-pills">
                                  <li class="nav-item">
                                    <!-- icone de notificao -->
                                    <a class="nav-link" href="#notificacao" data-toggle="tab">Notificações &nbsp 
                                        <span class="float-right badge bg-success">
                                            <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">1</font>
                                            </font>
                                        </span>
                                    </a>
                                  </li>

                                  <li class="nav-item"><a class="nav-link" href="#dados" data-toggle="tab">Meus dados</a></li>
                                  <li class="nav-item"><a class="nav-link" href="#login" data-toggle="tab">Meu login</a></li>
                                  
                              </ul>
                          </div>

                          <div class="card-body">
                              <div class="tab-content">
                                  <div class="tab-pane" id="dados">
                                      <form class="form-horizontal" action="/paneladmin/p-usuarios-profile-salva-dados" method="POST">
                                          @csrf
                                          <div class="form-group row">
                                              <labe for="nome" class="col-sm-2 col-form-label" style="text-aligne: right;">Nome: </labe>
                                              <div class="col-sm-6">
                                                  <input type="text" required name="nome" id="nome" class="form-control" placeholder="Nome" value="{{ auth()->user()->name}}">
                                              </div>
                                          </div>
                                         
                                          <div class="form-group row">
                                              <labe for="email" class="col-sm-2 col-form-label" style="text-aligne: right;">Email: </labe>
                                              <div class="col-sm-4">
                                                  <input type="email" required name="email" id="email" class="form-control" placeholder="Email" value="{{ auth()->user()->email}}">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="offset-sm-2 col-sm-10">
                                                  <button type="submit" class="btn btn-success">Salvar</button>
                                              </div>
                                          </div>
                                      </form>
                                  </div>
                                  
                                  <div class="tab-pane" id="login">
                                      <form class="form-horizontal" action="/paneladmin/p-usuarios-profile-salva-senha" method="POST">
                                          @csrf
                                          <div class="form-group row">
                                              <labe for="nmusuario" class="col-sm-2 col-form-label" style="text-aligne: right;">Usuário: </labe>
                                              <div class="col-sm-6">
                                                  <input type="text" required name="nmusuario" id="nmusuario" class="form-control" placeholder="Nome" value="">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <labe for="passatual" class="col-sm-2 col-form-label" style="text-aligne: right;">Senha Atual: </labe>
                                              <div class="col-sm-4">
                                                  <input type="password" required name="passatual" id="passatual" class="form-control" value="">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <labe for="passnova" class="col-sm-2 col-form-label" style="text-aligne: right;">Nova Senha: </labe>
                                              <div class="col-sm-4">
                                                  <input type="password" required name="passnova" id="passnova" class="form-control" value="">
                                              </div>
                                          </div>
                                          <div class="form-group row">
                                              <div class="offset-sm-2 col-sm-10">
                                                  <button type="submit" class="btn btn-success">Salvar</button>
                                              </div>
                                          </div>
                                    </form>
                                  </div>
                                  <div class="tab-pane" id="notificacao">
                                      <div class="col-sm-12" style="text-align: center;">

                                      <!-- caixa de mensagens -->
                                        <div class="info-box">
                                            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>
                                            <div class="info-box-content">
                                            <span class="info-box-number"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Parabéns</font></font></span>
                                            <span class="info-box-text"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Queremos te desejar boas-vindas e fazer com que você se sinta bem em seu novo ambiente de trabalho. Estamos muito felizes por ter você aqui conosco!</font></font></span>
                                            </div>

                                        </div>
                                      </div>
                                  </div>

                              </div>
                          </div>

                      </div>
                  </div>



              </div>
          </div>
      </section>
  </div>
</div>
  @endsection
  