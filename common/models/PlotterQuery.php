<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Plotter]].
 *
 * @see Plotter
 */
class PlotterQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Plotter[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Plotter|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
