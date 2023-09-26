<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JSON Database Search</title>
    <!-- Adicione os links para os estilos do Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1>Search Results</h1>
        <form class="mb-2 form-inline" action="/public/search" method="get">
    <input type="text" class="form-control" name="query" id="search-input" placeholder="Search by name" value="">
    <button type="submit" class="btn btn-primary mt-2">Search</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Obtenha o elemento de entrada e o formulário
    const inputElement = $('#search-input');
    const formElement = $('#myForm');

    // Inicialize a variável para rastrear se o usuário selecionou um item
    let userSelected = false;

    // Adicione um ouvinte de evento para o evento 'input' no campo de entrada
    inputElement.on('input', function () {
        // Redefina a variável quando o usuário começa a digitar novamente
        userSelected = false;

        // O restante do código permanece o mesmo
        clearTimeout(typingTimer);
        typingTimer = setTimeout(doneTyping, doneTypingInterval);
    });

    // Adicione um ouvinte de evento para o evento 'change' no campo de entrada
    inputElement.on('change', function () {
        if (userSelected) {
            // Envie o formulário automaticamente quando o usuário selecionar um item
            formElement.submit();
        }
    });

    // Adicione um ouvinte de evento para o evento 'click' nas sugestões de auto-completar
    inputElement.on('click', function () {
        // Defina a variável para rastrear a seleção do usuário
        userSelected = true;
    });

    // Resto do código permanece o mesmo
</script>
        <!-- <table class="table table-bordered">
            <thead>
                <tr>
                    <th>COD</th>
                    <th>CODITEM</th>
                    <th>NOME</th>
                </tr>
            </thead>
            <tbody>
                @forelse($data as $item)
                    <tr>
                        <td>{{ $item['cod'] }}</td>
                        <td>{{ $item['coditem'] }}</td>
                        <td>{{ $item['nome'] }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3">Resultado aparece aqui.</td>
                    </tr>
                @endforelse
            </tbody>
        </table> -->
    </div> 

<style>
   .ui-helper-hidden-accessible{display:none;},
 .ui-autocomplete{},

</style>
    <!-- <div class="container mt-5">
        <h1>Search Results</h1>
        <form class="mb-3" action="/search" method="get">
            <input type="text" class="form-control" id="search-input" name="query" placeholder="Search by name" value="{{ $query }}">
            <button type="submit" class="btn btn-primary mt-2">Search</button>
        </form>
       
    </div> -->
 
    <!-- Adicione os scripts para jQuery e jQuery UI -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
</body>
   <script>

        $(document).ready(function () {
            $('#search-input').autocomplete({
                source: function (request, response) {
                    $.get('/public/autocomplete', { query: request.term }, function (data) {
                        response(data);
                    });
                },
                minLength: 2, // Número mínimo de caracteres antes de começar a procurar
                delay: 300 // Atraso de 300ms após a digitação antes de iniciar a busca
            });
        });

</script>



</html>

