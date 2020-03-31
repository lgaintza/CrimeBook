<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 11:07:31
  from '/home/etxea/NetBeansProjects/DWES/CrimeBook/smarty/templates/listapartida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7dd063983e02_30186061',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7bc1d175f9b925b975037a3b5f70a6415f148e57' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/CrimeBook/smarty/templates/listapartida.tpl',
      1 => 1585222752,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7dd063983e02_30186061 (Smarty_Internal_Template $_smarty_tpl) {
?><table name="tabla_partida" align="center">
	<tr>
            <th>Nombre de la partida</th>
            <th>Duración de la partida</th>
	</tr>
        <br>
	<tr>
                        <?php if ($_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
                <td><?php echo $_smarty_tpl->tpl_vars['partidanombre']->value;?>
</td>
                <td>
                    <input name="celdatiempo" value=<?php echo $_smarty_tpl->tpl_vars['partidaduracion']->value;?>
>
                </td>
            <?php }?>
            <?php if ($_smarty_tpl->tpl_vars['export_accion']->value == "crear") {?>
                            <td>
                    <input name="celdanombrepartida">
                </td>
                <td>
                    <input name="celdatiempo">
                </td>
            <?php }?>            
        </tr>
</table><?php }
}
