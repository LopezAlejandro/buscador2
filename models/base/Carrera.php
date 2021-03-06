<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "carrera".
 *
 * @property integer $carrera_id
 * @property string $nombre_c
 * @property string $sigla
 *
 * @property \app\models\Programas[] $programas
 */
class Carrera extends \yii\db\ActiveRecord
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
            [['nombre_c', 'sigla'], 'required'],
            [['nombre_c'], 'string', 'max' => 50],
            [['sigla'], 'string', 'max' => 10],
            [['nombre_c'], 'unique']
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'carrera';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'carrera_id' => 'Carrera ID',
            'nombre_c' => 'Carrera',
            'sigla' => 'Sigla',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramas()
    {
        return $this->hasMany(\app\models\Programas::className(), ['carre_id' => 'carrera_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\CarreraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CarreraQuery(get_called_class());
    }
}
