<?php
require_once('include/BD.php');
require_once('include/Prueba.php');
require_once('include/libs/Smarty.class.php');

session_start();
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

//TODO quedan las pistas 

//Si pulsamos en el botón de borrar pista


//Para crear una nueva prueba, la primera vez que entramos en la página
if(isset($_SESSION['pag3_to_6']))
{
	echo "entramos en la funcion1"; 
	//En este caso la prueba es nueva 
	//Podemos coger un id temporal para crear pistas 
	$ultimaprueba=BD::recogeUltimaPrueba(); 
	$ultimaprueba++; 
	$_SESSION['idTemporalPrueba']=$ultimaprueba; //Esta es la que pasamos a la pagina 8 
	//Si venimos del inicio no hay pistas porque es nueva
	//Indicamos que es nuan  ueva prueba y nos muestra la parte dle tpl vaacia 
	$hayNuevaPrueba=1; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	unset($_SESSION['pag3_to_6']); 
	//por si acaso quitamos estas sesiones para que no se vuelva loca la pagina
	//La primera vez que entramos no existe 
	//Pero si por alguna razón has vuelto cn las flechas del navegador a otra parte de la aplicación
	//Puede ocurrir que esas variables existan y no las queremos
	unset($_SESSION['listaSoluciones']); 
	unset($_SESSION['pruebaParaGuardar']);
	//Guardamos un estado para indicar que lo qu queríamos hacer inicialmente era crear una nueva
	//Porque vamos a compartir el tpl en editar y en crear 
	//el botón de guarda prueba es el mismo 
	//Entonces necesitamos indicarle al guarda prueba de alguna manera que queremos guardar una neuva
	$_SESSION['accion']="nueva";

}

//Si pulsamos el botón de añadir pista antes de ir a la página 8 
if(isset($_POST['anadePista']))
{
	echo "entramos en la funcion2"; 

	//Si pulsamos el botón de añadir pista tenemos que ir a la página 8 guardando todo lo que teníamos antes 
	$row['nombre']=$_POST['nombre']; 
	$row['url']=$_POST['url'];
	$row['descBreve']=$_POST['descripcionbreve'];
	$row['descExtendida']=$_POST['descripcionextendida'];
	$row['tipo']=$_POST['tipo'];
	$row['ayudaFinal']=$_POST['ayudaFinal'];
	$row['username']=$_SESSION['usuario'];
	$row['dificultad']=$_POST['dificultad']; 
	$row['tipo']= $_POST['tipo']; 
	$prueba=new Prueba($row); 
	//guardamos la prueba porque las respuestas ya están guardadas en una variable de sesión
	$_SESSION['pruebaGuardadaParaVolver']=$prueba; 

	header("Location: pagina8.php"); 

}


//Cuando volvemos de la página8 
if(isset($_SESSION['pruebaGuardadaParaVolver']))
{
	echo "entramos en la funcion3"; 

	//Si tenemos esta variable de sesión es que hemos vuelto de la página 8 y tenemos una nueva pista guardada
	$hayNuevaPrueba=0; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$prueba=$_SESSION['pruebaGuardadaParaVolver']; 
	$prueba= unserialize(serialize($prueba));
	unset($_SESSION['pruebaGuardadaParaVolver']); 
	$listaPistas=BD::listadoPistasPrueba($prueba->getid());
	$smarty->assign('listaPistas',$listaPistas);
	$listaSoluciones=$_SESSION['listaSoluciones']; 
	$smarty->assign('respuestas',$listaSoluciones);

}

