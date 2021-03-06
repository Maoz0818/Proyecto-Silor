<?php

namespace backend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ItemEspacio;

/**
 * ItemEspacioSearch represents the model behind the search form about `backend\models\ItemEspacio`.
 */
class ItemEspacioSearch extends ItemEspacio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['item_espacio_id', 'espacio_id', 'event_id'], 'integer'],
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
        $query = ItemEspacio::find();

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
            'item_espacio_id' => $this->item_espacio_id,
            'espacio_id' => $this->espacio_id,
            'event_id' => $this->event_id,
        ]);

        return $dataProvider;
    }
}
