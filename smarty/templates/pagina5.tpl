<!DOCTYPE html>
<html>
<head>
  <title>CrimeBook</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body class="pagpruebas">

  <div class="topnav" id="myTopnav">
            <a href="pagina1.php">Listado de Juegos</a>
            <a href="pagina2.php">Listado de Partidas</a>
            <a href="pagina3.php">Listado de Pruebas</a>
            <a href="pagina4.php">Partida Nueva/Editar</a>
            <a href="pagina5.php" class="active">Juego Nuevo/Editar</a>
            <a href="pagina6.php?variable=nuevaPruebaMenu">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
		<i class="fa fa-bars"></i>
            </a>
	</div>


  <div id="pag5" align="center">
    <!--esta es para editar el juego que ya esta creado -->
    <!--esta variable sustituye al isset pk no se como se hace en tpl el isset -->
  {if $hayNuevoJuego ==0} 

  <h2 align="left">Editar juego</h2>
  <p><form id='guardajuego' action='guardajuego.php' method='POST'>
    <strong>Nombre del juego: </strong><textarea  name="nombre" rows="1" cols="40" >{$juego->getnombre()}</textarea><br><br>
    <strong>Descripcion breve: </strong><textarea name="descBreve" rows="3" cols="50" >{$juego->getdescBreve()}</textarea><br><br>
    <strong>Descripcion extendida: </strong><textarea name="descExtendida" rows="6" cols="50" >{$juego->getdescExtendida()}</textarea><br>
      <!--El Codigo juego lo vamos a necesitar ahora mas que nunca porque necesitamos relacionar las pruebas con el juego que hayamos pasado para editar -->
      <input type='hidden' name='fechaCreacion' value='{$juego->getfechaCreacion()}'/>
      <input type='hidden' name='username' value='{$juego->getusername()}'/>
      
     <input type='hidden' name='codigojuego' value='{$juego->getid()}'/>
     <br>
     <br>
     <h3 align="left">Listado de pruebas para añadir al juego</h3>
    <table align="center">
    <tr>
      
       <!--Añadimos en la tabla todas las pruebas que hay disponibles -->
       <!--Es un check box con value el codigo de la prueba y con una etiqueta con su nombre para el usuario -->
       <!--La idea es que cuando pulsemos los check de añadir, cuando pasemos a la pagina de guardar, recogamos los input que se han pulsado y los añadamos a la tabla-->
        <!--La misma idea con los de borrar, si tenemos un juego que estamos editando y pulsamos en borrar, al pasar a la pantalla de borrar se eliminarán las pruebas que hayamos seleccionado del juego-->
       
      {foreach from=$listapruebas item=prueba}
      
        <input type="checkbox" name="new{$prueba->getid()}" 
        value="{$prueba->getid()}"><label>{$prueba->getnombre()}</label>
        <br>
      {/foreach}           
     
    </tr>
    </table>
    <br>
    <br>
    <h3>Eliminar pruebas del juego</h3>
    <table align="center">
        <tr>
        {foreach from=$listado item=prueba2}
        <input type="checkbox" name="del{$prueba2->getid()}" 
        value="{$prueba2->getid()}"><label>{$prueba2->getnombre()}</label>
        <br>
      {/foreach}    
    </tr>
  </table>
  <br>
  <br>
  <input type='submit' name='guardajuego' value='Guardar juego'/> 
  <input type='submit' value='Cancelar' />
  </form></p>

   <!--Esta parte es para crear un juego nuevo -->
  {else}
  <h2 align="left">Nuevo juego</h2>
  <p><form id='guardajuego' action='guardajuego.php' method='POST'>
     <strong>Nombre del juego: </strong><textarea name="nombre" rows="1" cols="40" placeholder="Introduzca el nombre"></textarea><br><br>
    <strong>Descripcion breve: </strong><textarea name="descBreve" rows="3" cols="50" placeholder="Introduzca una descripción breve"></textarea><br><br>
    <strong>Descripcion extendida: </strong><textarea name="descExtendida" rows="6" cols="50" placeholder="Introduzca una descripción extensa"></textarea><br></br>
      <input type='hidden' name='fechaCreacion' value='{$fechaCreacion}'/>
      <input type='hidden' name='username' value='{$username}'/>
      
       <h3 align="left">Listado de pruebas para añadir al juego</h3>
  <table align="center">
    <tr>
     
      {foreach from=$listapruebas item=prueba}
        <input type="checkbox" name="new{$prueba->getid()}" 
        value="{$prueba->getid()}"><label>{$prueba->getnombre()}</label>
        </br>
      {/foreach}           
    </tr>
  </table>
  </br>
  </br>
  <input type='submit' name='guardajuego' value='Guardar juego'/> 
  <input type='submit' value='Cancelar' />
  </form></p>
  {/if}
  
  <br>
</div>   
  

  <script>
  function myFunction() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
  </script>

</body>
</html>
   
