<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-11 11:54:36
  from '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/listaproductos.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e68c36cc1b1b5_76422521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '30231a40cca0a925c0e90b957810eb3147eda030' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/05/smarty/templates/listaproductos.tpl',
      1 => 1583922165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e68c36cc1b1b5_76422521 (Smarty_Internal_Template $_smarty_tpl) {
?>    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['productos']->value, 'producto');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value) {
?>
        <p><form id='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
' action='productos.php' method='post'>
        <input type='hidden' name='cod' value='<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
'/>
        <input type='submit' name='enviar' value='Añadir'/>
                
        <?php if ($_smarty_tpl->tpl_vars['producto']->value->getfamilia() != "ORDENA") {?>
                <?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>

      <?php } else { ?>
                <a href="ordenador.php?codigo=<?php echo $_smarty_tpl->tpl_vars['producto']->value->getcodigo();?>
"><?php echo $_smarty_tpl->tpl_vars['producto']->value->getnombrecorto();?>
</a>
      <?php }?>: <?php echo $_smarty_tpl->tpl_vars['producto']->value->getPVP();?>
 euros.</form></p>
    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
