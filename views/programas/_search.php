<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProgramasSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-programas-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'carre_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Carrera::find()->orderBy('carrera_id')->asArray()->all(), 'carrera_id', 'nombre_c'),
        'options' => ['placeholder' => 'Choose Carrera'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'mate_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Materia::find()->orderBy('materia_id')->asArray()->all(), 'materia_id', 'nombre_m'),
        'options' => ['placeholder' => 'Choose Materia'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'cate_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Catedra::find()->orderBy('catedra_id')->asArray()->all(), 'catedra_id', 'nombre_t'),
        'options' => ['placeholder' => 'Choose Catedra'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'pln_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Plan::find()->orderBy('plan_id')->asArray()->all(), 'plan_id', 'nombre_p'),
        'options' => ['placeholder' => 'Choose Plan'],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); ?>

    <?= $form->field($model, 'vale_desde')->label('Valido desde')->textInput(['placeholder' => 'Vale Desde']) ?>

    <?php /* echo $form->field($model, 'archivo')->textInput(['maxlength' => true, 'placeholder' => 'Archivo']) */ ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
