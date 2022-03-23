<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Catedra */

$this->title = 'Crear Catedra';
$this->params['breadcrumbs'][] = ['label' => 'Catedras', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="catedra-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
