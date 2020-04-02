<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-30 16:56:09
  from '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/listapruebas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e8224a9bfba09_01140921',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9c0e45e9e4cf4c57e011d2240e6b41615867f1b8' => 
    array (
      0 => '/Applications/MAMP/htdocs/DWES/UT6/git/crimeBook/smarty/templates/listapruebas.tpl',
      1 => 1585577408,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e8224a9bfba09_01140921 (Smarty_Internal_Template $_smarty_tpl) {
?><table align="center">
    <tr>
        <th></th>
        <th>Nombre Prueba</th>
        <th>Descripción</th>
        <th>Tipo</th>
        <th>Usuario que la creó</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['pruebas']->value, 'prueba');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['prueba']->value) {
?>
        <tr>
            <td>
                <input type="radio" name="pru_id" value=<?php echo $_smarty_tpl->tpl_vars['prueba']->value->getid();?>
>
            </td>
            <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getnombre();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getdescBreve();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->gettipo();?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['prueba']->value->getusername();?>
</td>
        </tr>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
<?php }
}
