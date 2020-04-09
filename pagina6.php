<?php 

/*
	Autor: Yolanda Guerge
	Definición: pagina6.php es una parte de la aplicación para crear las pruebas de los juegos junto con las soluciones y pistas que contiene dicha prueba. 
	Podemos llegar a la pagina6.php desde: 
		--Menú principal
		--pagina3.php 
		--volver de pagina8.php 
*/


require_once('include/BD.php');
require_once('include/Prueba.php');
require_once('include/libs/Smarty.class.php');

session_start();
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';


 
if(isset($_SESSION['idpru_3_to_6']))
{
	/*
	Definición: Entramos en este punto cuando queremos mostrar en la pagina6.tpl una prueba ya creada anteriormente con sus pistas y sus soluciones si las tuviese
	//Podemos llegar a este punto de estas maneras: 
		--Si pulsamos en el botón editar prueba en la pagina3.php 
		--Si añadimos una solución o pista en una prueba nueva, cuando en el guardaprueba.php se guarde la prueba nueva*, volveremos del guardaprueba.php a la pagina6.php siempre con una prueba ya guardad en la base de datos por lo que tiene que entrar en la parte de editar no en la parte de nueva. 

	Esta parte del código solo se encarga de recoger el identificador de la prueba que queremos pintar en la pagina6.tpl, recogemos sus pistas y soluciones y las pintamos.

	Notas*: 
		--prueba nueva*: en el guardaprueba.php hay varias formas de guardar una prueba nueva, mirar el guardaprueba.php para entender que hace. 
	*/
	
	unset($_SESSION['pag3_to_6']); 
	unset($_SESSION['idTemporalPrueba']);
	$hayNuevaPrueba=0; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$pruebaRecibida=$_SESSION['idpru_3_to_6']; 
	$_SESSION['pruebaRecibida']=$pruebaRecibida; //el funcionamiento de nuestra pagina 
	$_SESSION['idTemporalPrueba']=$pruebaRecibida;  //Esta Sesion es para la pagina 8 y que no tenga que hacer distinciones de si es nueva prueba o editar prueba
	unset($_SESSION['idpru_3_to_6']); 
	$_SESSION['accion']="editar";
	
	$prueba=BD::obtenerPrueba($pruebaRecibida);
	$listaSoluciones= BD::listadoRespuestas($prueba->getid());
	if(isset($listaSoluciones))
	{
		$_SESSION['listaSoluciones']=$listaSoluciones; //guardamos la lista de las soluciones para que concuerde con lo que hemos puesto en el botón de añadir solución
	} 
	$smarty->assign('prueba',$prueba);
	$smarty->assign('respuestas',$listaSoluciones);
	$listaPistas=BD::listadoPistasPrueba($pruebaRecibida);
	$smarty->assign('listaPistas',$listaPistas);
	if(isset($listaPistas[0]))
	{
		$smarty->assign('hayPistas',1);
	}else
	{
		$smarty->assign('hayPistas',0);
	}

}
else if((isset($_SESSION['pag3_to_6']))||(isset($_GET['variable'])))
{
	/*
	Definición: Entramos en este punto cuando queremos crear una prueba nueva. 
	Podemos llegar aquí de una de las siguientes maneras: 
		--Cuando pulsemos en el botón de crear una prueba en la pagina3.php 
		--Cuando pulsemos crear Prueba en el menú principal superior

	Esta parte del código solo muestra un formulario vacío en pagina6.tpl para que el usuario rellene los datos, añada soluciones y pistas y guarde la prueba. 
	*/
	
	$ultimaprueba=BD::recogeUltimaPrueba(); 
	$ultimaprueba++; 
	$_SESSION['idTemporalPrueba']=$ultimaprueba; 
	$hayNuevaPrueba=1; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	unset($_SESSION['pag3_to_6']); 
	unset($_SESSION['pruebaParaGuardar']);
	$_SESSION['accion']="nueva";
	$hayNuevaPrueba=1; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);

}else if(isset($_POST['anadir']))
{
	/*
	Definición: Entramos aquí cuando pulsamos en el botón añadir solución
	Guardamos los datos del formulario de la prueba en un objeto de tipo Prueba para pasarlo a guardaprueba.php. 
	Guardamos la solución que nos llega del formulario en una variable de sesión para pasarla a guardaprueba.php 
	Le indicamos al guardaprueba.php si estamos añadiendo una solición en una prueba no guardada anteriormente o en una prueba ya guardada 
	*/

	//Guardamos el objeto de tipo prueba y la solución del formulario
	$prueba=preparaPrueba(); 
	$_SESSION['pruebaParaGuardar']=$prueba;  
	$_SESSION['anadirsolucion']=$_POST['anadirsolucion']; 

	//Le indicamos al guardaprueba.php si es una prueba nueva o no 
	if($_SESSION['accion']=="nueva")
	{
		
		$_SESSION['accion']="nuevaSolucion";
		$_SESSION['pruebaParaGuardar']= $prueba; 
		header("Location: guardaprueba.php"); 

	}else
	{
		
		$_SESSION['accion']="anadeSolucion";
		$_SESSION['pruebaParaGuardar']= $prueba; 
		header("Location: guardaprueba.php"); 
	}
}else if(isset($_POST['anadePista']))
{
	/*
	Definición: Entramos aquí si pulsamos el botón de añade pista 
	Guardamos los datos del formulario en un objeto de tipo prueba y lo pasamos al guardaprueba.php para que lo guarde
	Le tenemos que indicar si es una prueba nueva o una prueba ya creada para editar
	*/
	
	//Creamos el objeto prueba y lo guardamos en una variable de sesión
	$prueba=preparaPrueba(); 
	$_SESSION['pruebaParaGuardar']=$prueba;

	//Le indicamos si es una prueba nueva o editar
	if($_SESSION['accion']=="nueva")
	{
		
		$_SESSION['accion']="nuevaPista";
		$_SESSION['pruebaParaGuardar']= $prueba; 
		header("Location: guardaprueba.php"); 

	}else
	{
		
		$_SESSION['accion']="anadePista";
		$_SESSION['pruebaParaGuardar']= $prueba; 
		header("Location: guardaprueba.php"); 
	}

}else if(isset($_POST['guardarPrueba']))
{
	/*
	Definición: Entramos en este caso cuando pulsamos en el botón de guardar la prueba
	Guardamos la prueba en una variable de sesión para pasarla al guardaprueba.php 
	*/

	$prueba=preparaPrueba(); 
	$_SESSION['pruebaParaGuardar']= $prueba; 
	header("Location: guardaprueba.php"); 
}else if(isset($_POST['cancelar']))
{
	/*
	Definición: Entramos en este caso cuando pulsamos el botón de cancelar. 
	Hay que borrar todas las variables de sesión que usamos en esta página para que no se queden perdidas
	Cuando las borramos volvemos a la página3.php 
	*/

	//Borramos las sesiones
	unset($_SESSION['accion']); 
	unset($_SESSION['pruebaParaGuardar']); 
	unset($_SESSION['pag3_to_6']);
	unset($_SESSION['idpru_3_to_6']);
	unset($_SESSION['idTemporalPrueba']);
	//Volvemos a la página3.php 
	header("Location: pagina3.php"); 
}else if(isset($_POST['delPista']))
{
	//Caso en el que pulsamos el botón de borrar las pistas 
	/*
	Definición: Entramos en este caso cuando pulsamos el botón de borrar pista
		El objetivo de la función es identificar las pistas que hemos seleccionado en el pagina6.tpl que queremos borrar y eliminarlas del registro de la base de datos.

		Para identificar que pistas queremos borrar usaremos un foreach para recorrer todas las pistas que tiene la prueba guardadas en la base de datos y preguntaremos si existe el $_POST que nos llega de la pagina6.tpl 

		El $_POST del pagina6.tpl nos llega con este formato -> $_POST["del".clacveDeLaPista]. 

		una vez que las hemos borrado cogemos de nuevo las pistas de la base de datos para pintar solo las que nos hemos quedado

		También tenemos que recoger las soluciones de la prueba para volver a pintarlas. 
		Si estamos en borrar pista, la prueba siempre será una ya creada, una prueba nueva no tiene pistas. 

	*/

	$prueba = preparaPrueba(); 
	$listaPistas = BD::listadoPistas(); 
	//identificar las pistas que queremos borrar
	foreach ($listaPistas as $pista ) {
		$clave="del".$pista->getid(); 
		 
		if(isset($_POST[$clave]))
		{
			$respuesta = BD::eliminarPistas($prueba->getid(), $pista->getid()); 

		}
	}
	$hayNuevaPrueba=1; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$listaPistas=BD::listadoPistasPrueba($prueba->getid());
	$hayNuevaPrueba=1; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	//Coger las pistas con las que nos hemos quedado para pintarlas
	$listaPistas=BD::listadoPistasPrueba($prueba->getid());
	if(isset($listaPistas[0]))
	{
		$smarty->assign('hayPistas',1);
	}else
	{
		$smarty->assign('hayPistas',0);
	}
	$smarty->assign('listaPistas',$listaPistas);
	//Recogemos las soluciones de la prueba para pintarlas 
	$listaSoluciones= BD::listadoRespuestas($_SESSION['pruebaRecibida']);
	$smarty->assign('respuestas',$listaSoluciones);
	$hayNuevaPrueba=0; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$smarty->assign('prueba',$prueba);



}

