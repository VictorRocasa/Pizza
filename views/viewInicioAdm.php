<?php
require './configs/header.php';
require './configs/menuAdm.php';

require_once("./daos/inicioDao.php");

$inicioConect = new InicioConect();

$stmtSobre = $inicioConect->runQuery("SELECT * FROM sobre");
$stmtSobre->execute();
$stmtCardapio = $inicioConect->runQuery("SELECT * FROM cardapio ORDER BY tipoCardapio DESC");
$stmtCardapio->execute();
$stmtFiliais = $inicioConect->runQuery("SELECT * FROM filiais ORDER BY localFilial");
$stmtFiliais->execute();
?>

<link rel="stylesheet" href="./plugins/css/inicio.css">

<script type="text/javascript" src="./plugins/js/inicio.js"></script>

<div id="sobre">

    <h5 id="Titulo">Atualizar sobre nós </h5> 

    <div id="sobreDesc">
		
        <?php
		while ($rowSobre = $stmtSobre->fetch(PDO::FETCH_ASSOC)) {

            echo '<textarea name = sobre autocomplete=off form=editarSobre rows = 16 cols = 220" required style=resize:none;>';
            echo $rowSobre['descricaoSobre'];
            echo '</textarea>';
        }
        ?>
		<form method=post id="editarSobre" action="./controllers/atualizarSobreController.php">
			<button type="button" onclick="document.location = 'index.php'">Cancelar Mudanças</button>
			<input type="submit" value="Salvar Mudanças">
		</form>
    </div>
</div>

<div id="cardapio">
    <h5 id="Titulo">Atualizar cardápio </h5>

	<table style="width:70%">
	  <tr style="border: 1px solid black;border-collapse: collapse;">
		<th>Sabor</th>
		<th>Ingredientes</th>
		<th>Tamanhos</th>	
		<th>Imagem</th>
		<th>Tipo</th>				
		<th>Editar</th>	
		<th>Apagar</th>	
	  </tr>
	  <?php
	        while ($rowCardapio = $stmtCardapio->fetch(PDO::FETCH_ASSOC)) {
				if($rowCardapio['imagemCardapio'] == ''){
					$rowCardapio['imagemCardapio'] = "SEM IMAGEM";
				}
				echo "	  <tr>
							<td>".$rowCardapio['nomeCardapio']."</td>
							<td>".$rowCardapio['ingredientesCardapio']."</td>
							<td>".$rowCardapio['tamanhoCardapio']."</td>
							<td>".$rowCardapio['imagemCardapio']."</td>
							<td>".$rowCardapio['tipoCardapio']."</td>
							<td><a href=./views/viewEditarCardapio.php?id=".$rowCardapio['idCardapio'].">Editar Informações</a></td>
							<td><a href=./controllers/deletarCardapioController.php?id=".$rowCardapio['idCardapio'].">Apagar Informações</a></td>
						  </tr>
					";
			}
	  ?>
	</table>
	<br>
	
	<h5 id="Titulo" onclick="document.location = './views/viewAdicionarCardapio.php'" style = "cursor: pointer;">Adicionar Pizzas ao Cardápio<h5>
</div>

<div id="comoComprar">

    <h5 id="Titulo">Atualizar como comprar? </h5>
	
	<table style="width:70%">
	  <tr style="border: 1px solid black;border-collapse: collapse;">
		<th>Local da Filial</th>
		<th>Telefone da Filial</th>
		<th>Whatsapp da Filial</th>	
		<th>Editar</th>	
		<th>Apagar</th>	
	  </tr>
	  <?php
	        while ($rowFiliais = $stmtFiliais->fetch(PDO::FETCH_ASSOC)) {
				echo "	  <tr>
							<td>".$rowFiliais['localFilial']."</td>
							<td>".$rowFiliais['telefoneFilial']."</td>
							<td>".$rowFiliais['whatsappFilial']."</td>
							<td><a href=./views/viewEditarFilial.php?id=".$rowFiliais['idFilial'].">Editar Informações</a></td>
							<td><a href=./controllers/deletarFilialController.php?id=".$rowFiliais['idFilial'].">Apagar Informações</a></td>
						  </tr>
					";
			}
	  ?>      
	</table>
	<br>
	
	<h5 id="Titulo" onclick="document.location = './views/viewAdicionarFilial.php'" style = "cursor: pointer;">Adicionar Novas Filiais<h5>
</div>

<?php

require './configs/footer.php';

?>	
	