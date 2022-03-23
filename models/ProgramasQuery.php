<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Programas]].
 *
 * @see Programas
 */
class ProgramasQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Programas[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Programas|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
