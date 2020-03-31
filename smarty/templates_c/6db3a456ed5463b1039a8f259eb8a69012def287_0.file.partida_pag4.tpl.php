<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 06:38:37
  from '/home/etxea/NetBeansProjects/DWES/06_1/smarty/templates/partida_pag4.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7d915de1a284_82114929',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6db3a456ed5463b1039a8f259eb8a69012def287' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06_1/smarty/templates/partida_pag4.tpl',
      1 => 1585268742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listapartida.tpl' => 1,
    'file:listaequipos.tpl' => 1,
  ),
),false)) {
function content_5e7d915de1a284_82114929 (Smarty_Internal_Template $_smarty_tpl) {
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
<?php $_smarty_tpl->_assignInScope('export_accion', $_smarty_tpl->tpl_vars['accion_pag4']->value);?>
<p align="center">
<?php if ($_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
        <?php $_smarty_tpl->_assignInScope('textoboton1', "Añadir Equipo a la Partida Cargada");?>
    <?php $_smarty_tpl->_assignInScope('textoboton2', "Actualizar Tiempo para esta Partida");?>
    <?php $_smarty_tpl->_assignInScope('aviso1', "Puede modificar el 'Tiempo de Partida' en la celda 'Duración de la Partida'");?>
    Acceso para Editar una partida<br>
    Si desea Crear una partida nueva, acceda desde la Página  <a href="pagina1.php">Listado de Juegos</a> y pulse 'Nueva Partida'
<?php }
if ($_smarty_tpl->tpl_vars['export_accion']->value == "crear") {?>
        <?php $_smarty_tpl->_assignInScope('textoboton1', "Añadir Equipo a la Partida Creada");?>
    <?php $_smarty_tpl->_assignInScope('textoboton2', "Guardar Nueva Partida");?>
    <?php $_smarty_tpl->_assignInScope('aviso1', "Para Guardar Nueva Partida rellene celdas de Nombre, Duración y Equipo de la Partida<br> y Pulse Botón Guardar Nueva Partida");?>
    Acceso para Crear una Nueva Partida<br>
    Si desea Editar una Partida en uso, acceda desde la Página <a href="pagina2.php">Listado de Partidas</a> y pulse 'Editar Partida'
<?php }?>
<br>
<form name="partida" action="pagina4.php" method="post">    
<?php if ($_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
    <h1 align="center"><?php echo $_smarty_tpl->tpl_vars['partida4']->value->getnombre_juego4();?>
</h1>
<?php }
if ($_smarty_tpl->tpl_vars['export_accion']->value == "crear") {?>
    <h1 align="center"><?php echo $_smarty_tpl->tpl_vars['nombrejuego']->value;?>
</h1>
<?php }?>
<h2 align="center">Duración de la partida</h2>
<div id="partidas">
    <?php $_smarty_tpl->_subTemplateRender("file:listapartida.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php if ($_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
    <p align="center">
</p>
<?php }?>

<h2 align="center">Datos sobre los Equipos</h2>
<div id="equipos">
    <?php $_smarty_tpl->_subTemplateRender("file:listaequipos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<br>
<?php if ($_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
<p align="center">
Nombre del Equipo:<input type="text" align="center" name="nombre_equipo" placeholder="Introduzca el nombre"><br/>
</p>
<?php }
if ($_smarty_tpl->tpl_vars['export_accion']->value == "crear") {?>
<p align="center">
Para añadir Equipo a la Partida Creada, primero debe rellenar Tabla 'Duración de la Partida'
</p>
<p align="center">
Y despuñes pulse 'Guardar Nueva Partida'
</p>
<?php }?>
<div align="center">
    <button class="button" name='partida_bt' value='anadir'><?php echo $_smarty_tpl->tpl_vars['textoboton1']->value;?>
</button>
    <button class="button" name='partida_bt' value='guardar'><?php echo $_smarty_tpl->tpl_vars['textoboton2']->value;?>
</button>
</div>
<br>
</form>
</body>
</html><?php }
}
