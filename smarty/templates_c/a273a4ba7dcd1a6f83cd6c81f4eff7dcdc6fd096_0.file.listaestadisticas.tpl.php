<?php
/* Smarty version 3.1.34-dev-7, created on 2020-04-02 10:06:38
  from 'C:\xampp\htdocs\CrimeBook\crimeBook\smarty\templates\listaestadisticas.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e859d0e2b7a52_51210159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a273a4ba7dcd1a6f83cd6c81f4eff7dcdc6fd096' => 
    array (
      0 => 'C:\\xampp\\htdocs\\CrimeBook\\crimeBook\\smarty\\templates\\listaestadisticas.tpl',
      1 => 1585664039,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e859d0e2b7a52_51210159 (Smarty_Internal_Template $_smarty_tpl) {
?><form name="xxxx" action="<?php echo $_SERVER['PHP_SELF'];?>
" method="post">
<table align="center">
                <tr>
                        <th align="center" >Equipo</th>
                        <th align="center" >Id Juego</th>
                        <th align="center" >Fecha Inicio(partida)</th>
                        <th align="center" >Duración(partida)</th>
                        <th align="center">Tiempo de resolución</th>
                                                <th align="center">Intentos</th>
                </tr>

 <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['juegoest']->value, 'estadistica');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['estadistica']->value) {
?>

            <tr>   

                <td><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->getnombrequipo();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->getidjuego();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->getfechainicio();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->getduracion();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->gettiemporesolucion();?>
</td>
                <td><?php echo $_smarty_tpl->tpl_vars['estadistica']->value->getintentos();?>
</td>
            </tr>

    <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table>
</form><?php }
}
