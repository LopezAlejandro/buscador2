<?php

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProgramasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

use yii\helpers\Html;
use kartik\export\ExportMenu;
use kartik\grid\GridView;

$this->title = 'Programas';
$this->params['breadcrumbs'][] = $this->title;
$search = "$('.search-button').click(function(){
	$('.search-form').toggle(1000);
	return false;
});";
$this->registerJs($search);
?>
<div class="programas-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php
		if (!(Yii::$app->user->isGuest)) {
			echo Html::a('Create Programas', ['create'], ['class' => 'btn btn-success']).' ';		
		} 
		echo Html::a('Advance Search', '#', ['class' => 'btn btn-info search-button']);
			
     ?>
    </p>
    <div class="search-form" style="display:none">
        <?=  $this->render('_search', ['model' => $searchModel]); ?>
    </div>
    <?php 
    $gridColumn = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'carre_id',
                'label' => 'Carrera',
                'value' => function($model){                   
                    return $model->carre->nombre_c;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Carrera::find()->orderBy('nombre_c')->asArray()->all(), 'carrera_id', 'nombre_c'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Carrera', 'id' => 'grid-programas-search-carre_id']
            ],
        [
                'attribute' => 'mate_id',
                'label' => 'Materia',
                'value' => function($model){                   
                    return $model->mate->nombre_m;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Materia::find()->orderBy('nombre_m')->asArray()->all(), 'materia_id', 'nombre_m'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Materia', 'id' => 'grid-programas-search-mate_id']
            ],
        [
                'attribute' => 'cate_id',
                'label' => 'Catedra',
                'value' => function($model){                   
                    return $model->cate->nombre_t;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Catedra::find()->orderBy('nombre_t')->asArray()->all(), 'catedra_id', 'nombre_t'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Catedra', 'id' => 'grid-programas-search-cate_id']
            ],
        [
                'attribute' => 'pln_id',
                'label' => 'Plan',
                'value' => function($model){                   
                    return $model->pln->nombre_p;                   
                },
                'filterType' => GridView::FILTER_SELECT2,
                'filter' => \yii\helpers\ArrayHelper::map(\app\models\Plan::find()->asArray()->all(), 'plan_id', 'nombre_p'),
                'filterWidgetOptions' => [
                    'pluginOptions' => ['allowClear' => true],
                ],
                'filterInputOptions' => ['placeholder' => 'Plan', 'id' => 'grid-programas-search-pln_id']
            ],
            [
            	'attribute' => 'vale_desde',
            	'label' => 'A??o',
            ],
        [
				'attribute' => 'archivo',
				'format' =>'raw',
				'hiddenFromExport' => true,
				'value' => function ($model) {
					return Html::a('Descargar',['programas/download','prg_id' => $model->prg_id,],['data-pjax' => 0]);
					},
			
			],
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{save-as-new} {view} {update} {delete}',
            'buttons' => [
                'save-as-new' => function ($url) {
                    return Html::a('<span class="glyphicon glyphicon-copy"></span>', $url, ['title' => 'Save As New']);
                },
            ],
             'visible' => !Yii::$app->user->isGuest,
        ],
    ]; 
    ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => $gridColumn,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-programas']],
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => '<span class="glyphicon glyphicon-book"></span>  ' . Html::encode($this->title),
        ],
        // your toolbar can include the additional full export menu
        'toolbar' => [
            ExportMenu::widget([
                'dataProvider' => $dataProvider,
                'columns' => $gridColumn,
                'target' => ExportMenu::TARGET_BLANK,
                'fontAwesome' => true,
                'dropdownOptions' => [
                    'label' => 'Full',
                    'class' => 'btn btn-default',
                    'itemsBefore' => [
                        '<li class="dropdown-header">Export All Data</li>',
                    ],
                ],
            ]) ,
        ],
    ]); ?>

</div>
