<?php
session_start();

if (isset($_SESSION['adm_session'])){

    //Inicio editavel - para administradores
    require './views/viewInicioAdm.php';
}
else{

    //Inicio para visualizacao - para usuarios comuns
    require './views/viewInicio.php';
}

?>