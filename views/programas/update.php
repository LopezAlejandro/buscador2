<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Programas */

$this->title = 'Update Programas: ' . ' ' . $model->mate->nombre_m .' - '.$model->cate->nombre_t;
$this->params['breadcrumbs'][] = ['label' => 'Programas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->mate->nombre_m .' - '.$model->cate->nombre_t, 'url' => ['view', 'id' => $model->prg_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="programas-update">

    <h3><?= Html::encode($this->title) ?></h3>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
