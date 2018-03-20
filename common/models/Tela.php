<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "tela".
 *
 * @property integer $id
 * @property string $descripcion
 */
class Tela extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tela';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
        ];
    }

    /**
     * @inheritdoc
     * @return TelaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TelaQuery(get_called_class());
    }
}
