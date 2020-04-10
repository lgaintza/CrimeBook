<form name="xxxx" action="{$smarty.server.PHP_SELF}" method="post">
<table align="center">
                <tr>
                        <th align="center" >Equipo</th>
                        <th align="center" >Codigo</th>
                        <th align="center" >Fecha Inicio(partida)</th>
                        <th align="center" >Duración(partida)</th>
                        <th align="center">Tiempo de resolución</th>
                        <th align="center">Intentos</th>
                </tr>

 {foreach from=$juegoest item=estadistica}

            <tr>   

                <td>{$estadistica->getnombrequipo()}</td>
                <td>{$estadistica->getcodigo()}</td>
                <td>{$estadistica->getfechainicio()}</td>
                <td>{$estadistica->getduracion()}</td>
                <td>{$estadistica->gettiemporesolucion()}</td>
                <td>{$estadistica->getintentos()}</td>
            </tr>

    {/foreach}
</table>
</form>