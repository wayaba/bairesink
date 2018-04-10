<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "perfil_impresion".
 *
 * @property integer $id
 * @property string $descripcion
 */
class PerfilImpresion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'perfil_impresion';
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
     * @return MaquinaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new MaquinaQuery(get_called_class());
    }
}
