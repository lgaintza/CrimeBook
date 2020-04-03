<table name="tabla_partida" align="center">
	<tr>
            <th>Nombre de la partida</th>
            <th>Duración de la partida</th>
	</tr>
        <br>
        <br>
	<tr>
            {* Si la entrada es como 'EDITAR' se muestran VALORES: *}
            {if $export_accion == "editar"}
                <td>{$partidanombre}</td>
                <td>
                    <input name="celdatiempo" value={$partidaduracion}>
                </td>
            {/if}
            {if $export_accion == "crear"}
            {* Si la entrada no es como 'EDITAR' se muestra vacío: *}
                <td width="100">
                    <input size="60" name="celdanombrepartida">
                </td>
                 <td width="80">
                    <input size="40" name="celdatiempo">
                </td>
            {/if}            
        </tr>
</table>
