<?php
if(isset($_POST["confirmado"])){
	require_once("../daos/editarDao.php");
	
	$deletarConect = new EditarConect();
	
	$stmtDeletar = $deletarConect->runQuery("DELETE FROM filiais WHERE idFilial = ".$_POST['id'].";");
	$stmtDeletar->execute();
	header('Location:../index.php');
}
else{	
	require_once("../daos/editarDao.php");

	$inicioConect = new EditarConect();

	$stmtFilial = $inicioConect->runQuery("SELECT *FROM filiais where idFilial = ".$_GET['id'].";");
	$stmtFilial->execute();
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Apagar Filial - Mondi Pizza</title>

		<!-- Locais -->
		<link href="../fremeworks/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../fremeworks/bootstrap-4.4.1/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<link rel="stylesheet" href="../plugins/css/font-awesome-4.7.0/css/font-awesome.min.css">
		<style>									
			label{
				font-size:18px;
			}
			
			form{
				width: 450px;
				heigth: 400px;
				margin: 10 0 0 40;
				padding: 0px 0px 50px 0px;
			}
			
			.texto{
				width: 374px;
				heigth: 200px;
				margin: auto;
				cursor: default;
			}
				
			button{
				width: 185px;
				heigth: 185px;
			}
			
		</style>
	</head>
	<body>
		<h5 style="padding: 0px 0px 0px 40px;">Deseja excluir os dados da seguinte filial?</h5>
		<h5  style="color:red;padding: 0px 0px 0px 40px;font-size:28px;">ESSA AÇÃO É PERMANENTE!</h5>
		<form action='' method=post>
		<?php
			while ($rowFilial = $stmtFilial->fetch(PDO::FETCH_ASSOC)) {
				echo"
						<label><b>Local:</b></label>
						<br>
						<input type='text' class='texto' value='".$rowFilial['localFilial']."' readonly>
						<br>
						<label><b>Telefone Fixo:</b></label>
						<br>
						<input type=text class=texto value='".$rowFilial['telefoneFilial']."' readonly>
						<br>";
			echo"		<label><b>Whatsapp Filial:</b></label>
						<br>
						<input type=text class=texto value='".$rowFilial['whatsappFilial']."'readonly>
						<input type=hidden value=".$rowFilial['idFilial']." name=id>";
			}
		?>
		<button type="button" onclick="document.location = '../index.php'">Cancelar Deleção</button>
		<button type="submit" name="confirmado">Confirmar Deleção</button>
		<br>
		</form>
			
	<body>
	
</html>

