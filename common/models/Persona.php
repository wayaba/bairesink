<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "persona".
 *
 * @property integer $id
 * @property string $nombre
 * @property string $apellido
 * @property string $fecha_nacimiento
 * @property string $telefono_fijo
 * @property string $telefono_celular
 * @property string $email
 * @property string $direccion_calle
 * @property string $direccion_numero
 * @property string $direccion_localidad
 * @property string $direccion_provincia
 * @property string $direccion_codigo_postal
 * @property string $direccion_departamento
 * @property string $dni
 * @property integer $sexo
 *
 * @property Cliente[] $clientes
 * @property Empleado[] $empleados
 */
class Persona extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fecha_nacimiento'], 'safe'],
            [['nombre', 'apellido'], 'required'],
            [['sexo'], 'integer'],
            [['nombre', 'apellido', 'telefono_fijo', 'telefono_celular', 'email', 'direccion_numero', 'dni'], 'string', 'max' => 45],
            [['direccion_calle', 'direccion_localidad', 'direccion_provincia', 'direccion_codigo_postal', 'direccion_departamento'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nombre' => 'Nombre',
            'apellido' => 'Apellido',
            'fecha_nacimiento' => 'Fecha Nacimiento',
            'telefono_fijo' => 'Teléfono Fijo',
            'telefono_celular' => 'Teléfono Celular',
            'email' => 'Email',
            'direccion_calle' => 'Calle',
            'direccion_numero' => 'Número',
            'direccion_localidad' => 'Localidad',
            'direccion_provincia' => 'Provincia',
            'direccion_codigo_postal' => 'Código Postal',
            'direccion_departamento' => 'Departamento',
            'dni' => 'Dni',
            'sexo' => 'Sexo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['id_persona' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpleados()
    {
        return $this->hasMany(Empleado::className(), ['id_persona' => 'id']);
    }

    /**
     * @inheritdoc
     * @return PersonaQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PersonaQuery(get_called_class());
    }
}
