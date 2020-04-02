<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-02 09:01:56
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\listapartidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e858de43ad9b0_88955738',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bdc53da69f9811ea24bc5feeb670cf7d9d1f2279' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\listapartidas.tpl',
      1 => 1585664039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e858de43ad9b0_88955738 (Smarty_Internal_Template $_smarty_tpl) {
?><div align="center"><h2>Juego: <?php echo $_smarty_tpl->tpl_vars['mijuego']->value;?>
.</div>
<form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
    <table align="center">
        <tr>
            <th>Seleccionar partida</th>
            <th>Nombre de la partida</th>
            <th>N.º de equipos</th>
            <th>Fecha de creación</th>
            <th>Usuario que lo creó</th>
            <th>Finalizada</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['partidas']->value, 'partida');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['partida']->value) {
?>
                            <tr>    
                    <td>
                        <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['partida']->value->getid();?>
" name="idPartida">
                    </td> 
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getnombre();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getnum_equipospartida();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getfechaCreacion();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getusername();?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getfinalizada();?>
</td>
                </tr>
                    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    <div align="center">
        <br><br>
        <input type="submit" value="Editar partida" name="editarpartida">
        <input type="submit" value="Estadísticas" name="estadisticas">
        <input type="submit" value="Eliminar partida finalizada" name="eliminarpartida">
    </div>
    <div><span class='error'><?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {
echo $_smarty_tpl->tpl_vars['error']->value;
}?></span></div>
</form>


<?php }
}
