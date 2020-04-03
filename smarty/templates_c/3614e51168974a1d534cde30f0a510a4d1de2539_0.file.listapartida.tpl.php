<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-03 11:58:45
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\listapartida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8708d5d51172_42362939',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3614e51168974a1d534cde30f0a510a4d1de2539' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\listapartida.tpl',
      1 => 1585907774,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8708d5d51172_42362939 (Smarty_Internal_Template $_smarty_tpl) {
?><table name="tabla_partida" align="center">
	<tr>
            <th>Nombre de la partida</th>
            <th>Duración de la partida</th>
	</tr>
        <br>
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
