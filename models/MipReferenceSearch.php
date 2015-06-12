<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MipReference;

/**
 * MipReferenceSearch represents the model behind the search form about `app\models\MipReference`.
 */
class MipReferenceSearch extends MipReference
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name_msc', 'nri_msc', 'nri', 'null_nri', 'non_broadcastLAI', 'cnid', 'cap_value', 'status', 'log_date', 'remark'], 'safe'],
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
        $query = MipReference::find();

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

        $query->andFilterWhere(['like', 'name_msc', $this->name_msc])
            ->andFilterWhere(['like', 'nri_msc', $this->nri_msc])
            ->andFilterWhere(['like', 'nri', $this->nri])
            ->andFilterWhere(['like', 'null_nri', $this->null_nri])
            ->andFilterWhere(['like', 'non_broadcastLAI', $this->non_broadcastLAI])
            ->andFilterWhere(['like', 'cnid', $this->cnid])
            ->andFilterWhere(['like', 'cap_value', $this->cap_value])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
