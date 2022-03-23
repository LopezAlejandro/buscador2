<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "materia".
 *
 * @property integer $materia_id
 * @property string $nombre_m
 *
 * @property \app\models\Programas[] $programas
 */
class Materia extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'programas'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_m'], 'required'],
            [['nombre_m'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'materia';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'materia_id' => 'Materia ID',
            'nombre_m' => 'Materia',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramas()
    {
        return $this->hasMany(\app\models\Programas::className(), ['mate_id' => 'materia_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\MateriaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MateriaQuery(get_called_class());
    }
}
