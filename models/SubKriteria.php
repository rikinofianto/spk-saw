<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "sub_kriteria".
 *
 * @property int $id_subkriteria
 * @property int|null $id_kriteria
 * @property string|null $nama_subkriteria
 * @property string|null $bobot
 * @property string|null $kode
 */
class SubKriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kriteria'], 'integer'],
            [['nama_subkriteria', 'bobot', 'kode'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_subkriteria' => 'Id Subkriteria',
            'id_kriteria' => 'Id Kriteria',
            'nama_subkriteria' => 'Nama Subkriteria',
            'bobot' => 'Bobot',
            'kode' => 'Kode',
        ];
    }
}
