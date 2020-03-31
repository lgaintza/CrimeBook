<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 12:18:16
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/listapartida.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7de0f8743182_88516955',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '17db4b73597e9fbcf91b3e0457abe51dc809a09d' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/listapartida.tpl',
      1 => 1585307159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7de0f8743182_88516955 (Smarty_Internal_Template $_smarty_tpl) {
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
                            <td>
                    <input width="100%" name="celdanombrepartida">
                </td>
                <td>
                    <input width="100%" name="celdatiempo">
                </td>
            <?php }?>            
        </tr>
</table><?php }
}
