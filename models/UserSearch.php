<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\User;

/**
 * UserSearch represents the model behind the search form about `app\models\User`.
 */
class UserSearch extends User
{
    public $search;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ID', 'status'], 'integer'],
            [['search','username', 'password_hash', 'password_reset_token', 'auth_key', 'email', 'created_at', 'updated_at', 'Phone'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->orFilterWhere([
            //'ID' => $this->ID,
            //'status' => $this->status,
            'created_at' => $this->search,
            'updated_at' => $this->search,
        ]);

        $query->orFilterWhere(['like', 'username', $this->search])
            //->andFilterWhere(['like', 'password_hash', $this->password_hash])
            //->andFilterWhere(['like', 'password_reset_token', $this->password_reset_token])
            //->andFilterWhere(['like', 'auth_key', $this->auth_key])
            ->orFilterWhere(['like', 'email', $this->search]);
            //->andFilterWhere(['like', 'Phone', $this->Phone]);

        return $dataProvider;
    }
}
