<div class="minicontainer">
    <table class="table tableborder">
        <thead>
        <tr>
            <th> Tarea </th>
            <th> Departamento Solicitante </th>
            <th> Departamento Demandado </th>
            <th> Prioridad </th>
            <th> Estado </th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td style="width: 5%"> <?php echo str_pad ($tarea->id_tarea, 5, "0", STR_PAD_LEFT);  ?> </td>
                <td style="width: 15%"> <?php echo $tarea->dpto_sol ?> </td>
                <td style="width: 15%"> <?php echo $tarea->dpto_dem ?> </td>
                <td style="width: 5%"> <?php echo $tarea->descripcion_prioridad?> </td>
                <td style="width: 5%"> <?php echo $tarea->descripcion_estado?> </td>


            </tr>
        </tbody>
    </table>
</div>
<br><br>
<table class="table tableborder">
    <thead>
        <tr>
            <th><h4> Título </h4></th>
            <th><h4> Descripción </h4></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td style="width: 15%"><b> <?php echo $tarea->titulo_tarea ?> </b></td>
            <td style="width: 50%"> <?php echo nl2br ($tarea->descripcion_tarea) ?> </td>
        </tr>
    </tbody>
</table>
<br><br>
<div class="rowbutton"> <a class="btn btn-info" href="<?php echo base_url () ?>tareas"> Volver atrás </a> </div>
