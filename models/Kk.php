<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "kk".
 *
 * @property int $id_kk
 * @property string|null $nama_kk
 * @property string|null $tgl_lahir
 * @property string|null $jk
 * @property string|null $pekerjaan
 * @property int|null $jml_keluarga
 */
class Kk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'kk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tgl_lahir'], 'safe'],
            [['jk'], 'string'],
            [['jml_keluarga'], 'integer'],
            [['nama_kk', 'pekerjaan'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id_kk' => 'Id Kk',
            'nama_kk' => 'Nama Kk',
            'tgl_lahir' => 'Tgl Lahir',
            'jk' => 'Jk',
            'pekerjaan' => 'Pekerjaan',
            'jml_keluarga' => 'Jml Keluarga',
        ];
    }
}
