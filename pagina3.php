<?php
require_once('include/BD.php');
require_once('include/Prueba.php');
require_once('include/libs/Smarty.class.php');

// Recuperamos la información de la sesión
session_start();
$error_selec='0'; 
// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Si botón es <> de 'crear' debe haber seleccionada una prueba (radiobutton)
if (isset($_POST['pru_bt']) && $_POST['pru_bt']<>'crear' && !isset($_POST['pru_id'])){ 
    echo "<script>alert('Debe seleccionar una prueba para continuar');</script>";
    $error_selec='1';    
}
// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';







// Recibimos POST 'crear'. Creamos variable de sesión para recibirla en pag6
if (isset($_POST['pru_bt']) && $_POST['pru_bt']=='crear'){
    $_SESSION['pag3_to_6']=$_POST['pru_bt'];
    header("Location: pagina6.php");
}

// Recibimos POST 'editar'.
// Creamos dos variables de sesión para recibirlas en pag6 (accion y id prueba)
if (isset($_POST['pru_bt']) && $_POST['pru_bt']=='editar' && isset($_POST['pru_id'])){
    $_SESSION['pag3_to_6']=$_POST['pru_bt'];
    $_SESSION['idpru_3_to_6']=$_POST['pru_id'];
    header("Location: pagina6.php");
}

if (isset($_POST['pru_bt']) && $_POST['pru_bt']=='duplicar' && isset($_POST['pru_id'])){
    $smarty->assign('duplica', BD::duplicaPrueba());
    
}

if (isset($_POST['pru_bt']) && $_POST['pru_bt']=='eliminar' && isset($_POST['pru_id'])){
    $smarty->assign('elimina', BD::eliminaPrueba());    
}
// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
if (!isset($_POST['pru_bt']) || $error_selec=='1' || $_POST['pru_bt']=='eliminar'|| $_POST['pru_bt']=='duplicar'){
    $smarty->assign('pruebas', BD::obtienePruebas());
}





// Mostramos la plantilla
$smarty->display('pruebas_pag3.tpl');     
?>