//Cuando le damos a editar en la pagina3.php 
if(isset($_SESSION['idpru_3_to_6']))
{
	echo "entramos en la funcion4"; 

	//Esto significa que editamos la prueba
	//Si venimos a editar puede que haya pistas 

	$hayNuevaPrueba=0; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$pruebaRecibida=$_SESSION['idpru_3_to_6']; 
	$_SESSION['pruebaRecibida']=$pruebaRecibida; //el funcionamiento de nueistr pagina 
	$_SESSION['idTemporalPrueba']=$pruebaRecibida;  //Esta es para la pagina 8 y queno tenga que hace distuncoines
	unset($_SESSION['idpru_3_to_6']); 
	$_SESSION['accion']="editar";
	//Además de hacer esto que es lo mismo que hemos hecho arriba, tenemos que crear el objeto prueba 
	//Tenemos que recoger las soluciones que tiene asociada esa prueba
	//Tenemos que recoger las pistas que tiene asociada esa prueba
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

//Cuando pulsamos en el botón de añadir solución
if(isset($_POST['anadir']))
{
	echo "entramos en la funcion5"; 

	//Si pulsamos sobre el botón de añadir solución lo que tenemos que hacer es guardar los datos que tenemos en el formulario como un objeto de tipo prueba
	//Y guardamos en un array las pruebas que vamos metiendo
	//Para entrar en la parte de editar
	$hayNuevaPrueba=0;
	if(isset($_SESSION['listaSoluciones']))
	{
		//Si tenemos ya el array de las lista de las soluciones metemos en el array la nueva solución que nos acaba de llegar
		//Esta parte del código es tanto para editar como para nueva
		//Porque en el tpl la variable de lista soluciones es la misma que nueva y editar
		//Por lo tanto aunque en editar tengamos una lista de solciones nuevas 
		//tenemos que seguir complentando esta lista para que se pinten en el tpl
		//En realidad en la de editar estamos guardando 2 veces las nuevas solucines 
		//Una parte van a la varible de sesión de nuevaSolucione
		//Y también esa misma parte va a la listaSoluciones, donde está las antiguas + nuevas para pintarlas en el tpl
		$listaSoluciones=$_SESSION['listaSoluciones']; 
		$listaSoluciones[]=$_POST['anadirsolucion'];
		$_SESSION['listaSoluciones']=$listaSoluciones; 
	}else
	{
		//Cuadno no hay soluciones y le damos a añadir solución
		//Crea el array de lista soluciones, lo inicializa
		//Y crea la variable de sesion de lista soluciones para que lo guarde temporalmente 
		//Y poder llevarlo al final al guarda prueba 
		$listaSoluciones=array(); 
		//Cogemos la solucion que hemos añadido ahroa mismo 
		$listaSoluciones[]=$_POST['anadirsolucion']; 
		//Y oir ultimo actualizamos la variable de sesion de listaSolcuiones
		$_SESSION['listaSoluciones']=$listaSoluciones; 
	}
	//Este botón lo comparte tanto si es para una nuva prueba como si es para editar
	if(isset($_SESSION['accion']))
	{
		if($_SESSION['accion']=="editar") //Si estamos en editar tenemos que distinguir las respuestas nuevas de las que ya teníamos para no gardar duplicados 
		{
			//Comparten editar prueba y nueva prueba el mimso botón de añadir solución
			//Para que el botón sepa cuales son las pruebas nuevas y cuales son las pruebas que había guardadas 
			//Necesitamos distinguirlas 
			if(isset($_SESSION['listaSolucionesNuevas']))
			{
				$listaSolucionesNuevas=$_SESSION['listaSolucionesNuevas']; 
				$listaSolucionesNuevas[]=$_POST['anadirsolucion'];
				$_SESSION['listaSolucionesNuevas']=$listaSolucionesNuevas; 
			}else
			{
				$listaSolucionesNuevas=array(); 
				$listaSolucionesNuevas[]=$_POST['anadirsolucion']; 
				$_SESSION['listaSolucionesNuevas']=$listaSolucionesNuevas; 
			}
		}
	}
	//El id lo tenemos en una variable de seisión, lo aprovechamos para que 
	//Esta parte del codigo la compartan nueva prueba y editar
	//porque si es nueva prueba no tiene id si es editar tiene id
	//Pero no se la pasamos en ninguno de los 2 casos y nos guardamos esa id en la varible de sesión
	//Para cogerla  más tarde y poder editarla 
	$row['nombre']=$_POST['nombre']; 
	$row['url']=$_POST['url'];
	$row['descBreve']=$_POST['descripcionbreve'];
	$row['descExtendida']=$_POST['descripcionextendida'];
	$row['tipo']=$_POST['tipo'];
	$row['ayudaFinal']=$_POST['ayudaFinal'];
	$row['username']=$_SESSION['usuario'];

	$prueba=new Prueba($row); 
	if(isset($_SESSION['pruebaRecibida'])) //Esto es el id de la prueba
	{
		//Si tenemos una prueba guardada aprovechamos y recargamos el listado de las pistas 
		//Para poder pintarlas en el tpl 
		$listaPistas=BD::listadoPistasPrueba($_SESSION['pruebaRecibida']); 
		if(isset($listaPistas[0]))
		{	//en el caso de tener id y tener pistas
			$smarty->assign('hayPistas',1);
			$smarty->assign('listaPistas',$hayNuevaPrueba);
		}else
		{
			//El caso de tener id, pero no hay pistas en la base de datos 
			$smarty->assign('hayPistas',0);
		}
		

	}else
	{
		//En el caso de que n otengamos id no hay pistas
		$smarty->assign('hayPistas',0);
	}
	
	
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$smarty->assign('prueba',$prueba);
	$smarty->assign('respuestas',$listaSoluciones);
}

//Cuando pulsamos en el botón guardar prueba
if(isset($_POST['guardarPrueba']))
{
	//echo "entramos en la funcion6"; 

	if(isset($_SESSION['pruebaRecibida']))//Si tenemos el id de la prueba lo metemos en el row para hacer el objeto de prueba
	{
		$row['id']=$_SESSION['pruebaRecibida']; //Si tenemos esto es porque le hemos pulsado en update
	}
	$row['nombre']=$_POST['nombre']; 
	$row['url']=$_POST['url'];
	$row['descBreve']=$_POST['descripcionbreve'];
	$row['descExtendida']=$_POST['descripcionextendida'];
	$row['tipo']=$_POST['tipo'];
	$row['ayudaFinal']=$_POST['ayudaFinal'];
	$row['username']=$_SESSION['usuario'];
	$row['dificultad']=$_POST['dificultad']; 
	$row['tipo']= $_POST['tipo']; 
	$prueba=new Prueba($row); 
	//Metemos el objeto de prueba en una variable de sesión
	$_SESSION['pruebaParaGuardar']=$prueba; 
	//Nos vamos a la guardaprueba.php 
	header("Location: guardaPrueba.php");
}

if(isset($_POST['delPista'])) //borrar pista
{
	//echo "entramos en la funcion7"; 

	$row['id']=$_SESSION['pruebaRecibida']; 
	$row['nombre']=$_POST['nombre']; 
	$row['url']=$_POST['url'];
	$row['descBreve']=$_POST['descripcionbreve'];
	$row['descExtendida']=$_POST['descripcionextendida'];
	$row['tipo']=$_POST['tipo'];
	$row['ayudaFinal']=$_POST['ayudaFinal'];
	$row['username']=$_SESSION['usuario'];
	$row['dificultad']=$_POST['dificultad']; 
	$row['tipo']= $_POST['tipo']; 
	$prueba=new Prueba($row);

	$listaPistas = BD::listadoPistas(); //cogemos todas las pistas que hay en la base de datos y miramos si alguna de las que nos viene por post coincide con la que queremos borrar
	foreach ($listaPistas as $pista ) {
		$clave="del".$pista->getid(); 
		 
		if(isset($_POST[$clave]))
		{
			$respuesta = BD::eliminarPistas($prueba->getid(), $pista->getid()); 

		}
	}
	//una vez que borramos las pistas 
	$hayNuevaPrueba=1; 
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$listaPistas=BD::listadoPistasPrueba($prueba->getid()); //volvemos a recuperar las pistas que quedan para esta prueba
	//las volvemos a pintar si es que quedan
	if(isset($listaPistas[0]))
	{
		$smarty->assign('hayPistas',1);
	}else
	{
		$smarty->assign('hayPistas',0);
	}
	$smarty->assign('listaPistas',$listaPistas);
	//Ahora pasamos a las soluciones
	$listaSoluciones=$_SESSION['listaSoluciones']; //estas las teníamos en la variable de listaSoluciones
	$smarty->assign('respuestas',$listaSoluciones); //la pintamos
	$hayNuevaPrueba=0; //en este punto siempre van a ser una prueba editar o une nueva pero que se ha pulsado al botón añadir solucion, o añadir pista
	$smarty->assign('hayNuevaPrueba',$hayNuevaPrueba);
	$smarty->assign('prueba',$prueba);

}

$smarty->display('pagina6.tpl');    

?>