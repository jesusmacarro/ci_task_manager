<h2> Lista de tareas </h2>
<p> <a class="btn btn-success" href="<?php echo base_url () ?>tareas/guardar" title="Nueva tarea"> Crear nueva tarea </a> </p><br>
<?php if (count ($tareas)): ?>
    <table class="table tableborder">
        <thead>
        <tr>
            <th> Tarea </th>
            <th> Departamento Solicitante </th>
            <th> Departamento Demandado </th>
            <th> Título </th>
            <th> Prioridad </th>
            <th> Estado </th>
            <th> &nbsp; </th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tareas as $item): ?>
            <tr class=<?php echo lcfirst(str_replace(array(" ", "ó"),array ("", "o"), $item -> descripcion_estado))?> >
                <td style="width: 5%"> <?php echo str_pad ($item -> id_tarea, 5, "0", STR_PAD_LEFT);  ?> </td>
                <td style="width: 15%"> <?php echo $item -> dpto_sol ?> </td>
                <td style="width: 15%"> <?php echo $item -> dpto_dem ?> </td>
                <td style="width: 30%"> <?php echo $item -> titulo_tarea ?> </td>
                <td style="width: 5%"><img src="<?=base_url()?>png/<?php echo $item -> descripcion_prioridad?>.png" /> <?php echo $item -> descripcion_prioridad?> </td>
                <td style="width: 10%"> <?php echo $item -> descripcion_estado?> </td>

                <td> 
                    <a class="btn btn-info" href="<?php echo base_url () ?>tareas/ver/<?php echo $item -> id_tarea ?>" title="Ver detalles" ><img src="<?php echo base_url () ?>png/eye.png"> </a>
                    <a class="btn btn-info" href="<?php echo base_url () ?>tareas/guardar/<?php echo $item -> id_tarea ?>" title="Editar tarea"><img src="<?php echo base_url () ?>png/edit.png"> </a>
                    <a class="btn btn-danger eliminar_informe" href="<?php echo base_url () ?>tareas/eliminar/<?php echo $item -> id_tarea ?>" title="Eliminar tarea"><img src="<?php echo base_url () ?>png/trash.png"> </a> 
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
<?php else: ?>
    <p> No hay tareas </p>
<?php endif; ?>

<script type="text/javascript">
    $ (".eliminar_informe").each (function () {
        var href = $ (this).attr ('href');
        $ (this).attr ('href', 'javascript:void (0)');
        $ (this).click (function () {
            if (confirm ("¿Seguro desea eliminar esta tarea?")) {
                location.href = href;
            }
        });
    });
</script>