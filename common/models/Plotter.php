<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "plotter".
 *
 * @property integer $id
 * @property string $descripcion
 */
class Plotter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'plotter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
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
     * @return PlotterQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PlotterQuery(get_called_class());
    }
}
