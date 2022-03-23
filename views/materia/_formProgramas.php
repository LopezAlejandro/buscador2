<div class="form-group" id="add-programas">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'Programas',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        'prg_id' => ['type' => TabularForm::INPUT_HIDDEN],
        'carre_id' => [
            'label' => 'Carrera',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Carrera::find()->orderBy('carrera_id')->asArray()->all(), 'carrera_id', 'nombre_c'),
                'options' => ['placeholder' => 'Choose Carrera'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'cate_id' => [
            'label' => 'Catedra',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Catedra::find()->orderBy('catedra_id')->asArray()->all(), 'catedra_id', 'nombre_t'),
                'options' => ['placeholder' => 'Choose Catedra'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'pln_id' => [
            'label' => 'Plan',
            'type' => TabularForm::INPUT_WIDGET,
            'widgetClass' => \kartik\widgets\Select2::className(),
            'options' => [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Plan::find()->orderBy('plan_id')->asArray()->all(), 'plan_id', 'nombre_p'),
                'options' => ['placeholder' => 'Choose Plan'],
            ],
            'columnOptions' => ['width' => '200px']
        ],
        'vale_desde' => ['type' => TabularForm::INPUT_TEXT],
        'vale_hasta' => ['type' => TabularForm::INPUT_TEXT],
        'archivo' => ['type' => TabularForm::INPUT_TEXT],
        'activo' => ['type' => TabularForm::INPUT_CHECKBOX,
            'options' => [
                'style' => 'position : relative; margin-top : -9px'
            ]
        ],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return
                    Html::hiddenInput('Children[' . $key . '][id]', (!empty($model['id'])) ? $model['id'] : "") .
                    Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  'Delete', 'onClick' => 'delRowProgramas(' . $key . '); return false;', 'id' => 'programas-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . 'Add Programas', ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowProgramas()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

