<table align="center">
    <tr>
        <th>Nombre del Equipo</th>
        <th>Código de Accceso a la Partida</th>
    </tr>
        {* Si la entrada es como 'EDITAR' se muestran VALORES: *}
        {if isset($export_accion) && $export_accion == "editar"}
            {foreach from=$equipos4 item=equipo4}
                <tr>
                    <td>{$equipo4->getnombre()}</td>                    
                    <td>{$equipo4->getcodigo()}</td>
                </tr>              
            {/foreach}             
            
        {else}
            <tr>
                <td>
                    <br>
                </td>
                <td>                   
                </td>
            </tr>
        {/if}
</table>
