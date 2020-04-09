
<?php

/*
    Autor: Yolanda Guerge
    Definición: pagina5.php es una parte de la aplicación para crear los juegos  con las pruebas que tiene dicho juego 
    Podemos llegar a la pagina5.php desde: 
        --Menú principal
        --pagina1.php         
*/
require_once('include/BD.php');
require_once('include/Juego.php');
require_once('include/libs/Smarty.class.php');


// Recuperamos la información de la sesión
session_start();
//Si viene nuevo juego o editar tenemos que distinguir los casos 

$smarty = new Smarty;

/*
    Definición: Entramos en este punto cuando queremos mostrar en la pagina5.tpl un juego ya creadp anteriormente con sus pruebas si las tuviese y el listado de pruebas para poder ponerle
    //Podemos llegar a este punto de estas maneras: 
        --Si pulsamos en el botón editar juego en la pagina1.php 
        
    Esta parte del código  se encarga de recoger el identificador del juego que queremos pintar en la pagina5.tpl, recogemos sus pruebas y las pintamos.
    
    */
if (isset($_SESSION['idJuego'])) {
	
	$juegoRecibido=$_SESSION['idJuego']; 
	$hayNuevoJuego=0; //hago una variable para que exista la variable en el tpl
	//Si es 0 significa que estamos editando el juego y por tanto nos entra en la primera parte del tpl 
	
	$smarty->assign('hayNuevoJuego',$hayNuevoJuego);
	$objetoJuego = BD::obtenerJuego($juegoRecibido['idJuego']); 
	$objetoJuego= $objetoJuego[0]; 
	
    $smarty->assign('juego', $objetoJuego);
    
    $listadoPruebasJuego = BD::listadoPruebasJuego($juegoRecibido['idJuego']); 
    
    
    $smarty->assign('listado',$listadoPruebasJuego); 
    //Cogemos las pruebas que ya hay en el juego 
    unset($_SESSION['idJuego']);
    //Como es el caso de editar no queremos que salgan todas las pruebas con checkbox si no solo las que no están
    $listaTodasPruebas=BD::listaPruebas(); 
    $listadoResta=array(); //aqui es donde vamos a guardar el listado de las pruebas que no tenemos añadidias

    //Hacemos un for, porque quiero quitar un elemento de una posición concreta del array 
    //para ello necesito control sobre en que posición del array está el elemento que quiero quitar 
    //No lo hago con distinto, porque quiero quitar del array aquel id de la lista de pruebas del juego que sea igual al id de la lista de pruebas total 

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
/*
    Definición: Entramos en este punto cuando queremos crear un juego nuevo. 
    Podemos llegar aquí de una de las siguientes maneras: 
        --Cuando pulsemos en el botón de crear una prueba en la pagina1.php 
        --Cuando pulsemos crear Juego en el menú principal superior

    Esta parte del código solo muestra un formulario vacío en pagina5.tpl para que el usuario rellene los datos, añada pruebas ya creadas y guarde el juego. 
    */
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
