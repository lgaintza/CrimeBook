<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-03 10:05:26
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\estadisticas_pag7.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e86ee46988c06_27484234',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '83e39d17d545981c239729ca1b7d27b1f04292c4' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\estadisticas_pag7.tpl',
      1 => 1585852367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listaestadisticas.tpl' => 1,
  ),
),false)) {
function content_5e86ee46988c06_27484234 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- CrimeBook: pagina8 -->
<html>
    <head>
	<title>Estadisticas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>

    <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php" >Listado de juegos</a>
            <a href="pagina2.php">Listado de partidas</a>
            <a href="pagina3.php">Listado de pruebas</a>
            <a href="pagina4.php">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php?variable=nuevaPruebaMenu">Prueba Nueva/Editar</a>
            <a href="pagina7.php" class="active">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>
        <div id="contenedor">
            <div id="encabezado">
                <h2 align="center">Estadisticas</h2>
            </div>
            <div id="pruebas">
                <?php $_smarty_tpl->_subTemplateRender("file:listaestadisticas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
        </div>
    </body>
    
</html><?php }
}
