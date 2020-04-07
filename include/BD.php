<?php
require_once('Juego.php');
require_once('Partida.php');
require_once('Prueba.php');
require_once('Equipo.php');
require_once('Resolucion.php');
require_once('Pista.php');
require_once('Estadistica.php');

class BD {
    protected static function ejecutaConsulta($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=CrimeBook";
        $usuario = 'ivantapia01';
        $contrasenya = '1234abcd';
        
        $dwes = new PDO($dsn, $usuario, $contrasenya, $opc);
        $resultado = null;
        if (isset($dwes)) $resultado = $dwes->query($sql);
        return $resultado;
    }

    // Método para mostrar juegos en la página 1
    public static function obtieneJuegos(){
        $sql ="SELECT id, nombre, descBreve, sum(num_pru) as num_pru, username";
        $sql.=" FROM (";
        $sql.=" SELECT juegos.id as id, juegos.nombre as nombre, juegos.descBreve as descBreve, count(idPrueba) as num_pru, juegos.username as username";
        $sql.=" FROM juegos JOIN pertenencias";
        $sql.=" ON juegos.id = pertenencias.idJuego";
        $sql.=" GROUP BY id";
        $sql.=" UNION";
        $sql.=" SELECT juegos.id as id, juegos.nombre as nombre, juegos.descBreve as descBreve, '0' as num_pru, juegos.username as username";
        $sql.=" FROM juegos";
        $sql.=" )juegosconpruebas";
        $sql.=" GROUP BY id";
        $resultado = self::ejecutaConsulta ($sql);
        $juegos = array();

	if($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $juegos[] = new Juego($row);
                $row = $resultado->fetch();
            }
	}
        
        return $juegos;
    }
    
    // Método para mostrar juegos en las páginas 2 y 4
    public static function nombrejuego($id){
        $sql = "SELECT nombre FROM juegos WHERE id='".$id."'";
        $minombre = self::ejecutaConsulta($sql);
        if($minombre) {  
            $row = $minombre->fetch();                                  
    }
        
        return $row['nombre'];
    }

    

            //metodo para encontrar máximo Id pistas
    public static function obtieneMaxIdPistas(){
        $sql = "SELECT MAX(id)+1 as id FROM pistas";
        $resulmax = self::ejecutaConsulta($sql);
        if($resulmax) {            // Añadimos un elemento por cada producto obtenido
            $row = $resulmax->fetch();                                  
	}
        
        return $row['id'];
    }

