<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Carrera */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos'=> \yii\web\View::POS_END, 
    'viewParams' => [
        'class' => 'Programas', 
        'relID' => 'programas', 
        'value' => \yii\helpers\Json::encode($model->programas),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="carrera-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->errorSummary($model); ?>

    <?= $form->field($model, 'nombre_c')->label('Carrera')->textInput(['maxlength' => true, 'placeholder' => 'Carrera']) ?>

    <?= $form->field($model, 'sigla')->label('Sigla')->textInput(['maxlength' => true, 'placeholder' => 'Sigla']) ?>

    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode('Programas'),
            'content' => $this->render('_formProgramas', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->programas),
            ]),
        ],
    ];
 //   echo kartik\tabs\TabsX::widget([
 //       'items' => $forms,
 //       'position' => kartik\tabs\TabsX::POS_ABOVE,
 //       'encodeLabels' => false,
 //       'pluginOptions' => [
 //           'bordered' => true,
 //           'sideways' => true,
 //           'enableCache' => false,
 //       ],
 //   ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer , ['class'=> 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
