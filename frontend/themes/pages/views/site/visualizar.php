<div class="container-fluid container-fixed-lg">
    <div class="row">
        <div class="col-md-12">
            <h3><strong>Ontología</strong> "<?= $ontologia->nombre?>" </h3>
            <br>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4 ">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Clases
                    </div>
                </div>
                <div class="panel-body">
                    <?php if (count($classlist)>0){?>
                        <?php foreach ($classlist as $index=>$class){
                            $clase=explode('#',$index);
                            $c=array_pop($clase);
                            ?>
                            <li><i class="fs-14 sl-docs"></i> <?= $c?> </li>
                        <?php }?>
                    <?php }else{?>
                        <li>No se cargó ninguna clase </li>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Subclases
                    </div>
                </div>
                <div class="panel-body">
                    <?php if (count($subclasslist)>0){?>
                        <?php foreach ($subclasslist as $index=>$subclass){
                            $subclase=explode('#',$index);
                            $sc=array_pop($subclase);
                            ?>
                            <li><i class="fs-14 sl-docs"></i> <?= $c?> </li>
                        <?php }?>
                    <?php }else{?>
                        <li>No se cargó ninguna subclase </li>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="col-md-2 ">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Propiedades
                    </div>
                </div>
                <div class="panel-body">
                    <?php if (count($proplist)>0){?>
                        <?php foreach ($proplist as $index=>$prop){
                            $propiedad=explode('#',$index);
                            $p=array_pop($propiedad);
                            ?>
                            <li><i class="fs-14 sl-docs"></i> <?= $p?> </li>
                        <?php }?>
                    <?php }else{?>
                        <li>No se cargó ninguna propiedad </li>
                    <?php }?>
                </div>
            </div>
        </div>
        <div class="col-md-4 ">
            <!-- START PANEL -->
            <div class="panel panel-transparent">
                <div class="panel-heading">
                    <div class="panel-title">Instancias
                    </div>
                </div>
                <div class="panel-body">
                    <?php if (count($instlist)>0){?>
                        <?php foreach ($instlist as $index=>$class){
                            $inst=array_shift($class);
                            $instancia=explode('#',$inst);
                            $i=array_pop($instancia);
                            ?>
                            <li><i class="fs-14 sl-docs"></i> <?= $i?> </li>
                        <?php }?>
                    <?php }else{?>
                        <li>No se cargó ninguna instancia </li>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>