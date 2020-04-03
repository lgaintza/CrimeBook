<!DOCTYPE html>
<!-- Desarrollo Web en Entorno Servidor -->
<!-- Tema 6 : Aplicación completa CrimeBook -->
<!-- crimeBook: pagina3 -->
<html>
    <head>
	<title>Listado de Pruebas</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body class="pagpruebas">
        <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado de Juegos</a>
            <a href="pagina2.php">Listado de Partidas</a>
            <a href="pagina3.php"class="active">Listado de Pruebas</a>
            <a href="pagina4.php">Partida Nueva/Editar</a>
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php?variable=nuevaPruebaMenu">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>
        <form name="pru" action="pagina3.php" method="post">
            <div id="contenedor">
                <div id="encabezado">
                    <h2 align="center">Listado de pruebas</h2>
                </div>
                <div id="pruebas">
                    {include file="listapruebas.tpl"}
                </div>
                <br>
                <div align="center">                
                    <button class="button" name='pru_bt' value='crear'>Crear Prueba</button>
                    <button class="button" name='pru_bt' value='duplicar'>Duplicar Prueba</button>
                    <button class="button" name='pru_bt' value='editar'>Editar Prueba</button>                
                    <button class="button" name='pru_bt' value='eliminar'>Eliminar Prueba</button>
                    <br>
                </div>
                <br>
            </div>
        </form>        
        <div id="pie">
            <form action='logoff.php' method='post'>
                <input type='submit' name='desconectar' value='Desconectar usuario'/>
            </form>
        </div>
    </body>    
</html>
