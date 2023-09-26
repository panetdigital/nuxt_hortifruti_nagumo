<?php
$host = "localhost";
$user = "promoupd_wp344";
$pass = "p@3XS867i.";
$dbname = "promoupd_wp344";
$port = 3306;

try{
    //Conexão com a porta
    //$conn = new PDO("mysql:host=$host;port=$port;dbname=" . $dbname, $user, $pass);
    
    //Conexão sem a porta
    $conn = new PDO("mysql:host=$host;dbname=" . $dbname, $user, $pass);
    //echo "Conexão com banco de dados realizado com sucesso.";
}catch(PDOException $err){
    echo "Erro: Conexão com banco de dados não realizado com sucesso. Erro gerado " . $err->getMessage();
}

// titulo
//echo "<h4 class='row justify-content-center mt-3'>Resultado de busca</h4>";

//A query com "*" indica que deve trazer todas com as colunas

$frutas = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

//to recebendo pelo nome produto vem de url---------------------------------------
$nome_prdt = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
if(!empty($nome_prdt)){

	$pesq_usuarios = "%" . $nome_prdt . "%";

    $query_frutas= "SELECT cod, nome FROM frutas WHERE nome LIKE :nome LIMIT 3";
    $result_frutas = $conn->prepare($query_frutas);
    $result_frutas->bindParam(':nome', $pesq_usuarios);
    $result_frutas->execute();

	if(($result_frutas) and ($result_frutas->rowCount() != 0)){
        while($row_fruta = $result_frutas->fetch(PDO::FETCH_ASSOC)){
            $dados[] = [
                'cod' => $row_fruta['cod'],
                'nome' => $row_fruta['nome']
            ];
        }

        $retorna = ['erro' => false, 'dados' => $dados];
        //$retorna = ['erro' => true, 'msg' => "Erro: Nenhum usuário encontrado!"];
    }else{
        $retorna = ['erro'=> true, 'msg'=> "Erro nenhum produto selecionado"];
    }

	
}else{
	//$retorna = ['erro'=> true, 'msg'=> "Erro nenhum prdt encontrado2"];
}
echo json_encode($retorna);

//------------------------------------------------------------------------
 /* $query_frutas = "SELECT * FROM frutas WHERE nome LIKE '%$frutas%' LIMIT 3";
$result_frutas = $conn->prepare($query_frutas);
$result_frutas->execute();

//Verificar se encontrou resultado na tabela "frutas"
if($result_frutas->rowCount() > 0){

	?>
	<table class="table table-striped table-bordered table-hover">
		<thead>
			<tr>
				<th>Cod</th>
				<th>CodItem</th>
				<th>Nome</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$str = array();
			while($row_fruta = $result_frutas->fetch(PDO::FETCH_ASSOC)){
				$str = $row_fruta['nome'];
				?>

				<tr>
					<th><?php echo  $row_fruta['cod'] ; ?></th>
					<td onclick="mostrar(<?php echo  $row_fruta['coditem'] ; ?>)"><?php echo  $row_fruta['coditem'] ; ?></td>
					<td onclick="mostrar(<?php echo $str; ?>)"><?php echo  $row_fruta['nome'] ; ?></td>
					
				</tr>
				
				<?php
				$json_str = json_encode($str);
				var_dump($json_str);
			}?>
		</tbody>
		
	</table>
	<?php
		
	}else{

	//msg de erro!

				echo "<div class='alert alert-danger' role='alert'>Nenhum  frutas ou legumes!</div>";
	}

	// outro repticao para imprimir img, desc fora da tabela

	$frutas = filter_input(INPUT_POST, 'palavra', FILTER_SANITIZE_STRING);

	$query_frutas = "SELECT * FROM frutas WHERE nome LIKE '%$frutas%' LIMIT 3";
	$result_frutas = $conn->prepare($query_frutas);
	$result_frutas->execute();
	while($row_fruta = $result_frutas->fetch(PDO::FETCH_ASSOC)){
		
		    $imagem = $row_fruta['imagem'];
			echo "<br><hr> ";
			echo "<div class='row justify-content-center mt-3 '><img src='$imagem' class='img-fluid mb-3 d-block img200-200' alt='imagem'></div>"; 
		    echo "<hr>";
			echo "Descricao: ". $row_fruta['descricao'] . "<br>";
			echo "<hr> <br>";
	  }  */

?>
       
               
                
			
        