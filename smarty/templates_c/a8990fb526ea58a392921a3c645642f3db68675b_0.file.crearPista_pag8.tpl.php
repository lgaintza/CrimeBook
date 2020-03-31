<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 11:40:48
  from '/home/etxea/NetBeansProjects/DWES/CrimeBook/smarty/templates/crearPista_pag8.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7dd830a51582_83809424',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8990fb526ea58a392921a3c645642f3db68675b' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/CrimeBook/smarty/templates/crearPista_pag8.tpl',
      1 => 1585305527,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7dd830a51582_83809424 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- crimeBook: pagina8 -->
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
            <a href="pagina2.php">Listado de Partidas</a>
            <a href="pagina3.php">Listado de Pruebas</a>
            <a href="pagina4.php">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php" class="active">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>
     
   
    <form action='pagina8.php' method='post'>
    <fieldset >
        <br/>
        <div class='campo'>
            <label for='idPrueba' >idPrueba:</label>
            <input type='text' name='idPrueba' maxlength="50" /><br/><br/>
        </div>
        <div class='campo'>
            <label for='id' >id:</label>
            <input type='text' name='id' maxlength="50" /><br/><br/>
        </div>
         <div class='campo'>
            <label for='texto' >texto:</label>
            <input type='text' name='texto' maxlength="50" /><br/><br/>
        </div>
         <div class='campo'>
            <label for='tiempo' >tiempo:</label>
            <input type='text' name='tiempo' maxlength="50" /><br/><br/>
        </div>
         <div class='intentos'>
            <label for='id' >intentos:</label>
            <input type='text' name='intentos' maxlength="50" /><br/><br/>
        </div>
<br>
        <div class='campo'>
            <input type='submit' name='guardar' value='Guardar'/>
            <input type='reset' name='cancelar' value='Cancelar'/>
        </div>
    </fieldset>
    </form>
<br>
        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario'/>
            </form>
        </div>
    </body>    
</html>
<?php }
}