function preparaPrueba()
{

	/*
	Definición: Función que crea a partir de las entradas construye un objeto de tipo prueba

	Entradas: 
		--$_SESSION['pruebaRecibida'] -> El id de la prueba en el caso de editar 
		--$_POST['nombre'] -> El nombre de la prueba del formulario de pagina6.tpl 
		--$_POST['url'] -> la url de la prueba del formulario de pagina6.tpl 
		--$_POST['descBreve'] -> La descripción breve de la prueba del formulario pagina6.tpl 
		--$_POST['tipo'] -> El tipo de la prueba el formulario de pagina6.tpl 
		--$_POST['ayudaFinal'] -> La ayuda final del formulari ode pagina6.tpl 
		--$_SESSION['usuario'] -> El usuario con el que nos hemos logueado en la aplicación 

	Salidas: 
		--$prueba: Objeto de tipo prueba con los datos de entrad que hemos recibido
	
	*/
	if(isset($_SESSION['pruebaRecibida']))
	{
		$row['id']=$_SESSION['pruebaRecibida']; 
	}
	$row['nombre']=$_POST['nombre']; 
	$row['url']=$_POST['url'];
	$row['descBreve']=$_POST['descripcionbreve'];
	$row['descExtendida']=$_POST['descripcionextendida'];
	$row['tipo']=$_POST['tipo'];
	$row['ayudaFinal']=$_POST['ayudaFinal'];
	$row['username']=$_SESSION['usuario'];
	$prueba=new Prueba($row); 
	return $prueba; 
}

/*Cuando terminemos de identificar lo que queremos pintar en la pantalla lo pintamos

	--Si es una nueva prueba
	--Si editamos una prueba
*/
$smarty->display('pagina6.tpl'); 

?>