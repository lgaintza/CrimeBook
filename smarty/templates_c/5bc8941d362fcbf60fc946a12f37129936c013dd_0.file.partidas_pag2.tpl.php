<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-22 16:18:05
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/partidas_pag2.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7781ad3b4ea9_33483759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5bc8941d362fcbf60fc946a12f37129936c013dd' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/partidas_pag2.tpl',
      1 => 1584865440,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listapartidas.tpl' => 1,
  ),
),false)) {
function content_5e7781ad3b4ea9_33483759 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- crimeBook: pagina2 -->
<html>
    <head>
	<title>Listado de partidas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>

    <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado<br>de Juegos</a>
            <a href="pagina2.php" class="active">Listado<br>de Partidas</a>
            <a href="pagina3.php">Listado<br>de Pruebas</a>
            <a href="pagina4.php">Partida Nueva<br>Editar Partida</a>
            <a href="pagina5.php">Juego Nuevo<br>Editar Juego</a>
            <a href="pagina6.php">Prueba Nueva<br>Editar Prueba</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear Pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>
        <div id="contenedor">
            <div id="encabezado">
                <h2 align="center">Listado de partidas</h2>
            </div>
            <div id="pruebas">
                <?php $_smarty_tpl->_subTemplateRender("file:listapartidas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
            </div>
            <br>
            <div align="center">
                <a href="pagina4.php"><button class="button">Editar partida</button></a>
                <a href="pagina7.php"><button class="button">Estadíticas</button></a>
                <button class="button">Eliminar partida finalizada</button>
            </div>
            <br>
        </div>
    </body>
    
</html><?php }
}
