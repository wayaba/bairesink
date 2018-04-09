<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "direccion".
 *
 * @property integer $id
 * @property string $calle
 * @property integer $altura
 * @property string $piso
 * @property string $provincia
 * @property string $localidad
 * @property integer $codigo_postal
 *
 * @property Persona[] $personas
 */
class Direccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'direccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['altura', 'codigo_postal'], 'integer'],
            [['calle'], 'string', 'max' => 100],
            [['piso', 'provincia', 'localidad'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'calle' => 'Calle',
            'altura' => 'Altura',
            'piso' => 'Piso',
            'provincia' => 'Provincia',
            'localidad' => 'Localidad',
            'codigo_postal' => 'Codigo Postal',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPersonas()
    {
        return $this->hasMany(Persona::className(), ['id_direccion' => 'id']);
    }

    /**
     * @inheritdoc
     * @return DireccionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DireccionQuery(get_called_class());
    }
}
