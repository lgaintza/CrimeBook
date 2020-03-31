<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-22 09:24:53
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/pruebas6.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7720d52ae5d5_54740051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '60913769b2927a6da63388fc451093205ec4b143' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/pruebas6.tpl',
      1 => 1584865354,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7720d52ae5d5_54740051 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>Crimebook</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

        <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado<br>de Juegos</a>
            <a href="pagina2.php">Listado<br>de Partidas</a>
            <a href="pagina3.php">Listado<br>de Pruebas</a>
            <a href="pagina4.php">Partida Nueva<br>Editar Partida</a>
            <a href="pagina5.php">Juego Nuevo<br>Editar Juego</a>
            <a href="pagina6.php" class="active">Prueba Nueva<br>Editar Prueba</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear Pista</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>





<div id="contenedor">

    
    <div id="pruebas">
    Acción: <?php echo $_smarty_tpl->tpl_vars['accion']->value;?>
<br>
    Id Prueba: <?php echo $_smarty_tpl->tpl_vars['id_pru']->value;?>

  </div>
    



</div>
</body>
</html><?php }
}
