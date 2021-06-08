<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "hasil".
 *
 * @property int $id_hasil
 * @property int|null $id_pkh
 * @property string|null $nilai
 */
class Hasil extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'hasil';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_pkh'], 'integer'],
            [['nilai'], 'string', 'max' => 20],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_hasil' => 'Id Hasil',
            'id_pkh' => 'Id Pkh',
            'nilai' => 'Nilai',
        ];
    }
}
