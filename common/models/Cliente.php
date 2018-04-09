<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cliente".
 *
 * @property integer $id
 * @property string $observacion
 * @property integer $id_persona
 * @property string $observacion
 * @property string $nombre
 * @property string $apellido
 * @property string $telefono_fijo
 * @property string $telefono_celular
 * @property string $email
 *
 * @property Persona $idPersona
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona'], 'required'],
            [['id_persona'], 'integer'],
            [['observacion'], 'string', 'max' => 255],
            [['id_persona'], 'exist', 'skipOnError' => true, 'targetClass' => Persona::className(), 'targetAttribute' => ['id_persona' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'observacion' => 'Observación',
            'id_persona' => 'Id Persona',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'telefono_fijo' => 'Telefono Fijo',
            'telefono_celular' => 'Telefono Celular',
            'email' => 'Correo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersona()
    {
        return $this->hasOne(Persona::className(), ['id' => 'id_persona']);
    }

    /**
     * @inheritdoc
     * @return ClienteQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ClienteQuery(get_called_class());
    }
}
