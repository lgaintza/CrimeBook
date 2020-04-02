<?php
require_once('include/BD.php');
 require_once('include/Juego.php');
   require_once('include/libs/Smarty.class.php');


// Recuperamos la información de la sesión
session_start();
//Si viene nuevo juego o editar tenemos que distinguir los casos 

$smarty = new Smarty;

//entiendo que todos los post que hay son id (que es el codigo de juego que me pasa) y no codigojuego 
if (isset($_SESSION['idJuego'])) {
	
	$juegoRecibido=$_SESSION['idJuego']; 
	$hayNuevoJuego=0; //hago una variable para que exista la variable en el template
	$smarty->assign('hayNuevoJuego',$hayNuevoJuego);
	$objetoJuego = BD::obtenerJuego($juegoRecibido['idJuego']); 
	$objetoJuego= $objetoJuego[0]; 
	//echo var_dump($objetoJuego); 
    $smarty->assign('juego', $objetoJuego);
    //echo $juegoRecibido['idJuego']; 
    $listadoPruebasJuego = BD::listadoPruebasJuego($juegoRecibido['idJuego']); 
    //echo var_dump($listadoPruebasJuego); 
    //echo $listadoPruebasJuego; 
    //$listadoPruebasJuego=$listaPruebasDeJuego[0]; //pk esto es un array de objetos y solo necesitamos el primero
    //echo $listadoPruebasJuego[0]->getnombre(); 
    $smarty->assign('listado',$listadoPruebasJuego); 
    //Cogemos las pruebas que ya hay en el juego 
    unset($_SESSION['idJuego']);
}else
{
	$hayNuevoJuego=1; 
	$smarty->assign('hayNuevoJuego',$hayNuevoJuego);
	$fechaCreacion= date("Y-m-d H:i:s");
	
	$smarty->assign('fechaCreacion',$fechaCreacion);
	$username=$_SESSION['usuario'];
	$smarty->assign('username',$username);
	
}


// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty

$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

$smarty->assign('listapruebas', BD::listaPruebas());

// Mostramos la plantilla
$smarty->display('pagina5.tpl');     
?>
