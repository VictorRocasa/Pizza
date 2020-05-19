<?php
$resultado = 1;//Variável para indicar o sucesso do login
if(isset($_POST["logado"])){
	require_once("../daos/loginDao.php");
	
	$loginConect = new admConect();

	$stmtLogin = $loginConect->runQuery("SELECT * FROM usuarios");
	$stmtLogin->execute();
	
	while ($rowLogin = $stmtLogin->fetch(PDO::FETCH_ASSOC)) {
		
		if($rowLogin['identificadorUsuario'] == $_POST["usuario"]){
			if($rowLogin['senhaUsuario'] == $_POST["senha"]){
				session_start();
				$_SESSION["adm_session"]=1;
				header('Location:../index.php');
			}
		}
	}
	$resultado = 0;//Caso nãoo aconteca login
}
?>

<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<title>Login - Mondi Pizza</title>

		<!-- Locais -->
		<link href="../fremeworks/bootstrap-4.4.1/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="../fremeworks/bootstrap-4.4.1/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">
		<link rel="stylesheet" href="../plugins/css/font-awesome-4.7.0/css/font-awesome.min.css">
		<style>		
			h2{
				font-size:30px;
				padding: 0px 0px 0px 220px;
				color: #e3951d;
			}	
			
			h3{
				font-size:15px;
				color: red;
			}
			
			#login{
				width: 900px;
				heigth: 800px;
				margin: auto;
				background: #c0c0c0;
			}
						
			label{
				font-size:18px;
				text-align: rigth;
			}
			
			form{
				width: 450px;
				heigth: 400px;
				margin: auto;
				padding: 0px 0px 50px 0px;
			}
			
			.textologin{
				width: 374px;
				heigth: 200px;
				margin:auto;
			}
				
			button{
				width: 185px;
				heigth: 185px;
			}
			
		</style>
	</head>
	
	<body>
		<div id = login>
		<br>
			<h2>Administração - Mondi Pizza</h2>
			<form action="" method="post">
				<label><b>Usuário:</b></label>
				<br>
				<input type="text" class="textologin" placeholder="Nome de Usuário" name="usuario" required>
				<br>
				<label><b>Senha:</b></label>
				<br>
				<input type="password" class="textologin" placeholder="Senha" name="senha" required>
				<br>
				<button type="button" onclick="document.location = '../index.php'">Cancelar</button>
				<button type="submit" name="logado">Entrar</button>
				<br>
				<?php
				if($resultado == 0){
					echo "<h3> Informações invalidas, tente novamente!</h3>";
				}
				else{
					echo "<h3><br><h3>";
				}
				?>
			</form>
		</div>
	</body>
</html>