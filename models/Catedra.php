<?php

namespace app\models;

use Yii;
use \app\models\base\Catedra as BaseCatedra;

/**
 * This is the model class for table "catedra".
 */
class Catedra extends BaseCatedra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre_t'], 'required'],
            [['nombre_t'], 'string', 'max' => 150]
        ]);
    }
	
    /**
     * @inheritdoc
     
    public function attributeHints()
    {
        return [
            'catedra_id' => 'Catedra ID',
            'nombre_t' => 'Nombre T',
        ];
    }*/
}
