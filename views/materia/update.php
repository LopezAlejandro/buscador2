<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Materia */

$this->title = 'Update Materia : ' . ' ' . $model->nombre_m;
$this->params['breadcrumbs'][] = ['label' => 'Materias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_m, 'url' => ['view', 'id' => $model->materia_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="materia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
