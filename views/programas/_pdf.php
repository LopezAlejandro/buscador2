<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Programas */

$this->title = $model->vale_desde;
$this->params['breadcrumbs'][] = ['label' => 'Programas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="programas-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= 'Programas'.' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'carre.carrera_id',
                'label' => 'Carre'
            ],
        [
                'attribute' => 'mate.materia_id',
                'label' => 'Mate'
            ],
        [
                'attribute' => 'cate.catedra_id',
                'label' => 'Cate'
            ],
        [
                'attribute' => 'pln.plan_id',
                'label' => 'Pln'
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
</div>
