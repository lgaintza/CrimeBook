<?php
/*
	Definición: guardajuego.php es la parte de código que ayuda a pagina5.php a guardar el juego junto con sus pruebas

	Podemos llegar a guardajuego.php en alguno de estos casos: 
		--Pulsamos en el botón de guardar juego en pagina5.php cuando es un juego nuevo (1)
		--Pulsamos en el botón de guardar juego en pagina5.php cuando es un juego para editar(2)

	Esta parte de la aplicación se encarga de guardar o editar un juego añadiendo las pruebas dependiendo del caso en el que nos encontremos

*/

session_start();
require_once('include/BD.php');
require_once('include/Juego.php');
 
		if(isset($_POST['codigojuego'])){
	/*
	Defnición: Entramos en esta parte en el caso (2)
	Recogemos el codigo del juego que nos llega por POST y volvemos a la página1 			 
	Si nos viene un codigo juego significa que hay que editar el que ya tenemos guardado
	Para ello, recogemos los datos sencillos del formulario
	 */
			$codigojuego=$_POST['codigojuego'];
			$nombrejuego=$_POST['nombre'];
			$descripcionbreve=$_POST['descBreve'];
			$descripcionextendida=$_POST['descExtendida'];
			$fechaCreacion=$_POST['fechaCreacion'];
        	$username=$_POST['username'];
        	
			
			$row= array(); 
			$row['id']= $codigojuego; 
			$row['nombre']= $nombrejuego; 
       		$row['descBreve']= $descripcionbreve; 
       		$row['descExtendida']= $descripcionextendida; 
       		$row['fechaCreacion']=$fechaCreacion;
        	$row['username']=$username;
        	
			$juego = new Juego($row);
			BD::actualizaJuego($juego);
			
			//Una vez actualizado el juego, tenemos que insertar en la base de datos las pruebas nuevas que hemos guardado para el juego
			//Y también borrar las que hemos seleccionado. 
			
			// a las que son de añadir, les he añadido el prefijo "new" en el name de los input seguido del código de la prueba
			//A las que son de borrar les he añadido el prefijo "del" seguido del código de las pruebas. 

			//Primero recuperamos todas las pruebas que tenemos en la base de datos
			
			$listadoPruebas = BD::listaPruebas(); 
			//Ahora recorremos todos los códigos de las pruebas que tenemos en la base de datos, preguntando al post si tiene un new de ese código

			foreach($listadoPruebas as $prueba)
			{
				$codigoprueba="new".$prueba->getid(); 
				if(isset($_POST[$codigoprueba]))
				{
					BD::insertarPertenencias($codigojuego, $prueba->getid()); 
				}
			}
			//Ahora tenemos guardadas las pruebas asociadas al juego que hemos editado, si es que hemos pulsado alguna de ellas
			//Ahora vamos a ver si tenemos alguna que eliminar
			foreach($listadoPruebas as $prueba)
			{
				$codigoprueba="del".$prueba->getid(); 
				if(isset($_POST[$codigoprueba]))
				{
					BD::eliminarPertenencias($codigojuego, $prueba->getid()); 
					 
				}
			}
			//Con esto hemos eliminado las pruebas que hemos marcado en el formulario y hemos añadido las pruebas que hemos marcado en el formulario 
			header("Location:pagina1.php");

		}else {
	/*
	Defnición: Entramos en esta parte en el caso (1)
	Recogemos los datos del formulario del juego que nos llega por POST, guardamos y volvemos a la página1 			 
	*/
			
			$nombrejuego=$_POST['nombre'];
			$descripcionbreve=$_POST['descBreve'];
			$descripcionextendida=$_POST['descExtendida'];
			$fechaCreacion=$_POST['fechaCreacion'];
        	$username=$_POST['username'];
        	

			$row= array(); 			 
			$row['nombre']= $nombrejuego; 
       		$row['descBreve']= $descripcionbreve; 
       		$row['descExtendida']= $descripcionextendida; 
       		$row['fechaCreacion']=$fechaCreacion;
        	$row['username']="$username";
        	$ultimojuego=BD::recogeUltimoJuego();//cojemos el ultimo insertado
        	
        	$ultimojuego=$ultimojuego+1; 
        	$row['id']=$ultimojuego; //recojo el ultimo juego para incrementar el id
			$juego = new Juego($row);

			BD::insertarJuego($juego);
			
			//Ahora mismo tenemos guardado el juego nuevo 
			//Tenemos que recuperar el código de juego que acabamos de crear para poder guardar las pruebas que queramos editar
			
			//como el id de la tabla mysql es incremental debemos coger el id máximo que haya en esa tabla, ese será el último juego que has añadido en la tabla
			
			
			$listadoPruebas = BD::listaPruebas();
			//Ahora en $codigojuegoJuego, tenemos el código del último juego que hemos guardado y con ello podemos guardar en la tabla de relaciones, las pruebas con el juego que acabamos de crear
			 

			foreach($listadoPruebas as $prueba)
			{
				$codigoprueba="new".$prueba->getid(); 
				
				if(isset($_POST[$codigoprueba]))
				{
					
					$resultado = BD::insertarPertenencias($ultimojuego, $prueba->getid()); 
					echo $resultado; 
				}
			}

		header("Location:pagina1.php");
		}
				
?>
