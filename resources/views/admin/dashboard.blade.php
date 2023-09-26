
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
        labels: ['Frutas: {{$totalRegistrosfutas}}', 'Legumes: {{$totalRegistroslegumes}}',
         'Granel: {{$totalRegistrosgranel}}', 'Temperos: ', 'Verduras:{{$totalRegistrosverdura}}' ],
      datasets: [{
        label: '# of Votes',
        data: [{{$totalRegistrosfutas}}, {{$totalRegistroslegumes}}, {{$totalRegistrosgranel}}, 5, {{$totalRegistrosverdura}}],
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


@section('content_dashboard')

<div class="container">




  <div class="content-wrapper">
    <section class="content-header">
    <div class="container-fluid">
    
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
     
          <!--TESTEGRAFICO-->
          <div class="chartjs-size-monitor">
              <div class="chartjs-size-monitor-expand">
                  <div class="">
                      <h1>GRAFICO</h1>
                      <canvas id="myChart"></canvas>
                  </div>
              </div>
              <div class="chartjs-size-monitor-shrink">
                  <div class="">

                  </div>
              </div>
              
          </div>

           <!-- badget registros users -->
      <div class="small-box bg-warning">
      <div class="inner">
      <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$usuarios}}</font></font></h3>
      <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registros de usuários cadastrado</font></font></p>
      </div>
      <div class="icon">
      <i class="ion ion-person-add"></i>
      </div>
      <a href="/public/admin/usuarios" class="small-box-footer"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Mais informações</font></font><i class="fas fa-arrow-circle-right"></i></a>
      </div>
      <!-- badget registros users -->


        <!-- badget registros propdts -->
        <div class="small-box bg-primary">
        <div class="inner">
        <h3><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">{{$produtos}}</font></font></h3>
        <p><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Registros Produtos cadastrado</font></font></p>
        </div>
        <div class="icon">
        <i class="fas fa-shopping-cart"></i>
        </div>
        <a href="/public/admin/frm-lista-produto" class="small-box-footer"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">
        Mais informações</font></font><i class="fas fa-arrow-circle-right"></i>
        </a>
        </div>
        <!-- FIM badget registros propdts -->

      
  </div>
</div>
  @endsection
  