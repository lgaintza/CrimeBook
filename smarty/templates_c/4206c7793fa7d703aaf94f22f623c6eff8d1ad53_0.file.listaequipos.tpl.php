<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-15 15:26:37
  from '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/listaequipos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e6e3b1da40665_96611261',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4206c7793fa7d703aaf94f22f623c6eff8d1ad53' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/listaequipos.tpl',
      1 => 1584282378,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e6e3b1da40665_96611261 (Smarty_Internal_Template $_smarty_tpl) {
?><table align="center">
	<tr>
            <th>Nombre del equipo</th>
            <th>Código de acceso a la partida</th>
	</tr>
	<tr>
            <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getnombre_equipo();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['partida']->value->getcodigo();?>
</td>
        </tr>

</table><?php }
}
