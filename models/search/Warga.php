<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Warga as WargaModel;

/**
 * Warga represents the model behind the search form of `app\models\Warga`.
 */
class Warga extends WargaModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_warga', 'id_c1', 'id_c2', 'id_c3', 'id_c4', 'id_c5', 'id_c6', 'nilai_c1', 'nilai_c2', 'nilai_c3', 'nilai_c4', 'nilai_c5', 'nilai_c6'], 'integer'],
            [['nama', 'jenis_kelamin'], 'safe'],
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
    public function search($params)
    {
        $query = WargaModel::find();

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
            'id_warga' => $this->id_warga,
            'id_c1' => $this->id_c1,
            'id_c2' => $this->id_c2,
            'id_c3' => $this->id_c3,
            'id_c4' => $this->id_c4,
            'id_c5' => $this->id_c5,
            'id_c6' => $this->id_c6,
            'nilai_c1' => $this->nilai_c1,
            'nilai_c2' => $this->nilai_c2,
            'nilai_c3' => $this->nilai_c3,
            'nilai_c4' => $this->nilai_c4,
            'nilai_c5' => $this->nilai_c5,
            'nilai_c6' => $this->nilai_c6,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);
        $query->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin]);

        return $dataProvider;
    }

    public function searchAll($params)
    {
        $query = WargaModel::find();

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
            'id_warga' => $this->id_warga,
            'id_c1' => $this->id_c1,
            'id_c2' => $this->id_c2,
            'id_c3' => $this->id_c3,
            'id_c4' => $this->id_c4,
            'id_c5' => $this->id_c5,
            'id_c6' => $this->id_c6,
            'nilai_c1' => $this->nilai_c1,
            'nilai_c2' => $this->nilai_c2,
            'nilai_c3' => $this->nilai_c3,
            'nilai_c4' => $this->nilai_c4,
            'nilai_c5' => $this->nilai_c5,
            'nilai_c6' => $this->nilai_c6,
        ]);

        $query->andFilterWhere(['like', 'nama', $this->nama]);
        $query->andFilterWhere(['like', 'jenis_kelamin', $this->jenis_kelamin]);

        return $dataProvider;
    }
}
