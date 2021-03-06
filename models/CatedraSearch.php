<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Catedra;

/**
 * app\models\CatedraSearch represents the model behind the search form about `app\models\Catedra`.
 */
 class CatedraSearch extends Catedra
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['catedra_id'], 'integer'],
            [['nombre_t'], 'safe'],
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
        $query = Catedra::find();

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
            'catedra_id' => $this->catedra_id,
        ]);

        $query->andFilterWhere(['like', 'nombre_t', $this->nombre_t]);

        return $dataProvider;
    }
}
