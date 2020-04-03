<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-03 10:09:26
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\crearPista_pag8.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e86ef36cdf342_49876404',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84816e5207fbd9d144fa91aadd921eb2544b5590' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\crearPista_pag8.tpl',
      1 => 1585852346,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e86ef36cdf342_49876404 (Smarty_Internal_Template $_smarty_tpl) {
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

<body class="crearpistas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado<br>de Juegos</a>
            <a href="pagina2.php">Listado<br>de Partidas</a>
            <a href="pagina3.php">Listado<br>de Pruebas</a>
            <a href="pagina4.php">Partida Nueva<br>Editar Partida</a>
            <a href="pagina5.php">Juego Nuevo<br>Editar Juego</a>
            <a href="pagina6.php?variable=nuevaPruebaMenu">Prueba Nueva<br>Editar Prueba</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php" class="active">Crear Pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>
     
    
    <form action='pagina8.php' method='post'style="text-align:center;">
    <fieldset >
    <h3>Nueva pista: </h3>
    
        <div class='campo'>
            <label for='idPrueba'>idPrueba: </label>
            <input type='checkbox' name='idPrueba' value='<?php echo $_smarty_tpl->tpl_vars['idPrueba']->value;?>
'> <?php echo $_smarty_tpl->tpl_vars['idPrueba']->value;?>

            <br><br>
        </div>
        <div class='campo'>
            <label for='id' >id:<span style="color:red;">*</span></label><select  name="id">
                                                                <option selected value="0"> Seleccione una pista...</option>
                                                                <option value="600001">600001</option>
                                                                <option value="600002">600002</option>
                                                                <option value="600003">600003</option>
                                                                <option value="600004">600004</option>
                                                                <option value="600005">600005</option>
                                                                <option value="600006">600006</option>
                                                                <option value="600007">600007</option>
                                                                <option value="600008">600008</option>
                                                                <option value="600009">600009</option>
                                                                <option value="600010">600010</option>
                                                            </select>
            <br><br>
        </div>
         <div class='campo'>
            <label for='texto' >texto:</label>
            <input type='text' name='texto' maxlength="50" />
            <br><br>
        </div>
         <div class='campo'>
            <label for='tiempo' >tiempo:</label>
            <input type='number' name='tiempo' maxlength="50" />
            <br><br>
        </div>
         <div class='intentos'>
            <label for='id' >intentos:</label>
            <input type='number' name='intentos' maxlength="50" />
            <br><br>
        </div>
        <div class='campo'>
            <br/><input type='submit' name='guardar' value='Guardar' /><br/>
        </div>

         <div class='campo'>
            <br/><input type='reset' name='cancelar' value='Cancelar' />
        </div>
    </fieldset>
    </form>

</body>
</html><?php }
}