public static function creaPista($pista){

  
$sql = "INSERT INTO pistas (idPrueba, id, texto, tiempo, intentos)";
$sql .= " VALUES (".$pista->getidPrueba().",".$pista->getid().", '".$pista->gettexto()."',";
$sql .= $pista->gettiempo().", ".$pista->getintentos()." )";
$resultado = self::insertaRegistro($sql);        
return $sql;   



}

    
    //metodo para eliminar pruebas en la pagina 3
    public static function eliminaPrueba(){
        $sql = "DELETE FROM pruebas ";
        if(isset($_POST['pru_id'])){
        $sql.=" WHERE pruebas.id='" .$_POST['pru_id']."'";
        }
        $pruebas = self::ejecutaConsulta($sql);
        return $pruebas;
    }
    
    //metodo para metodo para actualizar tiempo en la pagina 4
    public static function actualizaTiempo(){
        if(isset($_POST['celdatiempo']) && isset($_SESSION['partidapag4'])){
        $sql ="UPDATE partidas SET duracion='".$_POST['celdatiempo']."' WHERE id='".$_SESSION['partidapag4']."'";
        $partidas = self::ejecutaConsulta ($sql);
        return $partidas;
    }
    }
    
    //metodo para crear equipo en la pagina 4
    public static function creaEquipo(){
        //crea código de equipo aleatorio
        $codigoaleatorio = self::obtieneAleatorio();
        //como es único tenemos que chequear que no exista. Se crea un array con los actuales y se compara
        $arraycodigos =(BD::arrayCodigo());
        $micheck=$codigoaleatorio;
        foreach($arraycodigos as $checkcodigo){ 
            $checkbucle = $checkcodigo->getcodigo();
            if ($checkbucle==$micheck){
                //Si el código ya existe, se reinicia la función para que genere uno nuevo
                $a=(BD::creaEquipo());
            }
        }
         $resultadomax = self::obtieneMaxIdEquipos();
        $_SESSION['nuevoJuegoId']=++$resultadomax[0];        
        $sql ="INSERT INTO equipos VALUES ('".
        $sql =++$resultadomax[0]."', ".
        $sql ="'".$codigoaleatorio."', ".
        $sql ="'".$_POST['nombre_equipo']."', ".
        $sql ="'".$_POST['celdatiempo']."', ".
        $sql ="'".$_SESSION['partidapag4']."')";
        $equipo = self::ejecutaConsulta ($sql);
        return $equipo;
    }
    
    
    //Para chequear que codigo equipo nuevo no existe Pag4
    public static function arrayCodigo(){
        $sql  = "SELECT codigo FROM equipos";
        $resultado = self::ejecutaConsulta($sql);
        $codigoequipos = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $codigoequipos[] = new Equipo($row);
                $row = $resultado->fetch();
            }
	}
        
        return $codigoequipos;
    }
    
    //metodo para crear partida en la pagina 4
    public static function creaPartidaNueva(){
        $resultadomax = self::obtieneMaxIdPartidas();
        $_SESSION['idNuevaPartida']=++$resultadomax[0];
        
        $sql ="INSERT INTO partidas VALUES ('".
        $sql =$_SESSION['idNuevaPartida']."', ".
        $sql ="'".$_POST['celdanombrepartida']."', ".
        $sql ="now(), ".
        $sql ="'".$_POST['celdatiempo']."', ".
        $sql ="now(), ".
        $sql ="'".$_SESSION['juegorecibido']."', ".
        $sql ="'".$_SESSION['usuario']."',".
        $sql ="'N')";
        
        $partida = self::ejecutaConsulta ($sql);
        return $partida;
    }
    
     //metodo para duplicar pruebas en la pagina 3
    public static function duplicaPrueba(){
        //Obtener max id para saber id nueva prueba
        $resultadomax = self::obtieneMaxIdPruebas();
        //Obtener array datos prueba para duplicarlo en la nueva prueba duplicada
        $arraypruebadupli = self::obtieneArrayPrueba();
     
        $sql ="INSERT INTO pruebas VALUES ('".
        $sql =++$resultadomax[0]."', ".
        //nombre no puede ser el mismo, añadimos '_dupli'
        $sql ="'".$arraypruebadupli[1]."_dupli"."', ".
        $sql ="'".$arraypruebadupli[2]."', ".
        $sql ="'".$arraypruebadupli[3]."', ".
        $sql ="'".$arraypruebadupli[4]."', ".
        $sql ="'".$arraypruebadupli[5]."', ".
        $sql ="'".$arraypruebadupli[6]."', ".
        $sql ="'".$arraypruebadupli[7]."', ".
        $sql ="'".$arraypruebadupli[8]."')";
        $resultado = self::ejecutaConsulta ($sql);
        $pruebas = array();
        return $pruebas;
    }
    
    //metodo para encontrar máximo Id pruebas en la pagina 4
    public static function obtieneMaxIdEquipos(){
        $sql = "SELECT MAX(id) FROM equipos";
        $resulmax = self::ejecutaConsulta($sql);
        if($resulmax) {            // Añadimos un elemento por cada producto obtenido
            $row = $resulmax->fetch();                                  
	}
        
        return $row;
    }
    
    //metodo para encontrar máximo Id partidas en la pagina 4
    public static function obtieneMaxIdPartidas(){
        $sql = "SELECT MAX(id) FROM partidas";
        $resulmax = self::ejecutaConsulta($sql);
        if($resulmax) {            // Añadimos un elemento por cada producto obtenido
            $maxIdPartidas = $resulmax->fetch();                                  
	}
        
        return $maxIdPartidas;
    }
    
    //metodo para encontrar máximo Id pruebas en la pagina 5
    public static function obtieneMaxIdJuegos(){
        $sql = "SELECT MAX(id) FROM juegos";
        $resulmax = self::ejecutaConsulta($sql);
        if($resulmax) {            // Añadimos un elemento por cada producto obtenido
            $row = $resulmax->fetch();                                  
	}
        
        return $row;
    }
    
        
    
    //Para chequear nombre nueva partida no existe Pag4
    public static function arrayNombrePartidas(){
        $sql  = "SELECT nombre FROM partidas WHERE idJuego='".$_SESSION['juegorecibido']."'";
        $resultado = self::ejecutaConsulta($sql);
        $nombrepartidas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $nombrepartidas[] = new Partida($row);
                $row = $resultado->fetch();
            }
	}
        
        return $nombrepartidas;
    }
    //metodo para crear un número aleatorio de 8 digitos numéricos en pag 4
    public static function obtieneAleatorio($longitud = 8) {
    $caracteres = '0123456789';
    $longitudcadena= strlen($caracteres);
    $codigoaleatorio = '';
    for ($i = 0; $i < $longitud; $i++) {
        $codigoaleatorio .= $caracteres[rand(0, ($longitudcadena - 1))];
    }
    return $codigoaleatorio;
} 
    
    
    
        //metodo para encontrar máximo Id pruebas en la pagina 3
    public static function obtieneMaxIdPruebas(){
        $sql = "SELECT MAX(id) FROM pruebas";
        $resulmax = self::ejecutaConsulta($sql);
        if($resulmax) {            // Añadimos un elemento por cada producto obtenido
            $row = $resulmax->fetch();                                  
	}
        
        return $row;
    }
    
    
    //metodo para encontrar datos prueba seleccionada y poder duplicarla, en la pagina 3
    public static function obtieneArrayPrueba(){
        $sql  = "SELECT id,nombre, descExtendida, descBreve, tipo, dificultad, url, ayudaFinal, username FROM pruebas ";
        if(isset($_POST['pru_id'])){
        $sql.=" WHERE pruebas.id='" .$_POST['pru_id']."'";
        }
        $resultado = self::ejecutaConsulta($sql);
        $pruebas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $arraypruebadupli = $resultado->fetch();            
	}
        
        return $arraypruebadupli;
    }
    
      //metodo para mostrar pruebas en la pagina 3
    public static function obtienePruebas(){
        $sql = "SELECT pruebas.id, pruebas.nombre, pruebas.descBreve, pruebas.tipo, pruebas.username";
        $sql.=" FROM pruebas";
        //if(isset($_POST['pru_id'])){
        //$sql.=" WHERE pruebas.id='" .$_POST['pru_id']."'";
        $resultado = self::ejecutaConsulta($sql);
        $pruebas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $pruebas[] = new Prueba($row);
                $row = $resultado->fetch();
            }
	}
        
        return $pruebas;
    }
 
    
         
    
    // Añadimos función para obtener los datos de Partida para Página4
    public static function obtienePartida($id_partida) {
        $sql = "SELECT nombre, duracion FROM partidas  WHERE id = '".$id_partida."'";
        $resultado = self::ejecutaConsulta($sql);
        $partida4 = array();

	if($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $partida4[] = new Partida($row);
                $row = $resultado->fetch();
            }
	}
        
        return $partida4;
    }
    
    
       
    
    public static function verificaCliente($nombre, $contrasenya) {
        $sql = "SELECT username FROM usuarios ";
        $sql .= "WHERE username='$nombre' ";
        $sql .= "AND contrasenya='" . ($contrasenya) . "';";
        $resultado = self::ejecutaConsulta($sql);
        $verificado = false;

        if(isset($resultado)) {
            $fila = $resultado->fetch();
            if($fila !== false) $verificado=true;
        }
        return $verificado;
    }
    //metodo para sacar las estadisticas en la pantalla 7
    public static function obtieneEstadistica(){
        $sql = "SELECT DISTINCT equipos.nombre as nombreEquipo, partidas.id as id, partidas.fechaInicio as fechaInicio, partidas.duracion as duracion, pruebas.nombre as nombrePrueba, equipos.tiempo as tiempoResolucion, resoluciones.intentos as intentos";
        $sql.=" FROM partidas INNER JOIN equipos ON (partidas.id = equipos.idPartida) INNER JOIN resoluciones ON (equipos.id = resoluciones.idEquipo) INNER JOIN pruebas ON (resoluciones.idPrueba = pruebas.id)";
    
    
        $resultado = self::ejecutaConsulta($sql);
        $estadisticas =array();
        if($resultado) {
                // Añadimos un elemento por cada producto obtenido
                $row = $resultado->fetch();
                while ($row != null) {
                    $estadisticas[] = new Estadistica($row);
                    $row = $resultado->fetch();
                }
        }
            
            return $estadisticas;    
        }

   
    

    public static function muestraPartida($idJuego){
        $sql = "SELECT id, nombre, fechaCreacion, duracion, fechaInicio, idJuego, username from partidas";
        $sql.=" WHERE idJuego='" . $idJuego . "'";
    
        $resultado = self::ejecutaConsulta ($sql);
        $partidas = array();

	if($resultado) {
            // Añadimos un elemento por cada producto obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $partidas[] = new Partida($row);
                $row = $resultado->fetch();
            }
	}
        
        return $partidas;    
    }
    
    
    // Método para mostrar partidas y obtener equipos en la página 2
    public static function muestraPartidas($idjuego) {
        $sql = "SELECT partidas.id, count(equipos.id) as 'num_equipospartida', ";
        $sql .= "partidas.nombre, partidas.fechaCreacion, partidas.duracion, partidas.fechaInicio, partidas.idJuego, partidas.username, partidas.finalizada ";
        $sql .= " FROM partidas LEFT JOIN equipos";
        $sql .=" ON partidas.id = equipos.idPartida";
        $sql .=" WHERE partidas.idJuego='".$idjuego."' GROUP BY partidas.id";
        $resultado = self::ejecutaConsulta($sql);

	if($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $num_equipos[] = new Partida($row);
                $row = $resultado->fetch();
            }
	}
        
        return $num_equipos;
    }
    
    
    public static function obtieneEquipos($idpartida) {
        $sql = "SELECT nombre, codigo  FROM equipos WHERE idPartida='" .$idpartida."'";
        $resultado = self::ejecutaConsulta ($sql);  
        $equipos4 = array();

	if($resultado) {
            $row = $resultado->fetch();
            while ($row != null) {
                $equipos4[] = new Equipo($row);
                $row = $resultado->fetch();
            }
	}
        
        return $equipos4;
    }
    
       protected static function insertaRegistro($sql) {
        $opc = array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
        $dsn = "mysql:host=localhost;dbname=CrimeBook";
        $usuario = 'ivantapia01';
        $contrasena = '1234abcd';
        $dwes = new PDO($dsn, $usuario, $contrasena, $opc);
        $resultado = true;
        $dwes->beginTransaction();         
     
        if ($dwes->exec($sql) != true) $resultado = false;
        if ($resultado == true) {
            $dwes->commit();           
        }
        else {
            $dwes->rollback();            
        } 

        return $resultado;   

    }


    public static function obtenerJuego($id) {
        $sql = "SELECT * FROM juegos";
        $sql .= " WHERE id='".$id."'";
        $resultado = self::ejecutaConsulta ($sql);
        $juego = array();

        if($resultado) {
                
                $row = $resultado->fetch();
                while ($row != null) {
                    $juego[] = new Juego($row);
                    $row = $resultado->fetch();
                }
        }
            
            return $juego;
        
    }


    public static function listadoPruebasJuego($codigojuego) {
        $sql = "SELECT pruebas.id, pruebas.nombre, pruebas.url, pruebas.descBreve, pruebas.dificultad,";
        $sql .= " pruebas.ayudaFinal, pruebas.username, pruebas.descExtendida, pruebas.tipo FROM pruebas, pertenencias"; 
        $sql .= " WHERE (pruebas.id=pertenencias.idprueba";
        $sql .= " AND pertenencias.idjuego='" . $codigojuego . "')";

        $resultado = self::ejecutaConsulta ($sql);
        $listapruebasjuego = array();

        if($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $listapruebasjuego[] = new Prueba($row);
                    $row = $resultado->fetch();
                }
        }
           
            return $listapruebasjuego; 
    }  


    public static function listaPruebas() {
        $sql = "SELECT * FROM pruebas";
        $resultado = self::ejecutaConsulta ($sql);
        $listapruebas = array();

        if($resultado) {
            // Añadimos un elemento por cada prueba obtenido
            $row = $resultado->fetch();
            while ($row != null) {
                $listapruebas[] = new Prueba($row);
                $row = $resultado->fetch();
            }
        }
        
        return $listapruebas;  
    }





     public static function insertarJuego($juego) {      
        
        $sql = "INSERT INTO juegos (id, nombre, descExtendida, descBreve, fechaCreacion, username)";
        $sql .= " VALUES ('".$juego->getid()."','".$juego->getnombre()."', '".$juego->getdescExtendida()."',";
        $sql .= "'".$juego->getdescBreve()."', '".$juego->getfechaCreacion()."', '".$juego->getusername()."' )";

        $resultado = self::insertaRegistro($sql);        
        return $sql;   

    }


     public static function actualizaJuego($juego) {       
        
        $sql = "UPDATE juegos SET nombre='".$juego->getnombre()."' ,";
        $sql .= "descExtendida='".$juego->getdescExtendida()."', ";
        $sql .= "descBreve='".$juego->getdescBreve()."'";

        $sql .=" WHERE id='".$juego->getid()."' ";
        $resultado = self::insertaRegistro($sql);
        
        return;   
    }  

    public static function insertarPertenencias($codigojuego, $codigoprueba) {        
        
        $sql = " INSERT INTO pertenencias (idJuego, idPrueba)";
        $sql .= " VALUES ('".$codigojuego."','".$codigoprueba."')";      

        $resultado = self::insertaRegistro($sql);        
        return $sql;   

    } 

    public static function eliminarPertenencias($codigojuego, $codigoprueba) {        
       
        $sql = " DELETE FROM pertenencias";
        $sql .= " WHERE idJuego='" . $codigojuego . "'";
        $sql.=" AND idPrueba='" . $codigoprueba . "'";    
        $resultado = self::ejecutaConsulta ($sql);     
        
        return $sql; 
    }     

    

    public static function recogeUltimoJuego() {
        $sql = " SELECT MAX(id) FROM juegos";        
        $resultado = self::ejecutaConsulta ($sql);
        if(isset($resultado)) {
            $row = $resultado->fetch();
        }        
        return $row[0];
    }

    //##Modificada, mal la sql 
    public static function listadoRespuestas($id) {
        $sql = " SELECT respuesta FROM respuestas"; 
        $sql .= " WHERE idPrueba ='" . $id . "'";
        

        $resultado = self::ejecutaConsulta ($sql);
        $listarespuestas = array();

        if($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $listarespuestas[] = $row['respuesta'];
                    $row = $resultado->fetch();
                }
        }
            
        return $listarespuestas; 
    }

    public static function insertaRespuesta($codigoprueba, $respuesta,$ultimaRespuesta) {        
        
        $sql = " INSERT INTO respuestas (idPrueba, respuesta,id)";
        $sql .= " VALUES ('".$codigoprueba."', '".$respuesta."','".$ultimaRespuesta."')";      

        $resultado = self::insertaRegistro($sql);        
        return $sql;   

    }    
     

    
    public static function obtenerPrueba($id) {
        $sql = " SELECT *  FROM pruebas";
        $sql .= " WHERE id='".$id."'";
        $resultado = self::ejecutaConsulta ($sql);
        $listarespuestas=array();
        if($resultado) {
                
                $row = $resultado->fetch();
                while ($row != null) {
                    $prueba= new Prueba($row);
                    $row = $resultado->fetch();
                }
        }
        

        //Antes de devolver el objeto de la prueba 
        //Necesitamos cargas las respuestas que tienen esa prueba 
        //Como están en otra
        $listarespuestas= self::listadoRespuestas($id); 
        $prueba->cargaRespuestas($listarespuestas);
        return $prueba;
       
       
    }  


    public static function listadoPistas() {
        $sql = "SELECT * FROM pistas";
        $resultado = self::ejecutaConsulta ($sql);
        $listapistas = array();

        if($resultado) {            
            $row = $resultado->fetch();
            while ($row != null) {
                $listapistas[] = new Pista($row);
                $row = $resultado->fetch();
            }
        }
        
        return $listapistas;  
    }

    
   
    public static function listadoPistasPrueba($codigoprueba) {
        $sql = " SELECT * FROM pistas"; 
        $sql .= " WHERE idPrueba ='" . $codigoprueba . "'";       

        $resultado = self::ejecutaConsulta ($sql);
        $listapistasprueba = array();

        if($resultado) {
                $row = $resultado->fetch();
                while ($row != null) {
                    $listapistasprueba[] = new Pista($row);
                    $row = $resultado->fetch();
                }
        }
            
        return $listapistasprueba; 
    } 

     public static function recogeUltimaPista() {
        $sql = " SELECT MAX(id) FROM pistas";        
        $resultado= self::ejecutaConsulta ($sql);
        if(isset($resultado)) {
            $row = $resultado->fetch();
        }        
        return $row[0];
        
    } 

 

    public static function recogeUltimaPrueba() {
        $sql = " SELECT MAX(id) FROM pruebas";        
        $resultado= self::ejecutaConsulta ($sql);
        if(isset($resultado)) {
            $row = $resultado->fetch();
        }        
        return $row[0];
        
    }  
    //Esto no lo habías corregido, el id no es incremental en las respuestas tampoco
    public static function recogeUltimaRespuesta() {
        $sql = " SELECT MAX(id) FROM respuestas";        
        $resultado= self::ejecutaConsulta ($sql);
        if(isset($resultado)) {
            $row = $resultado->fetch();
        }        
        return $row[0];
        
    }      


    public static function insertarPrueba($prueba) {        
        
        $sql = " INSERT INTO pruebas (id, nombre, descExtendida, descBreve, tipo, dificultad, url, ayudaFinal, username)";
        $sql .= " VALUES ('".$prueba->getid()."','".$prueba->getnombre()."', '".$prueba->getdescExtendida()."',";
        $sql .= " '".$prueba->getdescBreve()."', '".$prueba->gettipo()."', '".$prueba->getdificultad()."' ,";
        $sql .= " '".$prueba->geturl()."', '".$prueba->getayudaFinal()."', '".$prueba->getusername()."') ";

        $resultado = self::insertaRegistro($sql);        
        return $sql ;   

    }


    public static function actualizaPrueba($prueba) {        
        
        $sql = " UPDATE pruebas SET nombre='".$prueba->getnombre()."', ";
        $sql .= " descExtendida='".$prueba->getdescExtendida()."', descBreve='".$prueba->getdescBreve()."' ,";
        $sql .= " tipo='".$prueba->gettipo()."', dificultad='".$prueba->getdificultad()."', url='".$prueba->geturl()."',";
        $sql .= " ayudaFinal='".$prueba->getayudaFinal()."'";
        $sql .= " WHERE id='".$prueba->getid()."' " ;
        $resultado = self::insertaRegistro($sql);
        
        return $sql;   
    }

    public static function eliminarPistas($idPrueba, $id) {        
       
        $sql = " DELETE FROM pistas";
        $sql .= " WHERE idPrueba='" . $idPrueba . "'";
        $sql.=" AND id='" . $id . "'";  

        $resultado = self::ejecutaConsulta ($sql);     
        
        return $sql; 
    } 
  
  
    // Método para eliminar juegos. Elimina también las partidas de ese juego y las pertenencias
    public static function eliminaJuegos($codigo){
        foreach ($codigo as $juego) {
            $sql = "DELETE FROM juegos ";
            $sql.=" WHERE juegos.id='" . $juego . "'";
            $resultado = self::ejecutaConsulta ($sql);
        }
    }
    
        
    //metodo para eliminar una partida finalizada en página2
    public static function eliminaPartida($codigo){
        $sql = "DELETE FROM partidas ";
        $sql.=" WHERE partidas.id='" . $codigo . "'";
        $sql.=" AND partidas.finalizada='S'";
        $resultado = self::ejecutaConsulta ($sql);

    }
    
       
    
}
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    

?>