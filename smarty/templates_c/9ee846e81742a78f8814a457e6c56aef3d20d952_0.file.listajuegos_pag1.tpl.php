<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-23 20:02:53
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/listajuegos_pag1.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7907dd234092_34855544',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9ee846e81742a78f8814a457e6c56aef3d20d952' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/listajuegos_pag1.tpl',
      1 => 1584989090,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7907dd234092_34855544 (Smarty_Internal_Template $_smarty_tpl) {
?><table align="center">
    <tr>
        <th></th>
        <th>Nombre del juego</th>
        <th>Descripción</th>
        <th>N.º de pruebas</th>
        <th>Usuario que lo creó</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['juegos']->value, 'juego');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['juego']->value) {
?>
        <tr>    
            <td>
                <input type="radio" value="<?php echo $_smarty_tpl->tpl_vars['juego']->value->getid();?>
" name="grupo1">
            </td> 
            <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getnombre();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getdescBreve();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getnum_pru();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['juego']->value->getusername();?>
</td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php }
}
