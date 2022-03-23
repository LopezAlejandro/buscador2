<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Catedra]].
 *
 * @see Catedra
 */
class CatedraQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Catedra[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Catedra|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
