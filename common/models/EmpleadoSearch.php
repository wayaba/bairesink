<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Empleado;

/**
 * EmpleadoSearch represents the model behind the search form about `common\models\Empleado`.
 */
class EmpleadoSearch extends Empleado
{
    public $nombre;
    public $apellido;
    public $telefono_fijo;
    public $telefono_celular;
    public $email;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_persona'], 'integer'],
            [['CUIT', 'observacion','nombre','apellido','telefono_fijo', 'telefono_celular', 'email'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Empleado::find();

        // add conditions that should always apply here
        $query->joinWith(['persona']);
        
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
            'attributes' => [
                'id',
                
                'nombre' => [
                    'asc' => ['persona.nombre' => SORT_ASC],
                    'desc' => ['persona.nombre' => SORT_DESC],
                ],
                'apellido' => [
                    'asc' => ['persona.apellido' => SORT_ASC],
                    'desc' => ['persona.apellido' => SORT_DESC],
                ],
                'telefono_fijo' => [
                    'asc' => ['persona.telefono_fijo' => SORT_ASC],
                    'desc' => ['persona.telefono_fijo' => SORT_DESC],
                ],
                'telefono_celular' => [
                    'asc' => ['persona.telefono_celular' => SORT_ASC],
                    'desc' => ['persona.telefono_celular' => SORT_DESC],
                ],
                'email' => [
                    'asc' => ['persona.email' => SORT_ASC],
                    'desc' => ['persona.email' => SORT_DESC],
                ]
            ]
        ]);
        
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_persona' => $this->id_persona,
        ]);

        $query->andFilterWhere(['like', 'CUIT', $this->CUIT])
            ->andFilterWhere(['like', 'observacion', $this->observacion])
            ->andFilterWhere(['like', 'persona.nombre', $this->nombre])
            ->andFilterWhere(['like', 'persona.apellido', $this->apellido])
            ->andFilterWhere(['like', 'persona.telefono_fijo', $this->telefono_fijo])
            ->andFilterWhere(['like', 'persona.telefono_celular', $this->telefono_celular])
            ->andFilterWhere(['like', 'persona.email', $this->email]);

        return $dataProvider;
    }
}
