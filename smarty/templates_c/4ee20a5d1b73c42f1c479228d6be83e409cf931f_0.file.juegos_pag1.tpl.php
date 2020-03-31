<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-23 20:02:52
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/juegos_pag1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7907dcf1ed42_37932935',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4ee20a5d1b73c42f1c479228d6be83e409cf931f' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/juegos_pag1.tpl',
      1 => 1584989832,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listajuegos_pag1.tpl' => 1,
  ),
),false)) {
function content_5e7907dcf1ed42_37932935 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a href="pagina1.php" class="active">Listado<br>de Juegos</a>
            <a href="pagina2.php">Listado<br>de Partidas</a>
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
    <h2 align="center">Juegos</h2>
  </div>
    <form name="xxx" action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
        <div id="juegos">
            <?php $_smarty_tpl->_subTemplateRender("file:listajuegos_pag1.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        </div>
        <br>
        <div align="center">                
            <button class="button" name='pag1_bt' value='nuevapartida'>Nueva Partida</button>
            <button class="button" name='pag1_bt' value='nuevojuego'>Nuevo Juego</button>
            <button class="button" name='pag1_bt' value='editarjuego'>Editar Juego</button>                
            <button class="button" name='pag1_bt' value='verpartidas'>Ver Partidas</button>
            <button class="button" name='pag1_bt' value='eliminarjuego'>Eliminar Juego</button>
            <br>
        </div>






    </form>
  
</div>
</body>
</html><?php }
}
