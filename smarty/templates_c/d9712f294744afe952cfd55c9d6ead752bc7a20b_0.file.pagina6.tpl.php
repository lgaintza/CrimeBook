<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-05 19:13:48
  from 'C:\xampp\htdocs\crimebook\Crimebook interfaces\crimeBook\smarty\templates\pagina6.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8a11cc972fd6_16512022',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd9712f294744afe952cfd55c9d6ead752bc7a20b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\crimebook\\Crimebook interfaces\\crimeBook\\smarty\\templates\\pagina6.tpl',
      1 => 1586106413,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8a11cc972fd6_16512022 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!DOCTYPE html>
<html>
<head>
	<title>CrimeBook</title>
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
            <a href="pagina6.php?variable=nuevaPruebaMenu" class="active">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear Pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
            </a>
            
	</div>


	<div id="pag6" align="center"  >

	<?php if ($_smarty_tpl->tpl_vars['hayNuevaPrueba']->value == 0) {?>
	<h2 align="left">Editar prueba</h2>
<form action="pagina6.php" method="POST" >
<p>Nombre: <input type="text" size="60" name="nombre" value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getnombre();?>
"></p>
<p>URL: <input type="text" name="url" size="60" value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->geturl();?>
"></p>
<p>Descripción breve: <textarea cols="50" rows="5" name="descripcionbreve"><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getdescBreve();?>
 </textarea></p>
<p>Descripción extendida/Enunciado de la prueba: <textarea cols="50" rows="10" name="descripcionextendida"><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getdescExtendida();?>
 </textarea></p>
<p>
		Tipo: <select name="tipo">
				<option <?php if ($_smarty_tpl->tpl_vars['prueba']->value->gettipo() == "Prueba Normal") {?> selected <?php }?> value="Prueba Normal">Normal</option>
				<option <?php if ($_smarty_tpl->tpl_vars['prueba']->value->gettipo() == "Prueba Final") {?> selected <?php }?> value="Prueba Final">Final</option>
		</select>
</p>
<p>
		Dificultad: <select name="dificultad">
				<option <?php if ($_smarty_tpl->tpl_vars['prueba']->value->getdificultad() == "Facil") {?> selected <?php }?> value="Facil">Facil</option>
				<option <?php if ($_smarty_tpl->tpl_vars['prueba']->value->getdificultad() == "Normal") {?> selected <?php }?> value="Normal">Normal</option>
				<option <?php if ($_smarty_tpl->tpl_vars['prueba']->value->getdificultad() == "Dificil") {?> selected <?php }?> value="Dificil">Dificil</option>
		</select>
</p>

<p>Ayuda final: <input type="text" name="ayudaFinal"value="<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getayudaFinal();?>
" > </p>
<input type='hidden' name='username' value='<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getusername();?>
'/>

<p>Añadir Solucion: <textarea cols="50" rows="5" name="anadirsolucion"></textarea></p>
 <input type='submit' value='Anadir Solucion' name='anadir'/>
 <input type="hidden" name="arrayrespuestas">
<br>
<br>	


<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Respuestas / Soluciones</th>	
	</tr>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['respuestas']->value, 'respuesta');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['respuesta']->value) {
?>
            <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['respuesta']->value;?>
 </td>
            </tr>
           
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>           
        
</table>
<br>

<input type='submit' value='Añade pista' name='anadePista'/> 
<input type='submit' value='Eliminar Pista' name='delPista'/><br><br>
<!--<input type='hidden' name='codigoprueba' value='<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getid();?>
'/> -->

<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Pistas</th>	
	</tr>
		<?php if ($_smarty_tpl->tpl_vars['hayPistas']->value == 1) {?>
          <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listaPistas']->value, 'pista');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['pista']->value) {
?>
            <tr>
             <td>

             	<input type="checkbox" name="del<?php echo $_smarty_tpl->tpl_vars['pista']->value->getid();?>
"value="<?php echo $_smarty_tpl->tpl_vars['pista']->value->getid();?>
"><label><?php echo $_smarty_tpl->tpl_vars['pista']->value->gettexto();?>
 </label> 
             </td>
            
            </tr>
           
          <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>   
        <?php }?>        
        
</table>
<br>

 <input type='submit' value='Guardar Prueba' name='guardarPrueba'/> 
 <input type='submit' name="cancelar" value='Cancelar'/>
</form>



<?php } else { ?>
<h2 align="left">Nueva prueba</h2>
<p><form id='guardaprueba' action='pagina6.php' method='POST'>
<p>
	Nombre: <input type="text" size="60" name="nombre" placeholder="Introduzca el nombre">
</p>
<p>
	URL: <input type="text" size="60" name="url" placeholder="Introduzca la URL">
</p>
	<p>
	Descripción breve: <textarea cols="50" rows="5" name="descripcionbreve" placeholder="Introduzca una descripción breve"></textarea>
	</p>
	<p>
Descripción extendida/Enunciado de la prueba: <textarea cols="50" rows="10" name="descripcionextendida" placeholder="Introduzca una descripción extensa"></textarea>
	</p>
	<p>
		Tipo: <select name="tipo">
				<option value="Prueba Normal">Normal</option>
				<option value="Prueba Final">Final</option>
				</select>
	</p>
<p>
		Dificultad: <select  name="dificultad">
				<option value="F">Facil</option>
				<option value="N">Normal</option>
				<option value="D">Dificil</option>
		</select>
</p>

<p>Ayuda final: <input type="text" name="ayudaFinal"></p>
<input type='hidden' name='username' value='<?php echo $_smarty_tpl->tpl_vars['username']->value;?>
'/>
 

<p>Añadir Solucion:<textarea cols="50" rows="5" name="anadirsolucion"></textarea></p>

 <input type='submit' value='Añadir Solucion' name='anadir'/><br><br>
 
<br><br>
<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Repuestas / Soluciones</th>         
            
    </tr>
		
</table>
<br>
 <input type='submit' value='Añade pista' name='anadePista'/> 


<br><br>

<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Listado de Pistas</th>       
                        
                 
    </tr>
		
</table>
<br>
<input type='submit' value='Guardar Prueba' name='guardarPrueba'/> 
<input type='submit' name="cancelar" value='Cancelar'/>
</form>


<?php }?>

		
<br>
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
