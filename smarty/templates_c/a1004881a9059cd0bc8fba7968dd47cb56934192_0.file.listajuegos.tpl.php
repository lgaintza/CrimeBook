<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-02 18:04:25
  from '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/listajuegos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8629293916d0_39140898',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1004881a9059cd0bc8fba7968dd47cb56934192' => 
    array (
      0 => '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/listajuegos.tpl',
      1 => 1585850644,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8629293916d0_39140898 (Smarty_Internal_Template $_smarty_tpl) {
?><form action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
    <table align="center">
        <tr>
            <th>Seleccionar juego</th>
            <th>Nombre del juego</th>
            <th>Descripción</th>
            <th>N.º de pruebas</th>
            <th>Usuario que lo creó</th>
            <th style="color: white">¿Eliminar Juegos?</th>
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
