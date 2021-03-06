<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "catedra".
 *
 * @property integer $catedra_id
 * @property string $nombre_t
 *
 * @property \app\models\Programas[] $programas
 */
class Catedra extends \yii\db\ActiveRecord
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
            [['nombre_t'], 'required'],
            [['nombre_t'], 'string', 'max' => 150]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'catedra';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'catedra_id' => 'Catedra ID',
            'nombre_t' => 'Catedra',       ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramas()
    {
        return $this->hasMany(\app\models\Programas::className(), ['cate_id' => 'catedra_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\CatedraQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\CatedraQuery(get_called_class());
    }
}
