<form action="{$smarty.server.PHP_SELF}" method="post">
    <table align="center">
        <tr>
            <th>Seleccionar juego</th>
            <th>Nombre del juego</th>
            <th>Descripción</th>
            <th>N.º de pruebas</th>
            <th>Usuario que lo creó</th>
            <th style="color: white">¿Eliminar Juegos?</th>
        </tr>
        {foreach from=$juegos item=juego}
            <tr>    
                <td>
                    <input type="radio" value="{$juego->getid()}" name="idJuego">
                </td> 
                <td>{$juego->getnombre()}</td>
                <td>{$juego->getdescBreve()}</td>
                <td>{$juego->getnum_pru()}</td>
                <td>{$juego->getusername()}</td>
                <td>
                    <input type="checkbox" id="juego" name="juego[]" value="{$juego->getid()}">
                </td>    
            </tr>
        {/foreach}
    </table>
    <div align="center">
        <br><br>
        <input type="submit" value="Nueva partida" name="nuevapartida" class="button" >
        <input type="submit" value="Nuevo juego" name="nuevojuego" class="button" >
        <input type="submit" value="Editar juego" name="editarjuego" class="button" >
        <input type="submit" value="Ver partidas" name="verpartidas" class="button" >
        <input type="submit" value="Eliminar juego/s" name="eliminarjuego" class="button" >
    </div>
</form>