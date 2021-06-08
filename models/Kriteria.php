<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kriteria".
 *
 * @property int $id_kriteria
 * @property string $kriteria
 * @property string $jenis
 */
class Kriteria extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kriteria';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['kriteria', 'jenis'], 'required'],
            [['jenis'], 'string'],
            [['kriteria'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kriteria' => 'Id Kriteria',
            'kriteria' => 'Kriteria',
            'jenis' => 'Jenis',
        ];
    }
}
