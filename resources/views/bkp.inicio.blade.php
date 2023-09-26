@extends('layouts.iniciolayout')



@section('title') {{'Nagumo - Inicio'}} @endsection

@section('content')
    
	
		<style>
			.navbar-brand {
   
    		margin-left: 37%;
		}
		</style>
		<!--css de img bd-->
		<style>
		.img200-200{
			width: 200px;
		}

	  </style> 
      
      <div class="container justify-content-center">
	  
                <form method="GET" id="form-pesquisa" action="{{ route('resultado-busca')}}">
					<div class="form-group">
						<!--title de busca-->
					<span class="badge badge-pill badge-success" style=" font-size: 15px;">Campo de Pesquisar:</span><br>
						
						<input type="text" class="form-control" name="name" id="name"
						 placeholder="Pesquisa o nome de produto">

						<!--Resultado de busca-->
						<div id="product_list"></div>

										
						<div class=text-right>
							<button type="submit" class="btn btn-info">Pesquisar</button>
					    </div>
						
				    </div>

				</form> 

		
	    
<!-- Ajax autocomplete-->			
<script>

	$(document).ready(function(){
		$("#name").on('keyup', function(){

			var value = $(this).val();
			$.ajax({
				url:"{{ route('buscar-produto') }}",
				type:"GET",
				data:{'name':value},
				success:function(data){
					$("#product_list").html(data);
				}
			});

		});
		$(document).on('click', 'li',function(){
			var value = $(this).text();
			$("#name").val(value);
			$("#product_list").html("");
			

		});
	});
	
	document.getElementById("form-pesquisa").onsubmit = function(event) {
    // Certifique-se de que o envio padrão ocorra, enviando o formulário para o servidor
    // Você pode remover esta linha se desejar impedir o envio padrão e enviar via AJAX
    // Isso fará com que a página seja recarregada após o envio do formulário
    return true;
  };

  // Função para limpar os campos após o envio do formulário
  function limparCampos() {
    document.getElementById("name").value = "";
   
  }

  // Associar a função de limpeza aos eventos de envio do formulário
  document.getElementById("form-pesquisa").addEventListener("submit", function(event) {
    // Aguarde um curto período para que o envio do formulário ocorra
    // antes de limpar os campos, evitando que os dados sejam enviados vazios
    setTimeout(limparCampos, 500);
  });

</script> 
          
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" ></script>
                
                
      
</div>
 @endsection

@section('css')
    <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/css/admin_custom.css">
@stop

