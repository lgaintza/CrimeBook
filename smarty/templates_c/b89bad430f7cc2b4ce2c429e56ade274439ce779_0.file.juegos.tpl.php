<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-14 11:35:43
  from '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/juegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6cb37f49ce22_75435694',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b89bad430f7cc2b4ce2c429e56ade274439ce779' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/juegos.tpl',
      1 => 1584182137,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listajuegos.tpl' => 1,
  ),
),false)) {
function content_5e6cb37f49ce22_75435694 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>Crimebook</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

        <body class="pagjuegos">
        <div class="topnav" id="myTopnav">
	 <a href="index.php" class="active">Listado de juegos</a>
	 <a href="pagina2.php">Listado de partidas</a>
	 <a href="pagina3.php">Listado de pruebas</a>
	 <a href="pagina4.php">Partida nueva</a>
	 <a href="pagina5.php">Juego Nuevo/editar juego</a>
	 <a href="pagina6.php">Prueba Nueva/ Editar prueba</a>
	 <a href="pagina7.php">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>

<div id="contenedor">
  <div id="encabezado">
    <h2 align="center">Juegos</h2>
  </div>
    
    <div id="juegos">
    <?php $_smarty_tpl->_subTemplateRender("file:listajuegos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
  </div>
  
  
</div>
</body>
</html><?php }
}
