<?php

namespace app\models;

use Yii;
use \app\models\base\Plan as BasePlan;

/**
 * This is the model class for table "plan".
 */
class Plan extends BasePlan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre_p'], 'required'],
            [['nombre_p'], 'string', 'max' => 50]
        ]);
    }
	
    /**
     * @inheritdoc
     
    public function attributeHints()
    {
        return [
            'plan_id' => 'Plan ID',
            'nombre_p' => 'Nombre P',
        ];
    }*/
}
