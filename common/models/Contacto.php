<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "contacto".
 *
 * @property integer $id
 * @property string $telefono_fijo
 * @property string $telefono_celular
 * @property string $email
 *
 * @property Persona[] $personas
 */
class Contacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['telefono_fijo', 'telefono_celular', 'email'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'telefono_fijo' => 'Telefono Fijo',
            'telefono_celular' => 'Telefono Celular',
            'email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['id_contacto' => 'id']);
    }

    /**
     * @inheritdoc
     * @return ContactoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ContactoQuery(get_called_class());
    }
}
