<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- crimeBook: pagina4 -->
<html>
    <head>
	<title>Listado de Juegos</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado de Juegos</a>
            <a href="pagina2.php">Listado de Partidas</a>
            <a href="pagina3.php">Listado de Pruebas</a>
            <a href="pagina4.php" class="active">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php?variable=nuevaPruebaMenu">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>

{assign var="export_accion" value=$accion_pag4}
{if $accion_pag4 == 'editar'}
    {* Si la entrada es como 'EDITAR' se muestra: *}
    {foreach from=$partida4 item=partida}
        {assign var="partidanombre" value=$partida->getnombre()}
        {assign var="partidaduracion" value=$partida->getduracion()}
    {/foreach}
    {assign var="equipos4" value=$equipos4}
    {$textoboton1="Añadir Equipo a la Partida Cargada"}
    {$textoboton2="Actualizar Tiempo para esta Partida"}
    {$aviso1="Puede modificar el 'Tiempo de Partida' en la celda 'Duración de la Partida'"}
    <div align="center"><h2>Editar Partida</div>
{/if}
{if $accion_pag4==  'crear'}
    {* Si la entrada es como 'CREAR' se muestra: *}
    {$textoboton1="Antes de Añadir Equipo debe guardar la Partida Nueva"}
    {$textoboton2="Guardar Nueva Partida"}
    {$aviso1="Para Guardar Nueva Partida rellene celdas de Nombre y Duración<br> y Pulse Botón Guardar Nueva Partida"}
    <div align="center"><h2>Nueva Partida</div>
{/if}
{if $nombrejuego=='No hay Juego Seleccionado'}
   <h2 align="center">No hay Juego Seleccionado</h2>
{else}
    <div align="center"><h2>Juego: {$nombrejuego}</h2></div>
{/if}
{if $accion_pag4 == 'editar'}
    <div align="center">Si desea Crear una partida nueva, acceda desde la Página  <a href="pagina1.php">Listado de Juegos</a> y pulse 'Nueva Partida'</div>
{/if}
{if $accion_pag4==  'crear'}
    <div align="center">Si desea Editar una Partida en uso, acceda desde la Página <a href="pagina2.php">Listado de Partidas</a> y pulse 'Editar Partida'</div>
{/if}
<h2 align="center">Duración de la partida</h2>
<form name="partida" action="pagina4.php" method="post">
<div id="partidas">
    {include file="listapartida.tpl"}
</div>

<h2 align="center">Datos sobre los Equipos</h2>
<div id="equipos">
    {include file="listaequipos.tpl"}
</div>
<h3 align="center">
    Nombre del Equipo: <input {if $accion_pag4 == "crear"} disabled="true" {/if} style=" HEIGHT: 30px" type="text" size="100" align="center" name="nombre_equipo" placeholder="  Introduzca nombre de nuevo Equipo"><br/>
</h3>
{if $accion_pag4 == "crear"}
<p align="center" style="color: #999">
Para añadir Equipo a la Partida Creada, primero debe rellenar Tabla 'Duración de la Partida'<br>
y pulse 'Guardar Nueva Partida'
</p>
<div id="botonesirapag" align="center">
    Después de CREAR Partida,<br>
    <input type="radio" value="pag2" name="botonesirapag" checked="true">Ir a Mostrar Listado de Partidas<br>
    <input type="radio" value="pag4editar" name="botonesirapag">Pasar a Editar para meter Equipos en la nueva Partida creada<br>
    <input type="radio" value="pag4crear" name="botonesirapag">Seguir en Crear para poder añadir más Partidas<br>
</div>
{/if}
<br>
{if $nombrejuego!=='No hay Juego Seleccionado'}
<div align="center">
    <button {if $accion_pag4 == "crear"} disabled="true" {/if} class="button" name='partida_bt' value='anadir'>{$textoboton1}</button>
    <button class="button" name='partida_bt' value='guardar'>{$textoboton2}</button>
</div>
{else}
<div align="center">
    <button class="button" name='irapag1' value='irapag1'>Pulse para Ir a Página1 y Seleccionar un Juego</button>
 </div>   
{/if}
</form>
       <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario'/>
            </form>
        </div>
</body>    
</html>
