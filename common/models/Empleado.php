<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empleado".
 *
 * @property integer $id
 * @property string $CUIT
 * @property string $observacion
 * @property integer $id_persona
 *
 * @property Persona $idPersona
 */
class Empleado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empleado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_persona'], 'required'],
            [['id_persona'], 'integer'],
            [['CUIT'], 'string', 'max' => 45],
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
            'CUIT' => 'Cuit',
            'observacion' => 'Observacion',
            'id_persona' => 'Id Persona',
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
     * @return EmpleadoQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpleadoQuery(get_called_class());
    }
}
