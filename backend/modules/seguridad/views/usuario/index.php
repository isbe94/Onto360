<?php $this->title = 'Usuario'; ?>
<?php
?>
<?php
if (count($this->css) > 0)
    foreach ($this->css as $css) {
        echo '<link href="' . $css . '" rel="stylesheet">';
    }
?>
<h3 class="page-title">Administrar Usuario </h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo Yii::$app->homeUrl ?>">Inicio</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Yii::$app->homeUrl . 'seguridad' ?>">Seguridad</a>
        </li>
        <li>
            <i class="fa fa-angle-right"></i>
            <a href="#">Usuario</a>
        </li>
    </ul>
</div>
<div class='row' style=' margin-left:0px;margin-bottom:10px; '>
    <div class=" btn-group pull-right" style="margin-right: 50px">
        <a id="pdf_usuario" title="Exportar excel o PDf" id="ToolTables_table-editable_1"
           class="btn btn-default ">
            <span>
					<i class="icon-printer"></i>
					<span class='separator'></span>
			</span>
        </a>
        <a id="excel_usuario_importar" class="btn btn-default ">
            <span><i class="icon-action-undo"></i></span></a>
    </div>
    <div class="actions">
        <div class="btn-group">
            <button id="btn_modal_usuario" type="button" class="btn btn-dark btn-rounded">
                <i class='fa fa-plus'></i>
                <span class="hidden-480" data-translate="btn_new">Nuevo</span>
            </button>
            <button id="deletebutton_usuario" type="button" class="btn btn-dark btn-rounded btn-danger">
                <i class='fa fa-trash-o'></i>
                <span class="hidden-480" data-translate="btn_delete">Eliminar</span>
            </button>
        </div>
    </div>
</div>
<div class="portlet-body">
    <div style="" class="table-container">
        <div class="content box box-primary">
            <div class="row" style="margin-bottom: 20px;margin-right: 10px">
                <div class="col-md-9">
                    <div class="input-icon right pull-right">
                        <input type="text" class="form-control form-white pull-right"
                               style="width: 170%;border: 1px solid #101010;" id="text-search-usuario"
                               placeholder="Buscar...">
                        <i class="icon-magnifier"></i>
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="button" id="clear-filter-usuario" class="btn btn-dark">Limpiar</button>
                </div>
            </div>
            <div id="gridselection_usuario" style="width:100%"></div>
        </div>
    </div>
