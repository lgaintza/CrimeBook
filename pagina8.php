<?php
require_once('include/BD.php');
require_once('include/Juego.php');
require_once('include/Partida.php');
require_once('include/Equipo.php');
require_once('include/Prueba.php');
require_once('include/Resolucion.php');
require_once('include/Pista.php');
require_once('include/libs/Smarty.class.php');

session_start();

$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';



if (isset($_SESSION['idTemporalPrueba'])){
  $smarty->assign('idPrueba', $_SESSION['idTemporalPrueba']);
  unset( $_SESSION['idTemporalPrueba']);

}
if (isset($_POST['guardar'])) {
    $idPrueba = $_POST['idPrueba'];
   
    $texto = $_POST['texto'];
     

    if($_POST['tiempo']==''){
      $tiempo = "NULL";

    }else{
    $tiempo = $_POST['tiempo'];

    }
    if($_POST['intentos']==''){
      $intentos = "NULL";

    }else{
          $intentos = $_POST['intentos'];

    }

    $row= array(); 
    $row['idPrueba']= $idPrueba;
    $row['id']=BD::obtieneMaxIdPistas();
    $row['texto']= $texto; 
    $row['tiempo']= $tiempo; 
    $row['intentos']=$intentos;

    $pista=new Pista($row);

 

BD::creaPista($pista);
header("location:pagina6.php");
}
      

if(isset($_POST['cancelar'])){
    header("location:pagina6.php");
}

// Mostramos la plantilla
$smarty->display('crearPista_pag8.tpl');
?>
