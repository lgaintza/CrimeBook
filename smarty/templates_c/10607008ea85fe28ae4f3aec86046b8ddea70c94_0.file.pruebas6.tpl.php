<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-18 07:38:13
  from '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/pruebas6.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e71c1d54a3cc5_20792333',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10607008ea85fe28ae4f3aec86046b8ddea70c94' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/pruebas6.tpl',
      1 => 1584513477,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e71c1d54a3cc5_20792333 (Smarty_Internal_Template $_smarty_tpl) {
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
	 <a href="index.php">Listado de juegos</a>
	 <a href="pagina2.php">Listado de partidas</a>
	 <a href="pagina3.php">Listado de pruebas</a>
	 <a href="pagina4.php">Partida nueva</a>
	 <a href="pagina5.php">Juego Nuevo/editar juego</a>
	 <a href="pagina6.php" class="active">Prueba Nueva/ Editar prueba</a>
	 <a href="pagina7.php">Consultar partida</a>
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
