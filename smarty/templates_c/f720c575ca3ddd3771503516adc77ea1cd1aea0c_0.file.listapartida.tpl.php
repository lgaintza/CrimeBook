<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-05 10:50:44
  from '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/listapartida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e89b804dd47b1_42218573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f720c575ca3ddd3771503516adc77ea1cd1aea0c' => 
    array (
      0 => '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/listapartida.tpl',
      1 => 1586081650,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e89b804dd47b1_42218573 (Smarty_Internal_Template $_smarty_tpl) {
?><table name="tabla_partida" align="center">
	<tr>
            <th>Nombre de la partida</th>
            <th>Duración de la partida</th>
	</tr>
        <br>
        <br>
	<tr>
                        <?php if (isset($_smarty_tpl->tpl_vars['export_accion']->value) && $_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
                <?php if (($_smarty_tpl->tpl_vars['partidanombre']->value !== null)) {?>
                    <td><?php echo $_smarty_tpl->tpl_vars['partidanombre']->value;?>
</td>
                <?php } else { ?> 
                    <td></td>
                <?php }?>
                <td>
                    <input name="celdatiempo" value=<?php echo $_smarty_tpl->tpl_vars['partidaduracion']->value;?>
>
                </td>
            <?php }?>
            <?php if (isset($_smarty_tpl->tpl_vars['export_accion']->value) && $_smarty_tpl->tpl_vars['export_accion']->value == "crear") {?>
                            <td width="100">
                    <input size="60" name="celdanombrepartida">
                </td>
                 <td width="80">
                    <input size="40" name="celdatiempo">
                </td>
            <?php }?>            
        </tr>
</table>
<?php }
}
