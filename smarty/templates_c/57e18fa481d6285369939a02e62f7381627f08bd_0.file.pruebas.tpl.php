<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-17 08:26:28
  from '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/pruebas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e707ba4723d62_54543570',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '57e18fa481d6285369939a02e62f7381627f08bd' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/pruebas.tpl',
      1 => 1584429951,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:listapruebas.tpl' => 1,
  ),
),false)) {
function content_5e707ba4723d62_54543570 (Smarty_Internal_Template $_smarty_tpl) {
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
            <a href="pagina3.php" class="active">Listado de pruebas</a>
            <a href="pagina4.php">Partida nueva</a>
            <a href="pagina5.php">Juego Nuevo/editar juego</a>
            <a href="pagina6.php">Prueba Nueva/ Editar prueba</a>
            <a href="pagina7.php">Consultar partida</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
            <i class="fa fa-bars"></i>
            </a>
        </div>
        <form name="pru" action="pagina3.php" method="post">
            <div id="contenedor">
                <div id="encabezado">
                    <h2 align="center">Pruebas</h2>
                </div>
                <div id="pruebas">
                    <?php $_smarty_tpl->_subTemplateRender("file:listapruebas.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
                </div>
                <br>
                <div align="center">                
                    <button class="button" name='pru_bt' value='crear'>Crear prueba</button>
                    <button class="button" name='pru_bt' value='duplicar'>Duplicar prueba</button>
                    <button class="button" name='pru_bt' value='editar'>Editar prueba</button>                
                    <button class="button" name='pru_bt' value='eliminar'>Eliminar prueba</button>
                    <br>
                </div>
                <br>
            </div>
        </form>        
    </body>
</html><?php }
}
