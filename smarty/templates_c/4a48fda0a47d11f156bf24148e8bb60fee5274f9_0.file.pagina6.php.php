<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-18 00:42:15
  from '/home/etxea/NetBeansProjects/DWES/05/pagina6.php' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e716057a19125_37181763',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4a48fda0a47d11f156bf24148e8bb60fee5274f9' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/pagina6.php',
      1 => 1584487663,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e716057a19125_37181763 (Smarty_Internal_Template $_smarty_tpl) {
echo '<?php
';?>
require_once('include/DB.php');
require_once('include/Prueba.php');
require_once('include/libs/Smarty.class.php');

// Recuperamos la información de la sesión
session_start();

// Y comprobamos que el usuario se haya autentificado
if (!isset($_SESSION['usuario'])) 
    die("Error - debe <a href='login.php'>identificarse</a>.<br />");

// Cargamos la librería de Smarty
$smarty = new Smarty;
$smarty->template_dir = 'smarty/templates/';
$smarty->compile_dir = 'smarty/templates_c/';
$smarty->config_dir = 'smarty/configs/';
$smarty->cache_dir = 'smarty/cache/';

// Ponemos a disposición de la plantilla los datos necesarios
$smarty->assign('usuario', $_SESSION['usuario']);
$smarty->assign('pruebas', DB::obtienePruebas());


// Mostramos la plantilla
$smarty->display('pruebas6.tpl');     
<?php echo '?>';
}
}
