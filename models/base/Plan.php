<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "plan".
 *
 * @property integer $plan_id
 * @property string $nombre_p
 *
 * @property \app\models\Programas[] $programas
 */
class Plan extends \yii\db\ActiveRecord
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
            [['nombre_p'], 'required'],
            [['nombre_p'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plan';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'plan_id' => 'Plan ID',
            'nombre_p' => 'Plan',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProgramas()
    {
        return $this->hasMany(\app\models\Programas::className(), ['pln_id' => 'plan_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\PlanQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\PlanQuery(get_called_class());
    }
}
