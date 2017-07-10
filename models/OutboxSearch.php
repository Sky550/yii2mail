<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Outbox;

/**
 * OutboxSearch represents the model behind the search form about `app\models\Outbox`.
 */
class OutboxSearch extends Outbox
{
    public $begin_date;
    public $end_date;
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['receiver', 'theme', 'body', 'date','begin_date', 'end_date'], 'safe'],
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
        $query = Outbox::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
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
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'receiver', $this->receiver]);

        if (!empty($params['OutboxSearch']['body'])) {
                 $query->andFilterWhere(['or',['like', 'theme', $this->body],['like','body', $this->body]]);
             }
        if (!empty($params['OutboxSearch']['begin_date'])) {
            $query->andFilterWhere(['between','date','>='. $this->begin_date ? ($this->begin_date . ' 00:00:00') : null,
                '<='. $this->end_date ? ($this->end_date . ' 23:59:59'): null]);
        }

        return $dataProvider;
    }
}
