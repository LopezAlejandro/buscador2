<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Programas */

$this->title = $model->mate->nombre_m .' - '.$model->cate->nombre_t ;
$this->params['breadcrumbs'][] = ['label' => 'Programas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programas-view">

    <div class="row">
        <div class="col-sm-8">
            <h3><?= 'Programas'.' '. Html::encode($this->title) ?></h3>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . 'PDF', 
                ['pdf', 'id' => $model->prg_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => 'Will open the generated PDF file in a new window'
                ]
            )?>
            <?= Html::a('Save As New', ['save-as-new', 'id' => $model->prg_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a('Update', ['update', 'id' => $model->prg_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->prg_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'carre.nombre_c',
            'label' => 'Carrera',
        ],
        [
            'attribute' => 'mate.nombre_m',
            'label' => 'Materia',
        ],
        [
            'attribute' => 'cate.nombre_t',
            'label' => 'Catedra',
        ],
        [
            'attribute' => 'pln.nombre_p',
            'label' => 'Plan',
        ],
        'vale_desde',
        'archivo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    <div class="row">
        <h4>Carrera :<?= ' '. Html::encode($model->carre->nombre_c) ?></h4>
    </div>
    <?php 
    $gridColumnCarrera = [
        'carrera_id',
        'nombre_c',
        'sigla',
    ];
    echo DetailView::widget([
        'model' => $model->carre,
        'attributes' => $gridColumnCarrera    ]);
    ?>
    <div class="row">
        <h4>Materia :<?= ' '. Html::encode($model->mate->nombre_m) ?></h4>
    </div>
    <?php 
    $gridColumnMateria = [
        'materia_id',
        'nombre_m',
    ];
    echo DetailView::widget([
        'model' => $model->mate,
        'attributes' => $gridColumnMateria    ]);
    ?>
    <div class="row">
        <h4>Catedra :<?= ' '. Html::encode($model->cate->nombre_t) ?></h4>
    </div>
    <?php 
    $gridColumnCatedra = [
        'catedra_id',
        'nombre_t',
    ];
    echo DetailView::widget([
        'model' => $model->cate,
        'attributes' => $gridColumnCatedra    ]);
    ?>
    <div class="row">
        <h4>Plan :<?= ' '. Html::encode($model->pln->nombre_p) ?></h4>
    </div>
    <?php 
    $gridColumnPlan = [
        'plan_id',
        'nombre_p',
    ];
    echo DetailView::widget([
        'model' => $model->pln,
        'attributes' => $gridColumnPlan    ]);
    ?>
</div>
