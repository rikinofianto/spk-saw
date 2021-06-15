<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\SubKriteria as SubKriteriaModel;

/**
 * SubKriteria represents the model behind the search form of `app\models\SubKriteria`.
 */
class SubKriteria extends SubKriteriaModel
{
    public $is_parent;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_subkriteria', 'id_kriteria', 'id_parent_subkriteria', 'is_parent'], 'integer'],
            [['nama_subkriteria', 'bobot', 'nilai'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
    public function search($params, $id)
    {
        $query = SubKriteriaModel::find();
        $query->where(['id_kriteria' => $id]);

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
            'id_subkriteria' => $this->id_subkriteria,
            'id_kriteria' => $this->id_kriteria,
        ]);

        $query->andFilterWhere(['like', 'nama_subkriteria', $this->nama_subkriteria])
            ->andFilterWhere(['like', 'bobot', $this->bobot])
            ->andFilterWhere(['like', 'nilai', $this->nilai]);

        return $dataProvider;
    }

    public function getParents()
    {
        return SubKriteriaModel::find()->where(['id_parent_subkriteria' => '0']);
    }
}
