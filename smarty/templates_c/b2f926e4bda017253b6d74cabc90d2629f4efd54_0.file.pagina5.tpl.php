<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 11:40:37
  from '/home/etxea/NetBeansProjects/DWES/CrimeBook/smarty/templates/pagina5.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7dd8257e0941_57243029',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b2f926e4bda017253b6d74cabc90d2629f4efd54' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/CrimeBook/smarty/templates/pagina5.tpl',
      1 => 1585305535,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7dd8257e0941_57243029 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- crimeBook: pagina5 -->
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
            <a href="pagina5.php" class="active">Juego Nuevo/Editar</a>
            <a href="pagina6.php">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>

	
  <div id="pag5" align="center">
    <!--esta es para editar el juego que ya esta creado -->
  <?php if ($_smarty_tpl->tpl_vars['hayNuevoJuego']->value == 0) {?> 

  <h2 align="left">Editar Juego</h2>
  <p><form id='guardajuego' action='guardajuego.php' method='POST'>
    <strong>Nombre del juego: </strong><textarea  name="nombre" rows="1" cols="40" ><?php echo $_smarty_tpl->tpl_vars['juego']->value->getnombre();?>
</textarea><br><br>
    <strong>Descripcion breve:</strong><textarea name="descBreve" rows="3" cols="50" ><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreve();?>
</textarea><br><br>
    <strong>Descripcion extendida:</strong><textarea name="descExtendida" rows="6" cols="50" ><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescExtendida();?>
</textarea><br>
      <!--El Codigo juego lo vamos a necesitar ahora mas que nunca porque necesitamos relacionar las pruebas con el juego que hayamos pasado para editar -->
      <input type='hidden' name='fechaCreacion' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getfechaCreacion();?>
'/>
      <input type='hidden' name='username' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getusername();?>
'/>
      
     <input type='hidden' name='codigojuego' value='<?php echo $_smarty_tpl->tpl_vars['juego']->value->getid();?>
'/>
     <br>
     <br>
     <h3 align="left">Listado de pruebas para añadir al juego</h3>
    <table align="center">
    <tr>
      
       <!--Añadimos en la tabla todas las pruebas que hay disponibles -->
       <!--Es un check box con value el codigo de la prueba y con una etiqueta con su nombre para el usuario -->
       <!--La idea es que cuando pulsemos los check de añadir, cuando pasemos a la pagina de guardar, recogamos los input que se han pulsado y los añadamos a la tabla-->
        <!--La misma idea con los de borrar, si tenemos un juego que estamos editando y pulsamos en borrar, al pasar a la pantalla de borrar se eliminarán las pruebas que hayamos seleccionado del juego-->
       
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listapruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
        <input type="checkbox" name="new<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getid();?>
" 
        value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getid();?>
"><label><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getnombre();?>
</label>
        <br>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>           
     
    </tr>
    </table>
    <br>
    <br>
    <h3>Eliminar Pruebas del juego</h3>
    <table align="center">
        <tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listado']->value, 'prueba2');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba2']->value) {
?>
        <input type="checkbox" name="del<?php echo $_smarty_tpl->tpl_vars['prueba2']->value->getid();?>
" 
        value="<?php echo $_smarty_tpl->tpl_vars['prueba2']->value->getid();?>
"><label><?php echo $_smarty_tpl->tpl_vars['prueba2']->value->getnombre();?>
</label>
        <br>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>    
    </tr>
  </table>
  <br>
  <br>
  <input type='submit' name='guardajuego' value='guardajuego'/>
  </form></p>

   <!--Esta parte es para crear un juego nuevo -->
  <?php } else { ?>
  <h2 align="left">Nuevo Juego</h2>
  <p><form id='guardajuego' action='guardajuego.php' method='POST'>
     <strong>Nombre del juego: </strong><textarea name="nombre" rows="1" cols="40" placeholder="Introduzca el nombre"></textarea><br><br>
    <strong>Descripcion breve: </strong><textarea name="descBreve" rows="3" cols="50" placeholder="Introduzca una descripción breve"></textarea><br><br>
    <strong>Descripcion extendida: </strong><textarea name="descExtendida" rows="6" cols="50" placeholder="Introduzca una descripción extensa"></textarea><br></br>
      <input type='hidden' name='fechaCreacion' value='<?php echo $_smarty_tpl->tpl_vars['fechaCreacion']->value;?>
'/>
      <input type='hidden' name='username' value='<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
'/>
      
       <h3 align="left">Listado de pruebas</h3>
  <table align="center">
    <tr>
     
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listapruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
        <input type="checkbox" name="new<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getid();?>
" 
        value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getid();?>
"><label><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getnombre();?>
</label>
        </br>
      <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>           
    </tr>
  </table>
  </br>
  </br>
  <input type='submit' name='guardajuego' value='guardajuego'/>
  </form></p>
  <?php }?>
  
  <br>
</div>   
  

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

        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario'/>
            </form>
        </div>
    </body>    
</html>
<?php }
}
