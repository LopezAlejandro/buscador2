<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = $model->nombre_m;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="materia-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Materia : '.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?= Html::a('Update', ['update', 'id' => $model->materia_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->materia_id], [
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
        'nombre_m',
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
   //         'prg_id',
            [
                'attribute' => 'carre.nombre_c',
                'label' => 'Carrera'
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
            
            [
	        		'class' => '\kartik\grid\BooleanColumn',
					'attribute' => 'activo',
					'format' => 'boolean',
					'label' => 'Activo',        		
	        		'trueLabel' => 'Yes', 
        			'falseLabel' => 'No'
            ]
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
