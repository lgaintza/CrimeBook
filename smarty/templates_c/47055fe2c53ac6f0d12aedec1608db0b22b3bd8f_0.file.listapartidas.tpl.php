<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-15 18:23:41
  from '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/listapartidas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6e649ddc9fb9_42596105',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '47055fe2c53ac6f0d12aedec1608db0b22b3bd8f' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/listapartidas.tpl',
      1 => 1584293011,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6e649ddc9fb9_42596105 (Smarty_Internal_Template $_smarty_tpl) {
?><table align="center">
	<tr>
            <th>Id partida</th>
            <th>Nombre de la partida</th>
            <th>Duración de la partida</th>
	</tr>
	<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getid_partida();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getnombre_partida();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getduracion();?>
</td>
        </tr>

</table><?php }
}
