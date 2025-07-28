<?php $this->title = 'Visualizar'; ?>

<div class="row">
    <div class="col-md-4">
        <h3><strong>Ontologia</strong> <?= $model->nombre ?></h3>
        <p>Jerarquía de clases de la ontología <?= $model->nombre ?></p>
        <br>
        <div id="tree1"></div>
    </div>
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
    </div>
</div>