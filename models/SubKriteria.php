<?php

namespace app\models;

use Yii;
use app\models\Kriteria;

/**
 * This is the model class for table "sub_kriteria".
 *
 * @property int $id_subkriteria
 * @property int|null $id_kriteria
 * @property int|null $id_parent_subkriteria
 * @property string|null $nama_subkriteria
 * @property string|null $bobot
 * @property string|null $kode
 */
class SubKriteria extends \yii\db\ActiveRecord
{
    public $is_parent;

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
            [['id_kriteria', 'id_parent_subkriteria', 'is_parent'], 'integer'],
            [['nama_subkriteria', 'bobot', 'nilai'], 'string', 'max' => 100],
            ['id_parent_subkriteria', 'required', 'when' => function($model) {
                return $model->is_parent == '2';
            }, 'whenClient' => "function (attribute, value) {
                return $('input:radio[name=\"SubKriteria[is_parent]\"]').val() == '2';
            }"],
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
            'id_parent_subkriteria' => 'Id Parent Subkriteria',
            'nama_subkriteria' => 'Nama Subkriteria',
            'bobot' => 'Bobot',
            'nilai' => 'Nilai',
        ];
    }

    public function getKriteria()
    {
        return $this->hasOne(Kriteria::className(), ['id_kriteria' => 'id_kriteria']);
    }

    public function getParent()
    {
        return $this->hasOne(self::className(), ['id_subkriteria' => 'id_parent_subkriteria']);
    }
}
