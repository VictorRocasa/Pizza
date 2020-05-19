<?php
	require_once("../daos/editarDao.php");
	
	$deletarConect = new EditarConect();
	
	$stmtDeletar = $deletarConect->runQuery("DELETE FROM filiais WHERE idFilial = ".$_GET['id'].";");
	$stmtDeletar->execute();
	header('Location:../index.php');
?>