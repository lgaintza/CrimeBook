
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
            <a href="pagina5.php">Juego Nuevo/Editar</a>
            <a href="pagina6.php?variable=nuevaPruebaMenu" class="active">Prueba Nueva/Editar</a>
            <a href="pagina7.php">Estadísticas</a>
            <a href="pagina8.php">Crear Pista</a>
            <a href="javascript:void(0);" class="icon" onclick="myFunction()">
				<i class="fa fa-bars"></i>
            </a>
            
	</div>


	<div id="pag6" align="center"  >

	{if $hayNuevaPrueba ==0}
	<h2 align="left">Editar prueba</h2>
<form action="pagina6.php" method="POST" >
<p>Nombre: <input type="text" size="60" name="nombre" value="{$prueba->getnombre()}"></p>
<p>URL: <input type="text" name="url" size="60" value="{$prueba->geturl()}"></p>
<p>Descripción breve: <textarea cols="50" rows="5" name="descripcionbreve">{$prueba->getdescBreve()} </textarea></p>
<p>Descripción extendida/Enunciado de la prueba: <textarea cols="50" rows="10" name="descripcionextendida">{$prueba->getdescExtendida()} </textarea></p>
<p>
		Tipo: <select name="tipo">
				<option {if $prueba->gettipo() == "Prueba Normal"} selected {/if} value="Prueba Normal">Normal</option>
				<option {if $prueba->gettipo() == "Prueba Final"} selected {/if} value="Prueba Final">Final</option>
		</select>
</p>
<p>
		Dificultad: <select name="dificultad">
				<option {if $prueba->getdificultad() == "Facil"} selected {/if} value="Facil">Facil</option>
				<option {if $prueba->getdificultad() == "Normal"} selected {/if} value="Normal">Normal</option>
				<option {if $prueba->getdificultad() == "Dificil"} selected {/if} value="Dificil">Dificil</option>
		</select>
</p>

<p>Ayuda final: <input type="text" name="ayudaFinal"value="{$prueba->getayudaFinal()}" > </p>
<input type='hidden' name='username' value='{$prueba->getusername()}'/>

<p>Añadir Solucion: <textarea cols="50" rows="5" name="anadirsolucion"></textarea></p>
 <input type='submit' value='Anadir Solucion' name='anadir'/>
 <input type="hidden" name="arrayrespuestas">
<br>
<br>	


<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Respuestas / Soluciones</th>	
	</tr>
          {foreach from=$respuestas item=respuesta}
            <tr>
            <td>{$respuesta} </td>
            </tr>
           
          {/foreach}           
        
</table>
<br>

<input type='submit' value='Añade pista' name='anadePista'/> 
<input type='submit' value='Eliminar Pista' name='delPista'/><br><br>
<input type='hidden' name='codigoprueba' value='{$prueba->getid()}'/>

<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Pistas</th>	
	</tr>
		{if $hayPistas==1}
          {foreach from=$listaPistas item=pista}
            <tr>
             <td>

             	<input type="checkbox" name="del{$pista->getid()}"value="{$pista->getid()}"><label>{$pista->gettexto()} </label> 
             </td>
            
            </tr>
           
          {/foreach}   
        {/if}        
        
</table>
<br>

 <input type='submit' value='Guardar Prueba' name='guardarPrueba'/> 
 <input type='submit' name="cancelar" value='Cancelar'/>
</form>



{else}
<h2 align="left">Nueva prueba</h2>
<p><form id='guardaprueba' action='pagina6.php' method='POST'>
<p>
	Nombre: <input type="text" size="60" name="nombre" placeholder="Introduzca el nombre">
</p>
<p>
	URL: <input type="text" size="60" name="url" placeholder="Introduzca la URL">
</p>
	<p>
	Descripción breve: <textarea cols="50" rows="5" name="descripcionbreve" placeholder="Introduzca una descripción breve"></textarea>
	</p>
	<p>
Descripción extendida/Enunciado de la prueba: <textarea cols="50" rows="10" name="descripcionextendida" placeholder="Introduzca una descripción extensa"></textarea>
	</p>
	<p>
		Tipo: <select name="tipo">
				<option value="Prueba Normal">Normal</option>
				<option value="Prueba Final">Final</option>
				</select>
	</p>
<p>
		Dificultad: <select  name="dificultad">
				<option value="F">Facil</option>
				<option value="N">Normal</option>
				<option value="D">Dificil</option>
		</select>
</p>

<p>Ayuda final: <input type="text" name="ayudaFinal"></p>
<input type='hidden' name='username' value='{$username}'/>
 

<p>Añadir Solucion:<textarea cols="50" rows="5" name="anadirsolucion"></textarea></p>

 <input type='submit' value='Añadir Solucion' name='anadir'/><br><br>
 
<br><br>
<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Repuestas / Soluciones</th>         
            
    </tr>
		
</table>
<br>
 <input type='submit' value='Añade pista' name='anadePista'/> 


<br><br>

<table width="90%" border="1px solid black" cellpadding="20px" align="center">
	<tr>
		<th>Listado de Pistas</th>       
                        
                 
    </tr>
		
</table>
<br>
<input type='submit' value='Guardar Prueba' name='guardarPrueba'/> 
<input type='submit' name="cancelar" value='Cancelar'/>
</form>


{/if}

		
</table>
</form>
<br>
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