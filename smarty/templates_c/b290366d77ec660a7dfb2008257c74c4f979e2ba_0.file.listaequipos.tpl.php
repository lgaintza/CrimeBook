<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-05 17:32:16
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\listaequipos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e89fa00a0f850_93976306',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b290366d77ec660a7dfb2008257c74c4f979e2ba' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\listaequipos.tpl',
      1 => 1586089538,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e89fa00a0f850_93976306 (Smarty_Internal_Template $_smarty_tpl) {
?><table align="center">
    <tr>
        <th>Nombre del Equipo</th>
        <th>Código de Accceso a la Partida</th>
    </tr>
                <?php if (isset($_smarty_tpl->tpl_vars['export_accion']->value) && $_smarty_tpl->tpl_vars['export_accion']->value == "editar") {?>
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
