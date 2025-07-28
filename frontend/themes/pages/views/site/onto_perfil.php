<?php $this->title = 'Ontologia';
$disabled = "disabled";
if ($action == 'actualizar_onto_perfil')
    $disabled = "";
?>
<script>
    <?php if ($action == 'actualizar_onto_perfil' && $model!=null ) {
    $i = 1;
    ?>
    var update = true;
    <?php $model=(object)$model?>
    var array_clasificaciones = [<?php foreach ($model->arrayclasificacion_ontologia as $clasif) {
        $coma = '';
        if ($i < count($model->arrayclasificacion_ontologia)) {
            $coma = ',';
        }
        echo ' {id:"' . $clasif->id_clasificacion . '",name:"' . $clasif->clasificacion->clasificacion . '"}' . $coma;
        $i++;
    }?>];

    var array_clasificaciones_id = [<?php $i = 1;foreach ($model->arrayclasificacion_ontologia as $clasif) {
        $coma = '';
        if ($i < count($model->arrayclasificacion_ontologia)) {
            $coma = ',';
        }
        echo ' "' . $clasif->id_clasificacion . '"' . $coma;
        $i++;
    }?>];
    <?php
    }
    else
    { ?>
    var update = false;
    <?php } ?>
</script>

<div class="page-content-wrapper ">
    <div class="register-container full-height sm-p-t-30">
        <div class="container-sm-height full-height">
            <div class="row row-sm-height">
                <div class="login-container bg-white">
                    <div class="p-l-40 m-l-10 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-10 sm-p-r-25 sm-p-t-30 col-lg-15">
                        <h1 align="center"><strong>Perfil Ontología</strong></h1>
                        <form id="form_onto_perfil" class="p-t-15"  action="<?php echo Yii::$app->homeUrl . 'site/' . $action ?>" method="post"
                              enctype="multipart/form-data">
                            <input type="hidden" name="_onto_CSRF_frontend"
                                   value="<?php echo Yii::$app->getRequest()->csrfToken ?>"/>

                            <?php if ($model!=null && $mensaje=="" ){?>
                                <div class="row" style="">
                                    <div class="col-md-6">
                                        <label class="control-label">Nombre</label>
                                        <div class="form-group">
                                            <input class="form-control" value="<?= $model->nombre?>" maxlength="40"
                                                   placeholder="Escriba el Nombre..." required type="text" id="nombre"
                                                   name="Ontologia[nombre]" onkeypress="return permite(event,'num_car')">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Dominio</label>
                                        <div class="form-group">
                                            <input class="form-control" value="<?= $model->dominio?>" maxlength="45"
                                                   placeholder="Escriba el Dominio..." required type="text" id="dominio"
                                                   name="Ontologia[dominio]" onkeypress="return permite(event,'num_car')">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="">
                                    <div class="col-md-6">
                                        <label class="control-label">Clasificación</label>
                                        <div class="form-group">
                                            <div>
                                                <select class="form-control" style="width: 280px;"
                                                        placeholder="Escoja el Id_clasificacion..."
                                                        id="id_clasificacion_combo" name="Clasificacion[idclasificacion][]"
                                                        onkeypress="return permite(event,'car')">


                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="">
                                    <div class="col-md-6">
                                        <label class="control-label">Namespace</label>
                                        <div class="form-group">
                                            <input class="form-control" value="<?= $model->name_space?>" maxlength="500"
                                                   placeholder="Escriba el Namespace..."  type="text" id="name_space"
                                                   name="Ontologia[name_space]" >
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label class="control-label">Versión</label>
                                        <div class="form-group">
                                            <input class="form-control" value="<?= $model->version?>" maxlength="9" step="0.1"
                                                   placeholder="Escriba la versión..." required type="number" id="version"
                                                   name="Ontologia[version]" onkeypress="return permite(event,'dec')">
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row" style="">
                                    <div class="col-md-12">
                                        <label class="control-label">Lenguaje:<span id="lenguaje"></span></label>
                                        <input value="<?= $model->id_lenguaje?>" type="hidden" id="language" name="Ontologia[id_lenguaje]">

                                    </div>
                                </div>
                                <br>
                                <div class="row" style="">
                                    <div class="col-md-6">
                                        <label class="control-label">Seleccione fichero de ontología</label>
                                        <div class="form-group">
                                            <div class="col-md-12 pull-right">
                                                <div class="col-md-4">
                                                    <span class="hidden-480" data-translate="btn_ok"
                                                    <input type="hidden"> <input class="" value="<?= $model->fichero?>"
                                                                                 placeholder=""
                                                        <?php if ($action == 'crear_onto_perfil'){?>
                                                            required
                                                        <?php }?>
                                                                                 type="file" id="fichero"
                                                                                 name="Ontologia[fichero]" " ></input>
                                                    </span>
                                                    &nbsp; <a href="javascript:;" class="close fileinput-exists"
                                                              data-dismiss="fileinput">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div align="center">
                                        <div class="form-group">
                                            <button class="btn btn-primary btn-cons m-t-10" type="submit">Aceptar</button>

                                        </div>
                                    </div>
                                </div>
                                <br>
                                <?php if ($action == 'actualizar_onto_perfil') { ?>
                                    <input value="<?= $model->idontologia ?>" type="hidden" id="idontologia" name="Ontologia[idontologia]">
                                <?php } ?>

                            <?php }?>

                        </form>
                        <?php if ($mensaje!=''){?>
                            <div class="panel-heading">
                                <h2><?php echo $mensaje ?></h2>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


