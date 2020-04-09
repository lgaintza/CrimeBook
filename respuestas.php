<?php
require_once('include/BD.php');
require_once('include/Juego.php');

		if(isset($_POST['codigojuego'])){
			
			$codigojuego=$_POST['codigojuego'];
			$nombrejuego=$_POST['nombrejuego'];
			$descripcionbreve=$_POST['descripcionbreve'];
			$descripcionextendida=$_POST['descripcionextendida'];
			//Al juego le quieres pasar un array con las varibales del juego 
			//Ahora tenemos por separado el juego el nombre las descirpciones 
			$row= array(); 
			$row['codigojuego']= $codigojuego; 
			$row['nombrejuego']= $nombrejuego; 
       		$row['descripcionbreve']= $descripcionbreve; 
       		$row['descripcionextendida']= $descripcionextendida; 

			$juego = new Juego($row);
			BD::insertarJuego($juego);
			
		}		
			
				
?>