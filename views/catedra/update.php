<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Catedra */

$this->title = 'Update Catedra : ' . ' ' . $model->nombre_t;
$this->params['breadcrumbs'][] = ['label' => 'Catedras', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->nombre_t, 'url' => ['view', 'id' => $model->catedra_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="catedra-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
