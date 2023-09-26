<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link href="https://static.sitemercado.com.br/cdn/nagumo/favicon.ico" rel="shortcut icon" type="image/x-icon">
  <title> @yield('title')</title>

  <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/adminlte/dist/css/adminlte.min.css">
  
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

<!--implementeçao de ajax jquery-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.0-alpha1/css/bootstrap.min.css">
       
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  <!--Fim implementeçao de ajax jquery-->


   <!-- serviço worker -->
  <script>
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', () => {
            navigator.serviceWorker.register('/public/service-worker.js')
                .then(registration => {
                    console.log('Service Worker registrado com sucesso:', registration);
                })
                .catch(error => {
                    console.log('Falha ao registrar o Service Worker:', error);
                });
        });
    }
</script>

</head>



<body class="antialiased" style="background-image: url('');
               " >


<!--Aqui sera colocado conteudo de cada section extend-->

<!--cabeçalho de login-->
@if (Route::has('login'))
                <div class="sm:fixed sm:top-0 sm:right-0 p-6 text-right z-10">
                    @auth
                        <a href="{{ url('/home') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Inicio</a>
                    @else
                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Cadastra-se</a>
                        @endif
                    @endauth
                </div>
 @endif
 <!-- fim cabeçalho de login-->

 
<!-- img badge frutas-->
            <div class="bg-image" 
                >
            </div>
            
      <nav class="navbar bg-body-tertiary center">

              <!-- Logo-->
            <div class="container center" style="margin: 0 auto; width: 100%;">
              <a class="navbar-brand center" href="/public">
              <img src="https://nagumo.marketingonline.click/public/vendor/img/logo_nagumo.png" alt="Bootstrap" width="70" height="70">
              </a>
            </div>
		  </nav>
        <!--conteudo de frm perfile-->
        @yield('content')

        <!--conteudo de filtrarfutas-->
        @yield('filtrarfutas')

       <!--conteudo de filtrarLegumes-->
       @yield('filtrarlegumes')

       <!--conteudo de filtrarVeduras-->
       @yield('filtrarverdura')


        <script src="https://nagumo.marketingonline.click/public/vendor/jquery/jquery.min.js"></script>
        <script src="https://nagumo.marketingonline.click/public/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="https://nagumo.marketingonline.click/public/vendor/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
        <script src="https://nagumo.marketingonline.click/public/vendor/adminlte/dist/js/adminlte.min.js"></script>
    
        <!-- <script src="https://nagumo.marketingonline.click/public/vendor/js/js_custom.js"></script>
         -->
</body>
<!--Criei margem falso pra da espaço com rodapé-->
<div class="mx-auto"style="height: 200px;"></div>
	<!--Footer--> 
	
	<footer class="bg-dark text-light">
		<div class="container">
		
		  
		  <div class="text-justify alert alert-ligh"  role="alert">
			
			<a href="{{asset('/lista-todos-produtos')}}" class="badge badge-info" style="text-decoration:none;">Lista todos Produtos</a><br>
			<a href="{{asset('/filtrar-frutas')}}" class="badge badge-info" style="text-decoration:none;">Filtra só Frutas</a>
      <a href="{{asset('/filtrar-verduras')}}" class="badge badge-info" style="text-decoration:none;">Filtra só Verduras</a><br>
			<a href="{{asset('/filtrar-legumes')}}" class="badge badge-info" style="text-decoration:none;">Filtra só Legumes</a>
      <a href="{{asset('/filtrar-granel')}}" class="badge badge-info" style="text-decoration:none;">Filtra só Granel</a><hr>
      <a href="https://teste.promocaoonline.club/teste-promo/cadastro_frutas.html" class="badge badge-primary" style="text-decoration:none;">Cadastro novo Produto</a><br><hr>
			
			<p>
				Procurar informações sobre código
				 de frutas e legumes, referente  balança <span class="badge badge-pill badge-success">Hortifruti Supermercado Nagumo.</span>
				
			</p>
			
		<hr>
		</div>
		<div class="text-center" style="background-color: #333; padding: 20px;" >
    <i class="fab fa-twitter "></i>Email: cherifbekopanda@gmail.com</li>
		  &copy 2023 Copyright: <a href="#">by Sherif Panda</a>
		</div>
	  </footer>

</html>
