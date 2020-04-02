<?php 
session_start();
require_once('include/BD.php');
require_once('include/Prueba.php');
if(isset($_SESSION['pruebaParaGuardar'])) //Solo hacemos algo si  hemos llegado a esta página con un objeto de tipo prueba, si no no hacemos nada porque daría error
{
	//Si existe la prueba para guardar la guardamos en la base de datos junto a las respuestas y las pistas 
	//Tenemos que distinguir el caso de actualizar la prueba o de guardar una nueva
	$prueba=$_SESSION['pruebaParaGuardar'];  //recogemos el objeto de prueba
	$listaSoluciones=$_SESSION['listaSoluciones']; //recogemos las soluciones 
	unset($_SESSION['pruebaParaGuardar']); 
	unset($_SESSION['listaSoluciones']); //elimino las sesiones para que no se vuelva loco 
	$prueba= unserialize(serialize($prueba)); //recuperar el objeto de una sesión 
	//Si tenemos la variable de sesión de nueva, tenemos que guardar una nueva prueba
	if($_SESSION['accion']=="nueva")
	{
		unset($_SESSION['pruebaRecibida']); 
		unset($_SESSION['accion']); //siempre la pongo al inicio, porque si da fallo en mitad del código la variable se queda huerfana y puede dar errores más adelante
		$ultimaprueba=BD::recogeUltimaPrueba(); 
		$ultimaPrueba=$ultimaprueba+1;
		$prueba->cargaId($ultimaPrueba); //cogemos el id anterior y guardamos el id en ekl objeto de prueba para guardarlo
		$resultado = BD::insertarPrueba($prueba);
		//echo $resultado; 
		//Tenemos que intertar una respuesta por cada respuesta de la lista que tengamos
		$ultimaRespuesta= BD::recogeUltimaRespuesta(); //Ahora guardamos las respuestas para el juego, recogemos el ultimo id y le sumamos 1 para guardarlo en la base de datos
		$ultimaRespuesta++; 
		foreach ($listaSoluciones as $solucion) { //recorremos la lista de las soluciones que hemos traido del formulario
			//en este caso no necesitamos tener en cuenta cuales eran nuevas y viejas porque todas son nuevas
			//porque estamos en crear prueba
			BD::insertaRespuesta($ultimaPrueba, $solucion,$ultimaRespuesta); //insertamos la respuesta
			$ultimaRespuesta= BD::recogeUltimaRespuesta(); //volvemos a recoger el id de la ultima
			$ultimaRespuesta++; //sumamos uno mas 
		}
		header("Location: pagina3.php"); //volvemos pag 3 
		
	}else if($_SESSION['accion']=="editar") //Si no la editamos
	{
		unset($_SESSION['pruebaRecibida']); 
		unset($_SESSION['accion']);
		$solucionesNuevas=$_SESSION['listaSolucionesNuevas']; //Cogemos solo la soluciones nuevas
		unset($_SESSION['listaSolucionesNuevas']);
		$respuesta = BD::actualizaPrueba($prueba);
		echo $respuesta; 
		$ultimaRespuesta= BD::recogeUltimaRespuesta(); 
		$ultimaRespuesta++; 
		foreach ($solucionesNuevas as $solucion) {
			BD::insertaRespuesta($prueba->getid(), $solucion,$ultimaRespuesta);
			$ultimaRespuesta= BD::recogeUltimaRespuesta(); 
			$ultimaRespuesta++; 
		}
		header("Location: pagina3.php"); 
		
	}
	
}

?>