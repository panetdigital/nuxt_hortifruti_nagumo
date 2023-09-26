@extends('templates.template')
<!--title dinamico-->
@section('title') {{'Busca Produto'}} @endsection
@section('content')



<div class="container">


</div>
<!--Criei margem falso pra da espaço com rodapé-->
<div class="mx-auto"style="height: 200px;"></div>
	<!--Footer--> 
	
	<footer class="bg-dark text-light">
		<div class="container">
		
		  
		  <div class="text-justify alert alert-ligh"  role="alert">
			<a href="https://teste.promocaoonline.club/teste-promo/cadastro_frutas.html  ">Cadastro Produto</a><br>
			<a href="https://teste.promocaoonline.club/listar_produtos.php  ">Lista Produtos</a><br>
			<a href="https://teste.promocaoonline.club/lista_frutas.php  ">Filtra Frutas</a><br>
			<a href="https://teste.promocaoonline.club/lista_legumes.php  ">Filtra Legumes</a><br><hr><br>
			
			<p>
				Procurar informações sobre código
				 de frutas e legumes, referente  balança hortifruti Nagumo.
				
			</p>
			<ul class="nav">
			  <li class="nav-link"><i class="fab fa-twitter fa-3x"></i>Email: cherifbekopanda@gmail.com</li>
			  <li class="nav-link"><i class="fab fa-whatsapp fa-3x">whatsapp:(11)977778331</i></li>
			</ul>
		  </div>
		
		</div>
		<div class="text-center" style="background-color: #333; padding: 20px;" >
		  &copy 2023 Copyright: <a href="#">by Sherif Panda</a>
		</div>
	  </footer>
</div>
@endsection