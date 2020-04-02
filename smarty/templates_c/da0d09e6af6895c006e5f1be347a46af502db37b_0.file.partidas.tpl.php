<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-02 10:12:58
  from '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/partidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e85baaacc4721_00174029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da0d09e6af6895c006e5f1be347a46af502db37b' => 
    array (
      0 => '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/partidas.tpl',
      1 => 1585817868,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listapartidas.tpl' => 1,
  ),
),false)) {
function content_5e85baaacc4721_00174029 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- CrimeBook: pagina2 -->
<html>
    <head>
	<title>Listado de Juegos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado de Juegos</a>
            <a href="pagina2.php" class="active">Listado de Partidas</a>
            <a href="pagina3.php">Listado de Pruebas</a>
            <a href="pagina4.php">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
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
        </div>
        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario'/>
            </form>
        </div>
    </body>    
</html><?php }
}
