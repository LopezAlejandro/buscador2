<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Programas */

$this->title = 'Save As New Programas: '. ' ' . $model->mate->nombre_m .' - '.$model->cate->nombre_t;
$this->params['breadcrumbs'][] = ['label' => 'Programas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mate->nombre_m .' - '.$model->cate->nombre_t, 'url' => ['view', 'id' => $model->prg_id]];
$this->params['breadcrumbs'][] = 'Save As New';
?>
<div class="programas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
