<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Plan */

$this->title = $model->nombre_p;
$this->params['breadcrumbs'][] = ['label' => 'Planes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="plan-view">

    <div class="row">
        <div class="col-sm-9" style="padding-bottom: 10px;">
            <h2><?= 'Plan - '.' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-3" style="margin-top: 15px">
            
            <?php
            if (!(Yii::$app->user->isGuest)) {
            		echo Html::a('Update', ['update', 'id' => $model->plan_id], ['class' => 'btn btn-primary']); 
            		echo Html::a('Delete', ['delete', 'id' => $model->plan_id], [
                		'class' => 'btn btn-danger',
                		'data' => [
                    		'confirm' => 'Are you sure you want to delete this item?',
                    		'method' => 'post',
                		],
            		]);
            }		
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        'nombre_p',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]);
?>
    </div>
    
    <div class="row table-responsive">
<?php
if($providerProgramas->totalCount){
    $gridColumnProgramas = [
        ['class' => 'yii\grid\SerialColumn'],
      //      'prg_id',
            [
                'attribute' => 'carre.nombre_c',
                'label' => 'Carrera'
            ],
            [
                'attribute' => 'mate.nombre_m',
                'label' => 'Materia'
            ],
            [
                'attribute' => 'cate.nombre_t',
                'label' => 'Catedra'
            ],
         //               'vale_desde',
   //         'vale_hasta',
      //      'archivo',
            [
				'attribute' => 'archivo',
				'format' =>'raw',
				'value' => function ($model) {
					return Html::a('Descargar',['programas/download','prg_id' => $model->prg_id,],['data-pjax' => 0]);
					}
			],
   //         'activo',
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
        'responsive'=>true,
    	  'hover'=>true,
        'columns' => $gridColumnProgramas
    ]);
}
?>

    </div>
</div>
