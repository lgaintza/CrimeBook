<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-27 00:48:34
  from '/home/etxea/NetBeansProjects/DWES/06_1/smarty/templates/login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e7d3f52c6aa35_61641812',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3db396337f601dbda0434148dedebe551bf9e2d3' => 
    array (
      0 => '/home/etxea/NetBeansProjects/DWES/06_1/smarty/templates/login.tpl',
      1 => 1585086882,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e7d3f52c6aa35_61641812 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN http://www.w3.org/TR/html4/loose.dtd">
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : CrimeBook -->
<!-- Desarrollo Back-End Aplicación Web CrimeBook -->
<html>
<head>
  <meta http-equiv="content-type" content="text/html; charset=UTF-8">
  <title>Desarrollo Back-End Aplicación Web CrimeBook</title>
  <link href="css/estilos.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id='login'>
    <form action='login.php' method='post'>
    <fieldset >
        <legend>Login</legend>
        <div><span class='error'><?php if (isset($_smarty_tpl->tpl_vars['error']->value)) {
echo $_smarty_tpl->tpl_vars['error']->value;
}?></span></div>
        <div class='campo'>
            <label for='usuario' >Usuario:</label><br/>
            <input type='text' name='usuario' id='usuario' maxlength="50" /><br/>
        </div>
        <div class='campo'>
            <label for='password' >Contraseña:</label><br/>
            <input type='password' name='password' id='password' maxlength="50" /><br/>
        </div>
        <br>
        <div class='campo'>
            <input type='submit' name='enviar' value='Enviar' class="button"/>
        </div>
    </fieldset>
    </form>
    </div>
</body>
</html><?php }
}
