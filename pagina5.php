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
	//Si es 0 significa que estamos editando el juego y por tanto nos entra en la primera parte del tpl 
	//Puedes poner el valor que quieras 
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
    //Como es el caso de editar no queremos que salgan todas las pruebas con checkbox si no solo las que no están
    $listaTodasPruebas=BD::listaPruebas(); 
    $listadoResta=array(); //aqui es donde vamos a guardar el listado de las pruebas que no tenemos añadidias

    //Lo hago con el for, porque quiero quitar un elemento de una posición concreta del array 
    //para ello necesito control sobre en que posición del array está el elemento que quiero quitar 
    //No lo hago con distinto, porque quiero quitar dle array aquel id de la lista de pruebas del juego que sea igual al id de la lista de pruebas total 

    for($x=0;$x<count($listaTodasPruebas);$x++)
    {
    	
    	for($i=0;$i<count($listadoPruebasJuego);$i++)
    	{
    		if(($listaTodasPruebas[$x]->getid())==($listadoPruebasJuego[$i]->getid()))
    		{
    			//Si son iguales lo queremos es quitarlo del array 
    			//para no fastidiar el bucle, apuntamos en que posiciones están las pruebas que no queremos mostrar en añadir para luego quitarlas de la lista
    			 $listadoResta[]=$x; 
    		}
    	}
    	
    }
    //Cuando terminamos de apuntar en que posición están las soluciones que no queremos pintar en añadir las quitamos de lal lista
    foreach ($listadoResta as $position ) 
	{
		unset($listaTodasPruebas[$position]); 
	}

   //Al final en la listaTodaasPruebas quedan solo la spruebas que no están en el juego 
    $smarty->assign('listapruebas', $listaTodasPruebas);
}else
{
	$hayNuevoJuego=1; 
	$smarty->assign('hayNuevoJuego',$hayNuevoJuego);
	$fechaCreacion= date("Y-m-d H:i:s");
	
	$smarty->assign('fechaCreacion',$fechaCreacion);
	$username=$_SESSION['usuario'];
	$smarty->assign('username',$username);
	$smarty->assign('listapruebas', BD::listaPruebas());
}


// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty

$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';



// Mostramos la plantilla
$smarty->display('pagina5.tpl');     
?>
