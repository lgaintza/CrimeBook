<?php
/* Smarty version 3.1.34-dev-7, created on 2020-03-31 17:38:43
  from 'C:\xampp\htdocs\crimebook\Crimebook interfaces\crimeBook\smarty\templates\login.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5e836403dc84c2_60644395',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b29fe4be2c1d31c5290e7e44ebf60e72a90f5a72' => 
    array (
      0 => 'C:\\xampp\\htdocs\\crimebook\\Crimebook interfaces\\crimeBook\\smarty\\templates\\login.tpl',
      1 => 1585524912,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5e836403dc84c2_60644395 (Smarty_Internal_Template $_smarty_tpl) {
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
