<?php
require_once('include/BD.php');
require_once('include/Juego.php');
require_once('include/Partida.php');
require_once('include/Equipo.php');
require_once('include/Prueba.php');
require_once('include/libs/Smarty.class.php');
// Recuperamos la información de la sesión
session_start();
$errorGuardarPartida='0';

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])){ 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");
}
//Si hemos entrado por las pestañas de arriba sin seleccionar juego, vamos a pag1
if (isset($_POST['irapag1'])){ 
    header("Location: pagina1.php");
    exit;
}
//Si venimos de botones de la página, y después de crear nos quedamos en editar y ya hemos creado la partida (segunda pasada)
if (isset($_POST['partida_bt']) && isset($_POST['botonesirapag']) && $_POST['botonesirapag']=='pag4editar'){
    if(isset($_SESSION['accionfinalizada']) && $_SESSION['accionfinalizada']=='1'){
        $_SESSION['accionpartida']='editar';
    }    
}


//Si venimos de Pag1 y opción Crear Nueva Partida:
if (isset($_SESSION['accionpartida']) && $_SESSION['accionpartida']=="crear" ){
    //Se recibe Idjuego commoarray. Lo pasamos a valor
    if (isset($_SESSION['idJuego'])){
        foreach($_SESSION['idJuego'] as $arrayjuego){
            $juegorecibido=$arrayjuego;
            $_SESSION['juegorecibido']=$arrayjuego;
        }
    }
    if(!isset($_SESSION['idJuego'])){$errorGuardarPartida='1';}    
}

//Si venimos de Pag2 y opción Editar Partida o hemos elegido en los radio button quedarnos en editar:
if ((isset($_SESSION['accionpartida']) && $_SESSION['accionpartida']=="editar")||isset($_POST['botonesirapag']) && $_POST['botonesirapag']=="pag4editar"){
    $accionrecibida='editar';
    if(isset($_SESSION['idJuego']) && is_array($_SESSION['idJuego'])){
        foreach($_SESSION['idJuego'] as $juegorecibido);    
    }
    else{
        if(isset($_SESSION['idJuego'])){$juegorecibido=$_SESSION['idJuego'];} 
    }
    if(isset($_SESSION['idPartida']) && is_array($_SESSION['idPartida'])){
        foreach($_SESSION['idPartida'] as $partidarecibida);    
    }
    else{
        if(isset($_SESSION['idPartida'])){$partidarecibida=$_SESSION['idPartida'];} 
    }
    //Si no la recibo de pag2 como Array sale nula, la recibo como string de pag4
    if(isset($_SESSION['idPartida'])&& ($partidarecibida=="")){
        $partidarecibida=$_SESSION['idNuevaPartida'];
        }
    if(isset($juegorecibido)){
        $_SESSION['juegopag4']=$juegorecibido;
        }
    if(isset($partidarecibida)){
        $_SESSION['partidapag4']=$partidarecibida;
        } 
}


// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

//Si venimos de uno de los botones de acción de la propia página
// Si venimos de AÑADIR
if (isset( $_POST['partida_bt']) && $_POST['partida_bt']=='anadir'){
//Comprobamos que existe POST con el campo nombre del equipo a añadir y no está en blanco   
    if (isset($_POST['nombre_equipo']) && $_POST['nombre_equipo']<>''){
        $smarty->assign('creaequipo', BD::creaEquipo());
        
}else{
    echo "<script>alert('Para Añadir equipo a la partida debe introducir \\nNuevo Nombre de Equipo \\nen la celda de texto correspondiente');</script>";

}
}
//Si venimos de uno de los botones de acción de la propia página
// Si venimos de EDITAR

if (isset($_POST['partida_bt']) && $_POST['partida_bt']=='guardar' && $_SESSION['accionpartida']=='editar' ){
    if (isset($_POST['celdatiempo'])){
        if ($_POST['celdatiempo']==null){$_POST['celdatiempo']='0';}
        $checktime=ctype_digit(str_replace(":","",$_POST['celdatiempo']));
        if ($checktime==false){
            $errorGuardarPartida='1'; 
            echo "<script>alert('El valor del campo Duración de la Partida\\ndebe ser numérico.\\n \\nNo se ha podido completar el proceso \\nde guardar Partida');</script>";
        }else{
            $smarty->assign('actualizarTiempo', BD::actualizaTiempo()); 
        }   
    }    
}




