<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-02 19:32:28
  from '/home/etxea/NetBeansProjects/DWES/dwes05_tarea/DWES05_Tienda_web/smarty/templates/ordenador.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e5d513c618b15_97909302',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3de354716664f648f81c82081f02ef6b48d6a0f2' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/dwes05_tarea/DWES05_Tienda_web/smarty/templates/ordenador.tpl',
      1 => 1583173005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e5d513c618b15_97909302 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 5 : Programación orientada a objetos en PHP -->
<!-- Ejemplo Tienda Web: productos.php -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Ejemplo Tema 5: Listado de Productos con Plantillas</title>
  <link href="tienda.css" rel="stylesheet" type="text/css">
</head>

<body class="pagproductos">

<div id="contenedor">
  <div id="encabezado">
        <h1><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getnombrecorto();?>
</h1>
    <h2>Código: <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getcodigo();?>
</h1>
</div>
    
 <div class="ordenador">
        <h3>Características:</h3>
    <p><?php echo $_smarty_tpl->tpl_vars['mi_nombre']->value;?>
</p>
    <p><b>Procesador:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getprocesador();?>
</p>
    <p><b>RAM:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getRAM();?>
 GB</p>
    <p><b>Tarjeta gráfica:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getgrafica();?>
</p>
    <p><b>Unidad óptica:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getunidadoptica();?>
</p>
    <p><b>Sistema operativo:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getso();?>
</p>
    <p><b>Otros:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getotros();?>
</p>
    <p><b>PVP:</b> <?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getpvp();?>
</p>
    <h3>Descripción:</h3>
    <p><?php echo $_smarty_tpl->tpl_vars['ordenador']->value->getdescripcion();?>
</p>
    </div>

  <div id="pie">
    <form action='productos.php' method='post'>
        <input type='submit' value='Volver Lista Productos'/>
    </form>        
  </div>
</div>
</body>
</html><?php }
}
