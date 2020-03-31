<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-17 08:09:46
  from '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/partida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7077bae39fb6_85278779',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a113f4b3e2920db52abf5f72080b474748f775c5' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/partida.tpl',
      1 => 1584428967,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listapartidas.tpl' => 1,
    'file:listaequipos.tpl' => 1,
  ),
),false)) {
function content_5e7077bae39fb6_85278779 (Smarty_Internal_Template $_smarty_tpl) {
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
	 <a href="index.php">Listado de juegos</a>
	 <a href="pagina2.php">Listado de partidas</a>
	 <a href="pagina3.php">Listado de pruebas</a>
	 <a href="pagina4.php" class="active">Partida nueva</a>
	 <a href="pagina5.php">Juego Nuevo/editar juego</a>
	 <a href="pagina6.php">Prueba Nueva/ Editar prueba</a>
	 <a href="pagina7.php">Consultar partida</a>
	 <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		 <i class="fa fa-bars"></i>
	 </a>
	</div>
<h1 align="center"><?php echo $_smarty_tpl->tpl_vars['partida']->value->getnombre_juego();?>
</h1>

<h2 align="center">Duración de la partida</h2>
<div id="partidas">
    <?php $_smarty_tpl->_subTemplateRender("file:listapartidas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<h2 align="center">Datos sobre los Equipos</h2>
<div id="equipos">
    <?php $_smarty_tpl->_subTemplateRender("file:listaequipos.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>

<br>

<form action="" method="" >
<p align="center">
Nombre del Equipo:<input type="text" align="center" name="nombre" placeholder="Introduzca el nombre"><br/>
</p>
<div align="center">
<button class="button">Añadir equipo a la partida</button>
<button class="button">Guardar partida</button>
</div>
</form>

<?php echo '<script'; ?>
>
function myFunction() {
  var x = document.getElementById("myTopnav");
  if (x.className === "topnav") {
    x.className += " responsive";
  } else {
    x.className = "topnav";
  }
}
<?php echo '</script'; ?>
>

</body>
</html><?php }
}
