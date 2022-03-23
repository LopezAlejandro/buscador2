<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Plan]].
 *
 * @see Plan
 */
class PlanQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Plan[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Plan|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
