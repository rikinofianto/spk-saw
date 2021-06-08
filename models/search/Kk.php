<?php

namespace app\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kk as KkModel;

/**
 * Kk represents the model behind the search form of `app\models\Kk`.
 */
class Kk extends KkModel
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kk', 'jml_keluarga'], 'integer'],
            [['nama_kk', 'tgl_lahir', 'jk', 'pekerjaan'], 'safe'],
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
        $query = KkModel::find();

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
            'id_kk' => $this->id_kk,
            'tgl_lahir' => $this->tgl_lahir,
            'jml_keluarga' => $this->jml_keluarga,
        ]);

        $query->andFilterWhere(['like', 'nama_kk', $this->nama_kk])
            ->andFilterWhere(['like', 'jk', $this->jk])
            ->andFilterWhere(['like', 'pekerjaan', $this->pekerjaan]);

        return $dataProvider;
    }
}
