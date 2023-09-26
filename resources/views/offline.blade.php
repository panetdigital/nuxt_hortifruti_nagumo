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
      
      <div class="container d-flex justify-content-center align-items-center vh-10">
        <!-- A classe "vh-100" garante que o elemento ocupe 100% da altura da viewport -->
        <h1 class="text-center">Modo Offline</h1>
    </div>


      <div class="container mt-5">
        <div class="form-group" id="meuDiv">
            <label for="search">Buscar Nome da Fruta:</label>
            <input type="text" class="form-control" id="search" name="search">
        </div>
        <div id="results" class="mt-3"></div>
        <div id="fruit-details" class="mt-3"></div> <!-- Novo elemento para mostrar detalhes da fruta -->
    </div>

    <script>
        const searchInput = document.getElementById('search');
        const resultsDiv = document.getElementById('results');
        const fruitDetailsDiv = document.getElementById('fruit-details'); // Novo elemento

        searchInput.addEventListener('input', function() {
            const searchTerm = searchInput.value.toLowerCase();

            fetch('/public/frutas.json')
                .then(response => response.json())
                .then(frutas => {
                    const resultados = frutas.filter(fruta => fruta.nome.toLowerCase().includes(searchTerm));
                    showResults(resultados);
                });
        });

        function showResults(resultados) {
            resultsDiv.innerHTML = '';

            if (resultados.length === 0) {
                resultsDiv.innerHTML = '<p>Nenhum resultado encontrado.</p>';
                return;
            }

            const resultsList = document.createElement('ul');
            resultsList.classList.add('list-group');

            resultados.forEach(fruta => {
                const listItem = document.createElement('li');
                listItem.textContent = ` ${fruta.coditem} | ${fruta.nome}`;
                listItem.classList.add('list-group-item', 'list-group-item-action');

                listItem.addEventListener('click', function() {
                    displayFruitDetails(fruta); // Exibir detalhes da fruta ao clicar
                    resultsDiv.innerHTML = '';
                });
                resultsList.appendChild(listItem);
            });

            resultsDiv.appendChild(resultsList);
        }

        function displayFruitDetails(fruta) {
            fruitDetailsDiv.innerHTML = `
                <h2>Detalhes da Fruta</h2>
                <table class="table">
                    <tr>
                        <th>Código</th>
                        <th>Nome</th>
                        <th>Outro Atributo</th>
                        <!-- Adicione mais colunas conforme necessário -->
                    </tr>
                    <tr>
                        <td>${fruta.coditem}</td>
                        <td>${fruta.nome}</td>
                        <td>${fruta.outroAtributo}</td>
                        <!-- Preencha com os valores corretos -->
                    </tr>
                </table>
            `;
        }
    </script>
 @endsection

@section('css')
    <link rel="stylesheet" href="https://nagumo.marketingonline.click/public/vendor/css/admin_custom.css">
@stop

