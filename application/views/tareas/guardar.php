<h1> Guardar Tarea </h1>
<form method="post" action="<?php echo base_url () ?>tareas/guardar_post/<?php echo $id_tarea ?>">
    <div class="row">
        <label> Departamento Solicitante </label>
        <select name="dpto_solicitante">
            <?php foreach ($dptos as $item): ?>
                <?php if ($item -> id_dpto == $dpto_solicitante): ?>
                    <option value="<?php echo $item -> nombre_dpto ?>" selected><?php echo $item -> nombre_dpto ?></option>
                <?php else: ?>
                    <option value="<?php echo $item -> nombre_dpto ?>" ><?php echo $item -> nombre_dpto ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <label> Departamento Demandado </label>
        <select name="dpto_demandado">
            <?php foreach ($dptos as $item): ?>
                <?php if ($item -> id_dpto == $dpto_demandadado): ?>
                    <option value="<?php echo $item -> nombre_dpto ?>" selected><?php echo $item -> nombre_dpto ?></option>
                <?php else: ?>
                    <option value="<?php echo $item -> nombre_dpto ?>" ><?php echo $item -> nombre_dpto ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="row">
        <label> Título </label>
        <input type="text" name="titulo_tarea" required="required" style="width: 100%;" value="<?php echo $titulo_tarea ?>" />
    </div>
    <div class="row">
        <label> Descripción </label>
        <textarea name="descripcion_tarea" cols="100" rows="5" required="required" style="width: 100%;"><?php echo $descripcion_tarea; ?></textarea>
    </div>
    <div class="row">
        <label> Prioridad </label>
        <select name="prioridad_tarea">
            <?php foreach ($prioridades as $item): ?>
                <?php if ($item -> id_prioridad == $prioridad_tarea): ?>
                    <option value="<?php echo $item -> descripcion_prioridad ?>" selected><?php echo $item -> descripcion_prioridad ?></option>
                <?php else: ?>
                    <option value="<?php echo $item -> descripcion_prioridad ?>" ><?php echo $item -> descripcion_prioridad ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select>
        <label> Estado </label>
        <?php if ($id_tarea == null): ?>
            <input type="text" value="<?php echo $estado_tarea ?>" disabled />
        <?php else: ?>
            <select name="estado_tarea">
            <?php foreach ($estados as $item): ?>
                <?php if ($item -> id_estado == $estado_tarea): ?>
                    <option value="<?php echo $item -> descripcion_estado ?>" selected><?php echo $item -> descripcion_estado ?></option>
                <?php else: ?>
                    <option value="<?php echo $item -> descripcion_estado ?>" ><?php echo $item -> descripcion_estado ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
            </select>
        <?php endif; ?>
    </div>
    <div class="rowbutton">
        <input type="submit" class="btn btn-success" value="Guardar" title="Guardar" />
        <a class="btn btn-danger" href="<?php echo base_url () ?>tareas" title="Cancelar"> Cancelar </a>
    </div>
</form>