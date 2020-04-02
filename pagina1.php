<?php
    require_once('include/BD.php');
    require_once('include/Juego.php');
    require_once('include/libs/Smarty.class.php');

    // Recuperamos la información de la sesión
    session_start();
    
    // Comprobamos que el usuario se haya autentificado
    if (!isset($_SESSION['usuario'])) 
        die("Error - debe <a href='login.php'>identificarse</a>.<br />");
    
    // Botones
    if (isset($_POST['nuevapartida'])) {
        $juego['idJuego'] = $_POST['idJuego'];
        // Incluímos los valores en la sesión
        $_SESSION['idJuego'] = $juego;
        $_SESSION['accionpartida']="crear";
        // Redirige a la página 4
        header("Location: pagina4.php");                    
    }elseif (isset($_POST['nuevojuego'])) {
        // Redirige a la página 5
        $_SESSION['accionjuego']="nuevo";
        header("Location: pagina5.php");                    
    }elseif (isset($_POST['editarjuego'])) {
        $juego['idJuego'] = $_POST['idJuego'];
        // Incluímos los valores en la sesión
        $_SESSION['idJuego'] = $juego;
        $_SESSION['accionjuego']="editar";        
        // Redirige a la página 5
        header("Location: pagina5.php");                    
    }elseif (isset($_POST['verpartidas'])) {
        $juego['idJuego'] = $_POST['idJuego'];
        // Incluímos los valores en la sesión
        $_SESSION['idJuego'] = $juego;
        // Redirige a la página 2
        header("Location: pagina2.php");                    
    }elseif (isset($_POST['eliminarjuego'])) {
        $juegos = $_POST['juego'];
        BD::eliminaJuegos($juegos);
        header("Location: pagina1.php"); 
    }
    
    // Cargamos la librería de Smarty
    $smarty = new Smarty;
    $smarty->template_dir = 'smarty/templates/';
    $smarty->compile_dir = 'smarty/templates_c/';
    $smarty->config_dir = 'smarty/configs/';
    $smarty->cache_dir = 'smarty/cache/';
    

    // Ponemos a disposición de la plantilla los datos necesarios
    $smarty->assign('usuario', $_SESSION['usuario']);
    $smarty->assign('juegos', BD::obtieneJuegos());

    // Mostramos la plantilla
    $smarty->display('juegos.tpl');
    
?>
