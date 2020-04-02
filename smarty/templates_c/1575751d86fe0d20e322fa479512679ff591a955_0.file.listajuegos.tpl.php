<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-02 08:59:57
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\listajuegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e858d6de26346_99914232',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1575751d86fe0d20e322fa479512679ff591a955' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\listajuegos.tpl',
      1 => 1585664039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e858d6de26346_99914232 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
    <table align="center">
        <tr>
            <th>Seleccionar juego</th>
            <th>Nombre del juego</th>
            <th>Descripción</th>
            <th>N.º de pruebas</th>
            <th>Usuario que lo creó</th>
            <th>¿Eliminar Juegos?</th>
        </tr>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['juegos']->value, 'juego');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['juego']->value) {
?>
            <tr>    
                <td>
                    <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['juego']->value->getid();?>
" name="idJuego">
                </td> 
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getnombre();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreve();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getnum_pru();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getusername();?>
</td>
                <td>
                    <input type="checkbox" id="juego" name="juego[]" value="<?php echo $_smarty_tpl->tpl_vars['juego']->value->getid();?>
">
                </td>    
            </tr>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </table>
    <div align="center">
        <br><br>
        <input type="submit" value="Nueva partida" name="nuevapartida" class="button" >
        <input type="submit" value="Nuevo juego" name="nuevojuego" class="button" >
        <input type="submit" value="Editar juego" name="editarjuego" class="button" >
        <input type="submit" value="Ver partidas" name="verpartidas" class="button" >
        <input type="submit" value="Eliminar juego/s" name="eliminarjuego" class="button" >
    </div>
</form><?php }
}
