<?php

/* @var $this yii\web\View */
$usuario = Yii::$app->getUser()->identity;
$this->title = 'ONTO 360';
?>
<div class="row">
    <div class="col-md-6 col-xlg-6">
        <div class="row">
            <div class="col-md-12 m-b-10">
                <div class="ar-3-2 widget-1-wrapper">
                    <!-- START WIDGET widget_imageWidget-->
                    <div class="widget-1 panel no-border bg-complete no-margin widget-loader-circle-lg">
                        <div class="panel-heading top-right ">
                            <div class="panel-controls">
                                <ul>
                                    <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#"></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="pull-bottom bottom-left bottom-right ">
                                <h2 class="text-white">El término ontología tiene su origen en la filosofía</h2>
                                <p class="text-white hint-text">Proviene de onto del griego ὄντος "lo que se es"</p>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 m-b-10">
                <div class="ar-2-1">
                    <div class="widget-4 panel no-border  no-margin widget-loader-bar">
                        <div class="container-sm-height full-height">
                            <div class="row-sm-height">
                                <div class="col-sm-height col-top">
                                    <div class="panel-heading ">
                                        <div class="panel-title text-black hint-text">
                                            <span class="font-montserrat fs-11 all-caps">
                                                Ontologías grandes y robustas existentes
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row-sm-height">
                                <div class="col-sm-height col-top">
                                    <div class="p-l-20 p-r-20">
                                        <p class=" bold font-montserrat ">WordNet
                                            <br>Cyc
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="row-sm-height">
                                <div class="col-sm-height col-bottom ">
                                    <div class="widget-4-chart line-chart " data-line-color="success"
                                        data-area-color="success-light" data-y-grid="false" data-points="false"
                                        data-stroke-width="2">
                                        <svg></svg>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
            <div class="col-sm-6 m-b-10">
                <div class="ar-2-1">
                    <!-- START WIDGET widget_barTile-->
                    <div class="widget-5 panel no-border  widget-loader-bar">
                        <div class="panel-heading pull-top top-right">
                            <div class="panel-controls">
                                <ul>
                                    <li><a data-toggle="refresh" class="portlet-refresh text-black" href="#">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="full-height">
                            <div class=" row-sm-height">
                                <div class="panel-heading">
                                    <div class="panel-title  ">
                                        <span class="font-montserrat fs-11 all-caps">
                                            Lenguajes ontológicos
                                        </span>
                                        <br>
                                        <p class=" bold font-montserrat ">OWL
                                            <br>CycL <br>RDF <br>OBO
                                        </p>
                                    </div>
                                </div>
                                <div class="col-xs-7 col-xs-height col-bottom relative widget-5-chart-container">
                                    <div class="widget-5-chart"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xlg-6">
        <div class="row">
            <div class="col-sm-6 m-b-10">
                <div class="ar-1-1">
                    <!-- START WIDGET widget_imageWidgetBasic-->
                    <div class="widget-2 panel no-border bg-primary widget widget-loader-circle-lg no-margin">
                        <div class="panel-body">
                            <div class="pull-bottom bottom-left bottom-right padding-25">
                                <span class="label font-montserrat fs-11">Conocimiento</span>
                                <br>
                                <h5 class="text-white">Tanto en Informática como en Filosofía,una Ontología es la
                                    representación de entidades, ideas y eventos, junto con sus propiedades y
                                    relaciones.</h5>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
            <div class="col-sm-6 m-b-10">
                <div class="ar-1-1">
                    <!-- START WIDGET widget_plainLiveWidget-->
                    <div class="widget-3 panel no-border bg-complete no-margin widget-loader-bar">
                        <div class="panel-body no-padding">
                            <div class="metro live-tile" data-mode="carousel" data-start-now="true" data-delay="6000">
                                <div class="slide-front tiles slide active">
                                    <div class="padding-30">
                                        <br>
                                        <span class="label font-montserrat fs-14">Historia</span>
                                        <br>
                                        <br>
                                        <h5 class="text-white">Desde mediados de 1970, investigadores en el campo de la
                                            inteligencia artificial (IA) reconocieron que capturar el conocimiento</h5>

                                    </div>
                                </div>
                                <div class="slide-back tiles">
                                    <div class="padding-30">
                                        <br>
                                        <span class="label font-montserrat fs-14">Historia</span>
                                        <br>
                                        <br>
                                        <h5> es la clave para construir grandes y poderosos sistemas de IA</h5>
                                    </div>
                                </div>
                                <div class="slide-back tiles">
                                    <div class="padding-30">
                                        <br>
                                        <span class="label font-montserrat fs-14">Historia</span>
                                        <br>
                                        <h5 class="text-white hint-text hidden-md">Los investigadores de IA argumentaron
                                            que ellos podrían crear nuevas ontologías como modelos computacionales que
                                            permitieran cierto grado de razonamiento automático</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- END WIDGET -->
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 m-b-10">
                <div class="ar-1-1">
                    <div class="panel no-border bg-master widget widget-6 widget-loader-circle-lg no-margin">
                        <div class="panel-body">
                            <div class="pull-bottom bottom-left bottom-right padding-25">
                                <span class="label font-montserrat fs-14">Ingeniería de Ontología</span>
                                <h5 class="text-white">Rama de la ingeniería del conocimiento que estudia el proceso de
                                    desarrollo de las ontología</h5>
                                <p class="text-white">su ciclo de vida, los métodos y las metodologías para construirla,
                                    así como las herramientas y lenguajes que las soportan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 m-b-10">
                <div class="ar-1-1">
                    <!-- START WIDGET D3 widget_graphLiveWidget-->
                    <div class="widget-7 panel no-border bg-success no-margin">
                        <div class="panel-body no-padding">
                            <div class="metro live-tile " data-delay="7000" data-mode="carousel">
                                <div class="slide-front tiles slide active">
                                    <div class="padding-30">
                                        <br>
                                        <span class="label font-montserrat fs-14"><i class="fa fa-plus"></i>
                                            Historia</span>
                                        <br>
                                        <h5 class="text-white">A principios de los 90, una página web y un artículo muy
                                            citados:"Toward Principles for the Design of Ontologies Used for Knowledge
                                            Sharing" por Tom Gruber</h5>
                                    </div>
                                </div>
                                <div class="slide-back tiles">
                                    <div class="padding-30">
                                        <br>
                                        <span class="label font-montserrat fs-14"><i class="fa fa-plus"></i>
                                            Historia</span>
                                        <br>
                                        <h5 class="text-white">reconocieron una definición deliberada de ontología, como
                                            un término técnico en ciencia de la computación .</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>