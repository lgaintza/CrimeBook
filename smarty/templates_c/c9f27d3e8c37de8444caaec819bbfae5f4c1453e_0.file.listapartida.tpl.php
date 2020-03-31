<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 06:38:38
  from '/home/etxea/NetBeansProjects/DWES/06_1/smarty/templates/listapartida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7d915e1a6510_70830665',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c9f27d3e8c37de8444caaec819bbfae5f4c1453e' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06_1/smarty/templates/listapartida.tpl',
      1 => 1585268742,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7d915e1a6510_70830665 (Smarty_Internal_Template $_smarty_tpl) {
?><table name="tabla_partida" align="center">
	<tr>
            <th>Nombre de la partida</th>
            <th>Duración de la partida</th>
	</tr>
	<tr>
                        <?php if ($_smarty_tpl->tpl_vars['accion_pag4']->value == "editar") {?>
                <td><?php echo $_smarty_tpl->tpl_vars['partida4']->value->getnombre_partida4();?>
</td>
                <td>
                    <input name="celdatiempo" value=<?php echo $_smarty_tpl->tpl_vars['partida4']->value->getduracion4();?>
>
                </td>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['accion_pag4']->value == "crear") {?>
                            <td>
                    <input width="100%" name="celdanombreequipo">
                </td>
                <td>
                    <input width="100%" name="celdatiempo">
                </td>
            <?php }?>            
        </tr>
</table><?php }
}