// Si venimos de los botones de acción de la propia página y la acción es crear partida
if (isset($_POST['partida_bt']) && $_SESSION['accionpartida']=='crear' ){
    $nombrespartidas =(BD::arrayNombrePartidas());
     

    //comprobamos que la celda 'nombre' no está vacía
    if (isset($_POST['celdanombrepartida']) && $_POST['celdanombrepartida']==''){
        $errorGuardarPartida='1';    
        echo "<script>alert('Para Guardar Nueva Partida el campo \\nNombre de la Partida \\nno puede estar vacío.\\n \\n No se ha podido completar el proceso \\nde guardar Partida');</script>";
    }

    //comprobamos si el nombre de la nueva partida ya existe
    if (isset($nombrespartidas) && $errorGuardarPartida==0){
        if (isset($_POST['celdanombrepartida'])){
            $micheck=$_POST['celdanombrepartida'];
        }
        foreach($nombrespartidas as $checkpartida){ 
            $checkbucle = $checkpartida->getnombre();
                if ($checkbucle==$micheck && $errorGuardarPartida!=='1'){
                    $errorGuardarPartida='1';
                    echo "<script>alert('Nombre de Partida repetido \\n  \\nDebe elegir un Nombre de Partida\\nque no exista.\\n \\nNo se ha podido completar el proceso \\nde guardar Partida');</script>";
            } 
            
        }
    }
        
            
        
    //comprobamos si el contenido de tiempo es numérico    
    if (isset($_POST['celdatiempo']) & $errorGuardarPartida==0){
        if ($_POST['celdatiempo']==null){$_POST['celdatiempo']='0';}
        $checktime=ctype_digit(str_replace(":","",$_POST['celdatiempo']));
        if ($checktime==false){
            $errorGuardarPartida='1'; 
            echo "<script>alert('El valor del campo Duración de la Partida\\ndebe contener valor numérico.\\n \\nNo se ha podido completar el proceso \\nde guardar Partida');</script>";
        }
    }
    
    
    if($errorGuardarPartida=='0'){
        $smarty->assign('equipos', BD::creaPartidaNueva());
    }//else{
        //echo "<script>alert('No se ha podido completar el proceso \\nde guardar Partida');</script>";
    //}
}
// Si venimos de los botones de acción de la propia página refrescamos datos
// O si la acción recibida es EDITAR los cargamos por primera vez
// Recuperamos datos de partida y equipos
if (isset($_POST['partida_bt']) || (isset($_SESSION['accionpartida']) && $_SESSION['accionpartida']=='editar')){
if (isset($partidarecibida)){$smarty->assign('partida4', BD::obtienePartida($partidarecibida));}
if (isset($partidarecibida)){$smarty->assign('equipos4', BD::obtieneEquiposPag4($partidarecibida));}
if (isset($accionrecibida)){
        $smarty->assign('accion_pag4',  $accionrecibida);
    }
}

// En caso contrario CREAR, muestra los campos vacíos, salvo Nombre del juego
// Si venimos de los botones de acción de la propia página refrescamos datos
// O si la acción recibida es EDITAR los cargamos por primera vez
// Recuperamos datos de partida y equipos
if (isset($_SESSION['accionpartida'])&& $_SESSION['accionpartida']=='editar'){
$smarty->assign('accion_pag4','editar');

}
if (isset($_SESSION['accionpartida'])&& $_SESSION['accionpartida']=='crear'){
$smarty->assign('accion_pag4','crear');
$crear="terminado";
}
if ((isset($juegorecibido) && $juegorecibido=='')|| !isset($juegorecibido)){
    $smarty->assign('nombrejuego',"No hay Juego Seleccionado");
}else{
    if (isset($juegorecibido)){$smarty->assign('nombrejuego',  BD::nombrejuego($juegorecibido));}
}
// Si venimos de crear, y queremos ir a Pag2, opción por defecto
    if (isset($_POST['botonesirapag']) && $_POST['botonesirapag']=="pag2" && $errorGuardarPartida==0) {
        // Redirige a la página 2
        header("Location: pagina2.php");  
    }
// O nos quedamos en Pag4 como editar, para poder meter equipos o cambiar tiempo en la partida recién creada
    if (isset($_POST['botonesirapag']) && $_POST['botonesirapag']=="pag4editar" && $errorGuardarPartida==0) {
        if (isset($_SESSION['juegopag4'])){$_SESSION['idjuego']=$_SESSION['juegopag4'];}
        $_SESSION['idPartida']=null;
        if (isset($_SESSION['idNuevaPartida'])){$_SESSION['idPartida']=$_SESSION['idNuevaPartida'];}
        if (isset($_SESSION['accionpartida'])){$_SESSION['accionpartida']=null;}
        $_SESSION['accionpartida']="editar";
        $_SESSION['accionfinalizada']="1";
        // Redirige a la página 4
        header("Location: pagina4.php");  
    }
// O nos quedamos en Pag4 como crear, para poder seguir metiendo nueva partidas
    if (isset($_POST['botonesirapag']) && $_POST['botonesirapag']=="pag4crear" && $errorGuardarPartida==0) {
        if (isset($_SESSION['juegopag4'])){$_SESSION['idjuego']=$_SESSION['juegopag4'];}
        $_SESSION['idPartida']=null;
        $_SESSION['accionpartida']=null;
        $_SESSION['accionpartida']="crear";
        //if (isset($_SESSION['accionpartida'])){$_SESSION['accionpartida']=null;}        
        //Redirige a la página 4
        header("Location: pagina4.php");  
    }
    if (isset($_SESSION['accionfinalizada'])){$_SESSION['accionfinalizada']=null;}
// Mostramos la plantilla
$smarty->display('partida_pag4.tpl'); 
?>
