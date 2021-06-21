<?php

namespace app\models;

use Yii;
use app\models\Kk;

/**
 * This is the model class for table "warga".
 *
 * @property int $id_warga
 * @property int|null $id_kk
 * @property string|null $nama
 * @property int|null $id_c1
 * @property int|null $id_c2
 * @property int|null $id_c3
 * @property int|null $id_c4
 * @property int|null $id_c5
 * @property int|null $id_c6
 * @property int|null $nilai_c1
 * @property int|null $nilai_c2
 * @property int|null $nilai_c3
 * @property int|null $nilai_c4
 * @property int|null $nilai_c5
 * @property int|null $nilai_c6
 */
class Warga extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'warga';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_kk', 'id_c1', 'id_c2', 'id_c3', 'id_c4', 'id_c5', 'id_c6', 'nilai_c1', 'nilai_c2', 'nilai_c3', 'nilai_c4', 'nilai_c5', 'nilai_c6'], 'integer'],
            [['nama'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_warga' => 'Id Warga',
            'id_kk' => 'Id Kk',
            'nama' => 'Nama',
            'id_c1' => 'Id C1',
            'id_c2' => 'Id C2',
            'id_c3' => 'Id C3',
            'id_c4' => 'Id C4',
            'id_c5' => 'Id C5',
            'id_c6' => 'Id C6',
            'nilai_c1' => 'Nilai C1',
            'nilai_c2' => 'Nilai C2',
            'nilai_c3' => 'Nilai C3',
            'nilai_c4' => 'Nilai C4',
            'nilai_c5' => 'Nilai C5',
            'nilai_c6' => 'Nilai C6',
        ];
    }

    public function getKk()
    {
        return $this->hasOne(Kk::className(), ['id_kk' => 'id_kk']);
    }
}
