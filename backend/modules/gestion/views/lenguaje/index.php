<?php $this->title = 'Lenguaje'; ?>
<?php
?>
<?php
if (count($this->css) > 0)
    foreach ($this->css as $css) {
        echo '<link href="' . $css . '" rel="stylesheet">';
    }
?>
<h3 class="page-title">Administrar Lenguaje </h3>
<div class="page-bar">
    <ul class="page-breadcrumb">
        <li>
            <i class="fa fa-home"></i>
            <a href="<?php echo Yii::$app->homeUrl ?>">Inicio</a>
            <i class="fa fa-angle-right"></i>
        </li>
        <li>
            <a href="<?php echo Yii::$app->homeUrl . 'gestion' ?>">Gestión</a>
        </li>
        <li>
            <i class="fa fa-angle-right"></i>
            <a href="#">lenguaje</a>
        </li>
    </ul>
</div>
<div class='row' style=' margin-left:0px;margin-bottom:10px; '>
    <div class=" btn-group pull-right" style="margin-right: 50px">
        <a id="pdf_lenguaje" title="Exportar excel o PDf" id="ToolTables_table-editable_1"
           class="btn btn-default ">
            <span>
					<i class="icon-printer"></i>
					<span class='separator'></span>
			</span>
        </a>
        <a id="excel_lenguaje_importar" class="btn btn-default ">
            <span><i class="icon-action-undo"></i></span></a>
    </div>
    <div class="actions">
        <div class="btn-group">
            <button id="btn_modal_lenguaje" type="button" class="btn btn-dark btn-rounded">
                <i class='fa fa-plus'></i>
                <span class="hidden-480" data-translate="btn_new">Nuevo</span>
            </button>
            <button id="deletebutton_lenguaje" type="button" class="btn btn-dark btn-rounded btn-danger">
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
                               style="width: 170%;border: 1px solid #101010;" id="text-search-lenguaje"
                               placeholder="Buscar...">
                        <i class="icon-magnifier"></i>
                    </div>
                </div>
                <div class="col-md-1">
                    <button type="button" id="clear-filter-lenguaje" class="btn btn-dark">Limpiar</button>
                </div>
            </div>
            <div id="gridselection_lenguaje" style="width:100%"></div>
        </div>
    </div>
</div>
<!--Inicio de Ventana lenguaje-->
<div id="modal_lenguaje" role="dialog" class="modal fade modal-scroll" tabindex="-1" data-backdrop="static"
     data-keyboard="false" data-attention-animation="true" data-width="760">
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title"><strong><span data-translate="title_add_lenguaje" id="title_lenguaje"> Insertar Lenguaje</span></strong>
        </h4>
    </div>
    <div class="modal-body">
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <div class="tools">
                        <a title="" data-original-title="" id="reload_lenguaje" href="#" class="reload">
                        </a>
                        <a href="" class="fullscreen" data-original-title="" title=""> </a>
                    </div>
                </div>
                <div class="portlet-body form">
                    <!-- BEGIN FORM-->

                    <form action="#" class="horizontal-form" enctype="multipart/form-data" id="lenguaje_form">
                        <h3 class="form-section">Información Lenguaje </h3>
                        <div class="form-body">

                            <div class="row" style="">
                                <!--                                <div class="col-md-3 col-sm-4"><i class="fa fa-link"></i> </div>-->
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="control-label">Lenguaje</label>
                                        <input class="form-control" value="" maxlength="20"
                                               placeholder="Escriba el lenguaje..." required type="text"
                                               id="lenguaje" name="lenguaje[lenguaje]"
                                               onkeypress="return permite(event,'num_car')">
                                    </div>
                                </div>
                            </div>
                            <!--/row-->

                            <input value="insert" type="hidden" id="tasklenguaje" name="tasklenguaje">
                            <input value="-1" type="hidden" id="idlenguaje" name="lenguaje[idlenguaje]">
                            <input value="" type="hidden" id="btnsubmit" name="btnsubmit">
                        </div>
                        <div class="row" style="margin-bottom: 20px;"></div>
                        <div class="btn-group pull-right">
                            <button type="button" id="btnaction_lenguaje"
                                    class="btn btn-primary btn-rounded btnaction">
                                <span class="hidden-480" data-translate="btn_ok">Guardar</span>
                            </button>
                            <button type="button" id="btnaction_lenguaje_new" class="btn bg-green btnaction">
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
<!--                Fin de Ventana lenguaje-->
<!--Inicio de Ventana lenguaje-->
<div id="list_lenguaje_pdf" role="dialog" class="modal fade" tabindex="-1" data-backdrop="static"
     data-keyboard="false" data-attention-animation="true" data-width="90%">
    <div class="modal-header bg-primary">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
        <h4 class="modal-title"><i class="icon-equalizer"></i><strong><span data-translate="title_add_lenguaje">Listado de Lenguaje</span></strong>
        </h4>
    </div>
    <div class="modal-body">
        <div class="portlet light bg-inverse">
            <div class="btn-group pull-right">
                <button type="button" id="export_lenguaje_pdf" class="btn bg-danger btn-rounded">
                    <span class="hidden-480" data-translate="btn_pdf">PDF</span>
                </button>
                <button type="button" id="excel_lenguaje" data-dismiss="modal"
                        class="btn default bg-green btn-rounded">
                    <span class="hidden-480" data-translate="btn_excel">Excel</span>
                </button>
            </div>
            <div class="portlet-body form table-scrollable">


                <div class="pdf-page size-a4" id="table_lenguaje_pdf">
                    <div class="pdf-header">
                        <h2>Listado de Lenguajes</h2>
                    </div>
                    <div class="pdf-body">
                        <div style="" class="" data-role="grid" id="">
                            <table class="table table-striped table-advance">
                                <thead>
                                <th nowrap="">
                                    lenguaje
                                </th>

                                </thead>
                                <tbody id="tbody_table_lenguaje">
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--                Fin de Ventana lenguaje-->
<!--                Ventana para importar -->

<div id="import_lenguaje" role="dialog" class="modal fade" tabindex="-1" data-backdrop="static" data-keyboard="false"
     data-attention-animation="true" data-width="50%">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
    </div>
    <div class="modal-body">
        <div class="portlet light bg-inverse">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-equalizer font-red-sunglo"></i>
                    <span class="caption-subject font-red-sunglo bold uppercase" id="title_lenguaje_imp">Importar de lenguaje</span>
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
                            <button type="button" id="importar_lenguaje_excel" class="btn green pull-right">Importar
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<form action="lenguaje/excel" method="post" id="form_excel_export" style="display: none">
    <input type="hidden" name="_onto_CSRF" value="<?php echo Yii::$app->getRequest()->csrfToken ?>">
    <input type="hidden" id="lenguaje_export" name="lenguaje_export" value="">
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
                        lenguaje: #:lenguaje#
                    </li>
                </ul>
            </div>
        </div>
    </div>
</script>
