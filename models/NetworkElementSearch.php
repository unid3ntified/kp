<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NetworkElement;

/**
 * NetworkElementSearch represents the model behind the search form about `app\models\NetworkElement`.
 */
class NetworkElementSearch extends NetworkElement
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['network_element_id', 'gt_address', 'location', 'provinsi', 'vendor', 'gtt', 'status', 'log_date', 'remark'], 'safe'],
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
        $query = NetworkElement::find();

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
            'log_date' => $this->log_date,
        ]);

        $query->andFilterWhere(['like', 'network_element_id', $this->network_element_id])
            ->andFilterWhere(['like', 'gt_address', $this->gt_address])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'provinsi', $this->provinsi])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'gtt', $this->gtt])
         //   ->andFilterWhere(['like', 'inat0', $this->inat0])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
