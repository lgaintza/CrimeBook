<?php 

/*
	Definición: guardaprueba.php es la parte de código que ayuda a pagina6.php a guardar la prueba junto con sus soluciones y sus pistas

	Podemos llegar a guardaprueba.php en alguno de estos casos: 
		--Pulsamos en el botón de guardar prueba en pagina6.php cuando es una prueba nueva (1)
		--Pulsamos en el botón de guardar prueba en pagina6.php cuando es una prueba para editar (2)
		--Pulsamos en el botón de añade pista en pagina6.php cuando es una prueba nueva (3)
		--Pulsamos en el botón de añade pista en pagina6.php cuando es una prueba para editar (4) 
		--Pulsamos en el botón de añade solución en pagina6.php cuando es una prueba nueva (5)
		--Pulsamos en el botón de añade Solución en pagina6.php cuando es una prueba para editar (6)
	Esta parte de la aplicación se encarga de guardar o editar una prueba añadiendo las soluciones o pistas dependiendo del caso en el que nos encontremos

*/
session_start();
require_once('include/BD.php');
require_once('include/Prueba.php');


if($_SESSION['accion']=="nueva")
{
	/*
	Defnición: Entramos en esta parte en el caso (1)
	Recogemos el objeto de prueba que nos llega por $_SESSION guardamos y volvemos a la página3 borrando las sesiones que no vamos a usar más
	*/
	
	guardaPrueba(); 
	unset($_SESSION['accion']);
	unset($_SESSION['pruebaParaGuardar']); 
	unset($_SESSION['pag3_to_6']); 
	unset($_SESSION['idTemporalPrueba']); 
	header("Location: pagina3.php"); 

	
}else if($_SESSION['accion']=="editar")
{
	/*
	Defnición: Entramos en esta parte en el caso (2)
	Recogemos el objeto de prueba que nos llega por $_SESSION editamos y volvemos a la página3 borrando las sesiones que no vamos a usar más
	*/
	editaPrueba(); 
	unset($_SESSION['accion']);
	unset($_SESSION['pruebaParaGuardar']); 
	unset($_SESSION['idTemporalPrueba']); 
	header("Location: pagina3.php");

}else if($_SESSION['accion']=="nuevaSolucion")
{
	
	/*
	Definición: Entramos en esta parte en el caso (5)
	Recogemos la prueba y el id de la prueba 
	Guardamos la prueba
	Indicamos que ahora esta prueba es para editar porque ya está guardada en la base de datos
	Volvemos a la pagina6
	*/
	$idPrueba= guardaPrueba(); 
	guardaSolucion($idPrueba); 
	//Indicamos que tenemos que entrar en la parte de editar prueba en la pagina6.php porque la prueba ya no es nueva
	//volvemos a la pagina6
	$_SESSION['idpru_3_to_6']=$idPrueba;  
	unset($_SESSION['pruebaParaGuardar']); 
	unset($_SESSION['accion']);
	unset($_SESSION['idTemporalPrueba']);
	unset($_SESSION['pag3_to_6']); 
	header("Location: pagina6.php"); 
	
}else if($_SESSION['accion']=="nuevaPista")
{

	/*
	Definición: Entramos en esta parte en el caso (3)
	Recogemos la prueba y el id de la prueba 
	Guardamos la prueba
	Indicamos que ahora esta prueba es para editar porque ya está guardada en la base de datos para que cuando volvamos de la pagina8 que sepa donde entrar
	Vamos a la pagina8.php 
	*/
	$idPrueba= guardaPrueba(); 
	$_SESSION['idTemporalPrueba']=$idPrueba; 
	$_SESSION['idpru_3_to_6']=$idPrueba; 
	unset($_SESSION['pruebaParaGuardar']);
	unset($_SESSION['accion']);
	unset($_SESSION['pag3_to_6']); 
	header("Location: pagina8.php"); 

	
}else if($_SESSION['accion']=="anadeSolucion")
{
	/*
	Definición: Entramos en esta parte en el caso (6)
	Recogemos la prueba
	Editamos la prueba
	Indicamos que ahora esta prueba es para editar porque ya está guardada en la base de datos para que cuando volvamos de la pagina8 que sepa donde entrar
	Vamos a la pagina8.php 
	*/
	$prueba = editaPrueba(); 
	guardaSolucion($prueba->getid()); 
	unset($_SESSION['pruebaParaGuardar']); 
	unset($_SESSION['accion']);
	unset($_SESSION['idTemporalPrueba']);
	$_SESSION['idpru_3_to_6']=$prueba->getid(); 
	header("Location: pagina6.php"); 
	//Guardamos la solución y volvemos a la pagina6 marcamos que será editando
	
}else if($_SESSION['accion']=="anadePista")
{
	/*
	Definición: Entramos en esta parte en el caso (4)
	Recogemos la prueba
	Editamos la prueba
	Indicamos que ahora esta prueba es para editar porque ya está guardada en la base de datos para que cuando volvamos de la pagina8 que sepa donde entrar
	Vamos a la pagina8.php 
	*/
	$prueba = editaPrueba(); 
	$_SESSION['idTemporalPrueba']=$prueba->getid(); //para ir a la pagina8 
	$_SESSION['idpru_3_to_6']=$prueba->getid(); // para ir a la pagina 6 
	unset($_SESSION['pruebaParaGuardar']); 
	unset($_SESSION['accion']);
	header("Location: pagina8.php"); 
	//Vamos a la pagina 8 directamente, marcamos que será editando 
}

function guardaPrueba()
{
	/*
	Definición: Función que se encarga de guardar la prueba que llega de pagina6.php cuando es nueva
	Entradas: 
		--$_SESSION['pruebaParaGuardar']= objeto de tipo Prueba con la información del formulario de pagina6.tpl que queremo guardar
	Salidas: 
		--$ultimaPrueba = El id de la prueba que acabamos de guardar para que podamos indicar a la pagina6.php que a la vuelta queremos visualizar esa prueba, recogiendo los datos dela base de datos
	*/
	$prueba=$_SESSION['pruebaParaGuardar'];
	$prueba= unserialize(serialize($prueba));
	$ultimaprueba=BD::recogeUltimaPrueba(); 
	$ultimaPrueba=$ultimaprueba+1;
	$prueba->cargaId($ultimaPrueba);
	$resultado = BD::insertarPrueba($prueba);
	return $ultimaPrueba; 
}

function editaPrueba()
{
	/*
	Definición: Función que se encarga de editar una prueba
	Entradas: 
		--$_SESSION['pruebaParaGuardar']= objeto de tipo Prueba con la información del formulario de pagina6.tpl que queremos guardar 
	Salidas: 
		--$prueba = objeto de tipo Prueba con la información de la prueba que acabamos de editar 
	*/
	$prueba=$_SESSION['pruebaParaGuardar'];
	$prueba= unserialize(serialize($prueba));
	$respuesta = BD::actualizaPrueba($prueba);
	return $prueba; 
}

function guardaSolucion($idPrueba)
{
	/*
	Definición: Función que se encarga de guardar una solución asocidaa a una prueba
	Entradas: 
		--$_SESSION['anadirsolucion']= Texto de la solución del formulario de la pagina6.tpl  
	Salidas: 
		
	*/
	$solucion=$_SESSION['anadirsolucion'];
	$ultimaRespuesta= BD::recogeUltimaRespuesta(); //Ahora guardamos las respuestas para el juego, recogemos el ultimo id y le sumamos 1 para guardarlo en la base de datos
	$ultimaRespuesta++; 
	BD::insertaRespuesta($idPrueba, $ultimaRespuesta, $solucion);

}

?>