</div>
<!--Inicio de Ventana Usuario-->
<div id="modal_usuario" role="dialog" class="modal fade modal-scroll" tabindex="-1" data-backdrop="static"
     data-keyboard="false" data-attention-animation="true" data-width="100%">
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title"><strong><span data-translate="title_add_usuario"
                                              id="title_usuario"> Insertar Usuario</span></strong></h4>
    </div>
    <div class="modal-body">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_usuario" href="#" class="reload">
                        </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="#" class="horizontal-form" enctype="multipart/form-data" id="usuario_form">
                        <h3 class="form-section">Información Usuario </h3>
                        <div class="form-body">

                            <div class="row" style="">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Usuario</label>
                                        <input class="form-control" value="" maxlength="64"
                                               placeholder="Escriba el Usuario..." required type="text" id="usuario"
                                               name="Usuario[usuario]" onkeypress="return permite(event,'num_car')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Nombre</label>
                                        <input class="form-control" value="" maxlength="64"
                                               placeholder="Escriba el Nombre..." type="text" id="nombre"
                                               name="Usuario[nombre]" onkeypress="return permite(event,'num_car')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Contraseña</label>
                                        <input class="form-control" value="" maxlength="45"
                                               placeholder="Escriba la Contraseña..." required type="password"
                                               id="contrasena" name="Usuario[contrasena]"
                                               onkeypress="return permite(event,'num_car')">
                                    </div>
                                </div>
                            </div>
                            <!--/row-->
                            <div class="row" style="">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Primer Apellido</label>
                                        <input class="form-control" value="" maxlength="40"
                                               placeholder="Escriba el Primer Apellido..." type="text" id="apellido1"
                                               name="Usuario[apellido1]" onkeypress="return permite(event,'num_car')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Segundo Apellido</label>
                                        <input class="form-control" value="" maxlength="20"
                                               placeholder="Escriba el Segundo Apellido..." type="text" id="apellido2"
                                               name="Usuario[apellido2]" onkeypress="return permite(event,'num_car')">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Correo</label>
                                        <input class="form-control" value="" maxlength="50"
                                               placeholder="Escriba el Correo..." type="text" id="correo"
                                               name="Usuario[correo]">
                                    </div>
                                </div>

                                </div>
                            </div>
                            <!--/row-->
                            <div class="row" style="">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label class="control-label">Activo</label>
                                        <input class="check_row" value="" type="checkbox" id="activo">
                                    </div>
                                </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Rol</label>
                                            <div>
                                                <select class="form-control" style="width: 280px;"
                                                        placeholder="Escoja el rol..." required id="id_rol_combo"
                                                        name="Usuario[rol]" onkeypress="return permite(event,'car')">

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Categoría Científica</label>
                                            <div>
                                                <select class="form-control" style="width: 280px;"
                                                        placeholder="Escoja la Categoría Científica..." required
                                                        id="id_catcientifica_combo" name="Usuario[categcient]"
                                                        onkeypress="return permite(event,'car')">

                                                </select>
                                            </div>
                                        </div>
                                    </div>


                            </div>
                            <!--/row-->

                            <div class="row" style="">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Avatar</label>

                                        <div class="col-md-12 pull-right">
                                            <div class="col-md-4">
                                                <div class="fileinput fileinput-new" data- provides="fileinput">
												<span class="btn default btn-file">
												<span class="fileinput-new">
												Seleccione la imagen </span>
												<input type="hidden"> <input class="" value=""
                                                                             placeholder="" type="file" id="foto"
                                                                             name="Usuario[avatar]" "></input>
												</span>
                                                </div>

                                            </div>
                                            <div class="col-md-6">
                                                <img width="120px" height="120px" style="margin-top: 20px"
                                                     class="user-image img-circle pull-right" id="image_autor"
                                                     src="<?php echo Yii::$app->getHomeUrl() .Yii::$app->params['usuario_image_path'].'user.jpg' ?> "/>
                                            </div>

                                        </div>

                                        <input value="-1" type="hidden" id="idusuario" name="Usuario[idusuario]">
                                    </div>
                                </div>

                            </div>


                            <input value="insert" type="hidden" id="taskusuario" name="taskusuario">
                            <input value="-1" type="hidden" id="idusuario" name="Usuario[idusuario]">
                            <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
                        </div>

                        <div class="btn-group pull-right">
                            <button type="button" id="btnaction_usuario" class="btn btn-primary btn-rounded btnaction">
                                <span class="hidden-480" data-translate="btn_ok">Guardar</span>
                            </button>
                            <button type="button" id="btnaction_usuario_new" class="btn bg-green btnaction">
                                <span class="hidden-480" data-translate="btn_ok_new">Guardar y nuevo </span>
                            </button>
                            <button type="button" data-dismiss="modal" class="btn default btn-rounded">
                                <span class="hidden-480" data-translate="btn_cancel">Cancelar</span>
                            </button>
                        </div>
                    </form>
                    <!-- END FORM-->
                </div>
            </div>
        </div>
    </div>
