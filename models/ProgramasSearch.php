<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Programas;

/**
 * app\models\ProgramasSearch represents the model behind the search form about `app\models\Programas`.
 */
 class ProgramasSearch extends Programas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['prg_id', 'carre_id', 'mate_id', 'cate_id', 'pln_id', 'vale_desde', 'vale_hasta'], 'integer'],
            [['archivo', 'activo'], 'safe'],
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
        $query = Programas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'prg_id' => $this->prg_id,
            'carre_id' => $this->carre_id,
            'mate_id' => $this->mate_id,
            'cate_id' => $this->cate_id,
            'pln_id' => $this->pln_id,
            'vale_desde' => $this->vale_desde,
            'vale_hasta' => $this->vale_hasta,
        ]);

        $query->andFilterWhere(['like', 'archivo', $this->archivo])
            ->andFilterWhere(['like', 'activo', $this->activo]);

        return $dataProvider;
    }
}
