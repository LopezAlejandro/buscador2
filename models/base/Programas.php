<?php

namespace app\models\base;

use Yii;

/**
 * This is the base model class for table "programas".
 *
 * @property integer $prg_id
 * @property integer $carre_id
 * @property integer $mate_id
 * @property integer $cate_id
 * @property integer $pln_id
 * @property integer $vale_desde
 * @property integer $vale_hasta
 * @property string $archivo
 * @property integer $activo
 *
 * @property \app\models\Carrera $carre
 * @property \app\models\Materia $mate
 * @property \app\models\Catedra $cate
 * @property \app\models\Plan $pln
 */
class Programas extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;


    /**
    * This function helps \mootensai\relation\RelationTrait runs faster
    * @return array relation names of this model
    */
    public function relationNames()
    {
        return [
            'carre',
            'mate',
            'cate',
            'pln'
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['carre_id', 'mate_id', 'cate_id', 'pln_id', 'vale_desde', 'vale_hasta', 'archivo'], 'required'],
            [['carre_id', 'mate_id', 'cate_id', 'pln_id', 'vale_desde', 'vale_hasta'], 'integer'],
            [['archivo'], 'string', 'max' => 50],
            [['activo'], 'string', 'max' => 1]
        ];
    }

    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'programas';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'prg_id' => 'Prg ID',
            'carre_id' => 'Carre ID',
            'mate_id' => 'Mate ID',
            'cate_id' => 'Cate ID',
            'pln_id' => 'Pln ID',
            'vale_desde' => 'Vale Desde',
            'vale_hasta' => 'Vale Hasta',
            'archivo' => 'Archivo',
            'activo' => 'Activo',
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarre()
    {
        return $this->hasOne(\app\models\Carrera::className(), ['carrera_id' => 'carre_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMate()
    {
        return $this->hasOne(\app\models\Materia::className(), ['materia_id' => 'mate_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCate()
    {
        return $this->hasOne(\app\models\Catedra::className(), ['catedra_id' => 'cate_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPln()
    {
        return $this->hasOne(\app\models\Plan::className(), ['plan_id' => 'pln_id']);
    }
    

    /**
     * @inheritdoc
     * @return \app\models\ProgramasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProgramasQuery(get_called_class());
    }
}