</div>
<!--                in de Ventana Usuario-->
<!--Inicio de Ventana Usuario-->
<div id="list_usuario_pdf" role="dialog" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false"
     data-attention-animation="true" data-width="90%">
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title"><i class="icon-equalizer"></i><strong><span data-translate="title_add_usuario">Listado de usuario</span></strong>
        </h4>
    </div>
    <div class="modal-body">
        <div class="portlet light bg-inverse">
            <div class="btn-group pull-right">
                <button type="button" id="export_usuario_pdf" class="btn bg-danger btn-rounded">
                    <span class="hidden-480" data-translate="btn_pdf">PDF</span>
                </button>
                <button type="button" id="excel_usuario" data-dismiss="modal" class="btn default bg-green btn-rounded">
                    <span class="hidden-480" data-translate="btn_excel">Excel</span>
                </button>
            </div>
            <div class="portlet-body form table-scrollable">


                <div class="pdf-page size-a4" id="table_usuario_pdf">
                    <div class="pdf-header">
                        <h2>Listado de Usuario</h2>
                    </div>
                    <div class="pdf-body">
                        <div style="" class="" data-role="grid" id="">
                            <table class="table table-striped table-advance">
                                <thead>
                                <th nowrap="">
                                    usuario
                                </th>
                                <th nowrap="">
                                    nombre
                                </th>
                                <th nowrap="">
                                    contrasena
                                </th>
                                <th nowrap="">
                                    rol
                                </th>
                                <th nowrap="">
                                    auth_key
                                </th>
                                <th nowrap="">
                                    created_at
                                </th>
                                <th nowrap="">
                                    updated_at
                                </th>
                                <th nowrap="">
                                    avatar
                                </th>
                                <th nowrap="">
                                    apellido1
                                </th>
                                <th nowrap="">
                                    apellido2
                                </th>
                                <th nowrap="">
                                    activo
                                </th>
                                <th nowrap="">
                                    experto
                                </th>
                                <th nowrap="">
                                    categcient
                                </th>
                                <th nowrap="">
                                    grado_experiencia
                                </th>
                                <th nowrap="">
                                    correo
                                </th>

                                </thead>
                                <tbody id="tbody_table_usuario">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--                Fin de Ventana Usuario-->
<!--                Ventana para importar -->

<div id="import_usuario" role="dialog" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false"
     data-attention-animation="true" data-width="50%">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    </div>
    <div class="modal-body">
        <div class="portlet light bg-inverse">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="title_usuario_imp">Importar de Usuario</span>
                </div>
                <div class="tools">
                </div>
            </div>

            <div class="portlet-body form">

                <form method="post" class="horizontal-form" enctype="multipart/form-data" id="importar_form">
                    <div class="col-md-12 pull-right">
                        <div class="col-md-4">
                            <input name="importar_excel" id="importar_excel" data-edit="insertImage" type="file">
                        </div>
                        <div class="col-md-4">
                            <button type="button" id="importar_usuario_excel" class="btn green pull-right">Importar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form action="usuario/excel" method="post" id="form_excel_export" style="display: none">
    <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">
    <input type="hidden" id="usuario_export" name="usuario_export" value="">
</form>
<?php
if (!$index)
    if (count($this->js) > 0)
        foreach ($this->js as $js) {
            echo '<script src="' . $js . '" ><script/>';
        }
?>
<!--                Template del GRID -->
<script type="text/x-kendo-template" id="template">
    <div class="tabstrip">
        <ul>
            <li class="k-state-active">
                Datos Generales
            </li>
        </ul>
        <div>
            <div>
                <!-- List group -->
                <ul class="list-group">
                    <li class="list-group-item">
                        Usuario: #:usuario#
                    </li>
                    <li class="list-group-item">
                        Nombre: #:nombre#
                    </li>
<!--                    <li class="list-group-item">-->
<!--                        Contrasena: #:contrasena#-->
<!--                    </li>-->
                    <li class="list-group-item">
                        rol: #:rol#
                    </li>
<!--                    <li class="list-group-item">-->
<!--                        Auth_key: #:auth_key#-->
<!--                    </li>-->
<!--                    <li class="list-group-item">-->
<!--                        Created_at: #: kendo.toString(created_at, 'd')#-->
<!--                    </li>-->
<!--                    <li class="list-group-item">-->
<!--                        Updated_at: #: kendo.toString(updated_at, 'd')#-->
<!--                    </li>-->
<!--                    <li class="list-group-item">-->
<!--                        Avatar: #:avatar#-->
<!--                    </li>-->
                    <li class="list-group-item">
                        Primer Apellido: #:apellido1#
                    </li>
                    <li class="list-group-item">
                        Segundo Apellido: #:apellido2#
                    </li>
<!--                    <li class="list-group-item">-->
<!--                        Activo: #:activo#-->
<!--                    </li>-->
                    <li class="list-group-item">
                        Experto: #:experto#
                    </li>
                    <li class="list-group-item">
                        Categoría Científica: #:categcient#
                    </li>
<!--                    <li class="list-group-item">-->
<!--                        experticia: #:grado_experiencia#-->
<!--                    </li>-->
                    <li class="list-group-item">
                        Correo: #:correo#
                    </li>
                </ul>
            </div>
        </div>
    </div>
</script>
