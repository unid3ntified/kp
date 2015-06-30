<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MsrnRouting;

/**
 * MsrnRoutingSearch represents the model behind the search form about `app\models\MsrnRouting`.
 */
class MsrnRoutingSearch extends MsrnRouting
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['No'], 'integer'],
            [['cluster', 'mss', 'first_route', 'second_route', 'remark'], 'safe'],
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
        $query = MsrnRouting::find();

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
            'No' => $this->No,
        ]);

        $query->andFilterWhere(['like', 'cluster', $this->cluster])
            ->andFilterWhere(['like', 'mss', $this->mss])
            ->andFilterWhere(['like', 'first_route', $this->first_route])
            ->andFilterWhere(['like', 'second_route', $this->second_route])
            ->andFilterWhere(['like', 'remark', $this->remark]);

        return $dataProvider;
    }
}
