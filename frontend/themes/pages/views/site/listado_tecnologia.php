<div class="panel panel-transparent">
    <div class="panel-heading">
        <div class="panel-title"><strong>Listado de Tecnologías</strong></div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <table class="table table-striped" id="tableWithExportOptions">
                <thead>
                <tr>
                    <th>Tecnología</th>
                    <th>Descargar <i class="fs-14 pg-download"></th>

                </tr>
                </thead>
                <tbody>
                <?php foreach($tec as $tecnologia){?>
                    <tr>
                        <td><?php echo $tecnologia->tecnologia?></td>
                        <td><a target="_blank" href="<?php echo $tecnologia->direccion?>"><?php echo $tecnologia->direccion?></a></td>

                    </tr>
                <?php }?>
                </tbody>

            </table>
        </div>
    </div>
</div>