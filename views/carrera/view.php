<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Carrera */

$this->title = $model->nombre_c;
$this->params['breadcrumbs'][] = ['label' => 'Carreras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrera-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Carrera'.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->carrera_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->carrera_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app','Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'nombre_c',
        'sigla',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row">
<?php
if($providerProgramas->totalCount){
    $gridColumnProgramas = [
        ['class' => 'yii\grid\SerialColumn'],
            'prg_id',
                        [
                'attribute' => 'mate.nombre_m',
                'label' => 'Materia'
            ],
            [
                'attribute' => 'cate.nombre_t',
                'label' => 'Catedra'
            ],
            [
                'attribute' => 'pln.nombre_p',
                'label' => 'Plan'
            ],
            'vale_desde',
            'vale_hasta',
            'archivo',
    //        'activo',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerProgramas,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-programas']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode('Programas'),
        ],
        'export' => false,
        'columns' => $gridColumnProgramas
    ]);
}
?>

    </div>
</div>
