<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-09 15:47:01
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\crearPista_pag8.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8f2755043208_56221157',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '84816e5207fbd9d144fa91aadd921eb2544b5590' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\crearPista_pag8.tpl',
      1 => 1586439705,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8f2755043208_56221157 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- CrimeBook: pagina8 -->
<html>
    <head>
	<title>Crear Pista</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>

<body class="crearpistas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado de Juegos</a>
            <a href="pagina2.php">Listado de Partidas</a>
            <a href="pagina3.php">Listado de Pruebas</a>
            <a href="pagina4.php">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php?variable=nuevaPruebaMenu">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php" class="active">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>

            </a>

	</div>
     
    
    <form action='pagina8.php' method='POST' style="text-align:center;">
    <fieldset >
    <h3>Nueva pista: </h3>
    
        <div class='campo'>
            <label for='idPrueba'>idPrueba: </label>
            <?php if (isset($_smarty_tpl->tpl_vars['idPrueba']->value)) {?>
            <?php echo $_smarty_tpl->tpl_vars['idPrueba']->value;?>

            <input type="hidden" name="idPrueba" value='<?php echo $_smarty_tpl->tpl_vars['idPrueba']->value;?>
'>
            <?php } else { ?>
                                            <select  name="idPrueba">
                                                                <option selected value="0"> Seleccione una prueba...</option>
                                                                <option value="400001">400001</option>
                                                                <option value="400002">400002</option>
                                                                <option value="400003">400003</option>
                                                                <option value="400004">400004</option>
                                                                <option value="400005">400005</option>
                                                                <option value="400006">400006</option>
                                                                <option value="400007">400007</option>
                                                                <option value="400008">400008</option>
                                                                </select>

            <?php }?>

            <br><br>
      </div>

         <div class='campo'>
            <label for='texto' >texto:</label>
            <textarea  name='texto' rows="2" cols="30"></textarea>
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
            <br/><input type='submit' name='cancelar' value='Cancelar' />
        </div>
    </fieldset>
    </form>
  <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario'/>
            </form>
        </div>
</body>
</html>
<?php }
}
