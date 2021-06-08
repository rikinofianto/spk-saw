<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pkh".
 *
 * @property int $id_pkh
 * @property int|null $id_kk
 * @property int|null $id_subkriteria
 * @property string|null $nilai
 */
class Pkh extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pkh';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kk', 'id_subkriteria'], 'integer'],
            [['nilai'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_pkh' => 'Id Pkh',
            'id_kk' => 'Id Kk',
            'id_subkriteria' => 'Id Subkriteria',
            'nilai' => 'Nilai',
        ];
    }
}
