<?php

namespace app\models;

use Yii;
use \app\models\base\Programas as BaseProgramas;

/**
 * This is the model class for table "programas".
 */
class Programas extends BaseProgramas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['carre_id', 'mate_id', 'cate_id', 'pln_id', 'vale_desde', 'archivo'], 'required'],
            [['carre_id', 'mate_id', 'cate_id', 'pln_id', 'vale_desde', 'vale_hasta'], 'integer'],
            [['archivo'], 'string', 'max' => 50],
            [['activo'], 'integer', 'max' => 1]
        ]);
    }
    
	 public function beforeSave($insert)
	 {
	 		if(!isset($this->vale_hasta)) 
				{
					$this->vale_hasta = '3000'; 	
			   }
			if(!isset($this->activo)) 
				{
					$this->activo = '1'; 	
			   }   
		return parent::beforeSave($insert);
	 }

	
}
