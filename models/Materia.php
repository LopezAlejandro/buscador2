<?php

namespace app\models;

use Yii;
use \app\models\base\Materia as BaseMateria;

/**
 * This is the model class for table "materia".
 */
class Materia extends BaseMateria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre_m'], 'required'],
            [['nombre_m'], 'string', 'max' => 200]
        ]);
    }
	
    /**
     * @inheritdoc
     
    public function attributeHints()
    {
        return [
            'materia_id' => 'Materia ID',
            'nombre_m' => 'Nombre M',
        ];
    } */
}
