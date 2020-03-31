<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-22 09:24:44
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/partida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7720cc2274f2_90289994',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2db4fdfd8e64e6341c65af7fbafd511240fefb84' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/partida.tpl',
      1 => 1584865417,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listapartida.tpl' => 1,
    'file:listaequipos.tpl' => 1,
  ),
),false)) {
function content_5e7720cc2274f2_90289994 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>
<head>
	<title>Crimebook</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>

	<div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado<br>de Juegos</a>
            <a href="pagina2.php">Listado<br>de Partidas</a>
            <a href="pagina3.php">Listado<br>de Pruebas</a>
            <a href="pagina4.php" class="active">Partida Nueva<br>Editar Partida</a>
            <a href="pagina5.php">Juego Nuevo<br>Editar Juego</a>
            <a href="pagina6.php">Prueba Nueva<br>Editar Prueba</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear Pista</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>

<br>
<p align="center">
<?php $_prefixVariable1 = 'editar';
$_smarty_tpl->_assignInScope('accion_pag4', $_prefixVariable1);
if ($_prefixVariable1) {?>
        Acceso para Editar una partida<br>
    Si desea Crear una partida nueva, acceda desde la Página  <a href="pagina1.php">Listado de Juegos</a> y pulse 'Nueva Partida'
<?php } else { ?>
        Acceso para crear una Nueva Partida<br>
    Si desea Editar una partida en uso, acceda desde la Página 'Listado de partidas'
<?php }?>
<br>

<form name="partida" action="pagina4.php" method="post">

<h1 align="center"><?php echo $_smarty_tpl->tpl_vars['partida']->value->getnombre_juego();?>
</h1>

<h2 align="center">Duración de la partida</h2>
<div id="partidas">
    <?php $_smarty_tpl->_subTemplateRender("file:listapartida.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php $_prefixVariable2 = 'editar';
$_smarty_tpl->_assignInScope('accion_pag4', $_prefixVariable2);
if ($_prefixVariable2) {?>
    <p align="center">
Puede modificar el 'Tiempo de Partida' en la celda 'Duración de la Partida'
</p><?php }?>

<h2 align="center">Datos sobre los Equipos</h2>
<div id="equipos">
    <?php $_smarty_tpl->_subTemplateRender("file:listaequipos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<br>

<p align="center">
Nombre del Equipo:<input type="text" align="center" name="nombre_equipo" placeholder="Introduzca el nombre"><br/>
</p>
<div align="center">
    <button class="button" name='partida_bt' value='anadir'>Añadir equipo a la partida</button>
    <button class="button" name='partida_bt' value='guardar'>Guardar partida</button>
</div>
<br>
</form>
</body>
</html><?php }
}
