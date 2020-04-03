<div align="center"><h2>Juego: {$mijuego}.</h2></div>
<form action="{$smarty.server.PHP_SELF}" method="post">
    <table align="center">
        <tr>
            <th>Seleccionar partida</th>
            <th>Nombre de la partida</th>
            <th>N.º de equipos</th>
            <th>Fecha de creación</th>
            <th>Usuario que lo creó</th>
            <th>Finalizada</th>
        </tr>
        {foreach from=$partidas item=partida}
            {*if $partida->getidJuego() == $cod*}
                <tr>    
                    <td>
                        <input type="radio" value="{$partida->getid()}" name="idPartida">
                    </td> 
                    <td>{$partida->getnombre()}</td>
                    <td>{$partida->getnum_equipospartida()}</td>
                    <td>{$partida->getfechaCreacion()}</td>
                    <td>{$partida->getusername()}</td>
                    <td>{$partida->getfinalizada()}</td>
                </tr>
            {*/if*}
        {/foreach}
    </table>
    <div align="center">
        <br><br>
        <input type="submit" value="Editar partida" name="editarpartida">
        <input type="submit" value="Estadísticas" name="estadisticas">
        <input type="submit" value="Eliminar partida finalizada" name="eliminarpartida">
    </div>
    <div><span class='error'>{if isset($error)}{$error}{/if}</span></div>
</form>


