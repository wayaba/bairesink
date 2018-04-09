<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[Contacto]].
 *
 * @see Contacto
 */
class ContactoQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Contacto[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Contacto|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
