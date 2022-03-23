<?php

namespace app\models;

use Yii;
use \app\models\base\Carrera as BaseCarrera;

/**
 * This is the model class for table "carrera".
 */
class Carrera extends BaseCarrera
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['nombre_c', 'sigla'], 'required'],
            [['nombre_c'], 'string', 'max' => 50],
            [['sigla'], 'string', 'max' => 10],
            [['nombre_c'], 'unique']
        ]);
    }
	
}
