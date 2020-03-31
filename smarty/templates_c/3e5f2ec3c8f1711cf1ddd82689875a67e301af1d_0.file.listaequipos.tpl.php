<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 12:18:16
  from '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/listaequipos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7de0f8a40cb3_85933145',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3e5f2ec3c8f1711cf1ddd82689875a67e301af1d' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06/smarty/templates/listaequipos.tpl',
      1 => 1585307193,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7de0f8a40cb3_85933145 (Smarty_Internal_Template $_smarty_tpl) {
?><table align="center">
    <tr>
        <th>Nombre del Equipo</th>
        <th>Código de Accceso a la Partida</th>
    </tr>
                <?php if ($_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['equipos4']->value, 'equipo4');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['equipo4']->value) {
?>
                <tr>
                    <td><?php echo $_smarty_tpl->tpl_vars['equipo4']->value->getnombre();?>
</td>                    
                    <td><?php echo $_smarty_tpl->tpl_vars['equipo4']->value->getcodigo();?>
</td>
                </tr>              
            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>             
            
        <?php } else { ?>
            <tr>
                <td>
                    <br>
                </td>
                <td>                   
                </td>
            </tr>
        <?php }?>
</table>
<?php }
}
