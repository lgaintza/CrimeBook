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


//la sesion por donde yo te paso la pista no es $_SESSION['pruebaRecibida'] aqui no recoges nada, es $_SESSION['idTemporalPrueba'], la tienes que recoger y ahi tienes el id de prueba.
//fijate si pones este codigo como te aparece arriba a la izquierda de la pantalla

/*if($_SESSION['idTemporalPrueba'])
{
    echo $_SESSION['idTemporalPrueba']; 
    if(isset($_SESSION['pruebaGuardadaParaVolver']))
    {
        echo "existe"; 
    }else
    {
        echo "no existe"; 
    }
    
}*/

if (isset($_SESSION['pruebaRecibida'])){
  $smarty->assign('idPrueba', $_SESSION['pruebaRecibida']);

}

if (isset($_POST['guardar'])) {
    $idPrueba = $_POST['idPrueba'];
    $id=$_POST['id'];
    $texto = $_POST['texto'];
    $tiempo = $_POST['tiempo'];
    $intentos = $_POST['intentos'];

    $row= array(); 
    $row['idPrueba']= $idPrueba; 
    $row['id']= $id; 
    $row['texto']= $texto; 
    $row['tiempo']= $tiempo; 
    $row['intentos']=$intentos;

    $pista=new Pista($row);
    var_dump($pista);
 

BD::creaPista($pista);
  //  header("Location: pagina6.php");
}
      

if(isset($_POST['volver'])){
    header("Location: pagina6.php");
}

// Mostramos la plantilla
$smarty->display('crearPista_pag8.tpl');
?>
