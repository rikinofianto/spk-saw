<?php

namespace app\components;

use Yii;
use app\models\Warga;
use yii\base\Component;
use app\models\SubKriteria;

class PerhitunganHelper extends Component
{
    public function normalisasi()
    {
        $model = Warga::find()->all();
        $c1 = [];
        $c2 = [];
        $c3 = [];
        $c4 = [];
        $c5 = [];
        $c6 = [];

        $jenis1 = '';
        $jenis2 = '';
        $jenis3 = '';
        $jenis4 = '';
        $jenis5 = '';
        $jenis6 = '';

        $kriteria1 = '';
        $kriteria2 = '';
        $kriteria3 = '';
        $kriteria4 = '';
        $kriteria5 = '';
        $kriteria6 = '';

        $nama = [];
        $jk = [];
        foreach ($model as $data => $warga) {
            $nama[] = $warga->nama;
            $jk[] = $warga->jenis_kelamin;
            $jenis1 = $warga->subkriteria1->parent->kriteria->jenis;
            $jenis2 = $warga->subkriteria2->parent->kriteria->jenis;
            $jenis3 = $warga->subkriteria3->parent->kriteria->jenis;
            $jenis4 = $warga->subkriteria4->parent->kriteria->jenis;
            $jenis5 = $warga->subkriteria5->parent->kriteria->jenis;
            $jenis6 = $warga->subkriteria6->parent->kriteria->jenis;

            $kriteria1 = $warga->subkriteria1->parent->nama_subkriteria;
            $kriteria2 = $warga->subkriteria2->parent->nama_subkriteria;
            $kriteria3 = $warga->subkriteria3->parent->nama_subkriteria;
            $kriteria4 = $warga->subkriteria4->parent->nama_subkriteria;
            $kriteria5 = $warga->subkriteria5->parent->nama_subkriteria;
            $kriteria6 = $warga->subkriteria6->parent->nama_subkriteria;

            $c1[] = $warga->nilai_c1;
            $c2[] = $warga->nilai_c2;
            $c3[] = $warga->nilai_c3;
            $c4[] = $warga->nilai_c4;
            $c5[] = $warga->nilai_c5;
            $c6[] = $warga->nilai_c6;
        }

        if ($jenis1 == 'Benefit') {
            $max = max($c1);
            $normalisasi1 = $this->hitungBenefit($c1, $max);
        } else {
            $min = min($c1);
            $normalisasi1 = $this->hitungCost($c1, $min);
        }

        if ($jenis2 == 'Benefit') {
            $max = max($c2);
            $normalisasi2 = $this->hitungBenefit($c2, $max);
        } else {
            $min = min($c2);
            $normalisasi2 = $this->hitungCost($c2, $min);
        }

        if ($jenis3 == 'Benefit') {
            $max = max($c3);
            $normalisasi3 = $this->hitungBenefit($c3, $max);
        } else {
            $min = min($c3);
            $normalisasi3 = $this->hitungCost($c3, $min);
        }

        if ($jenis4 == 'Benefit') {
            $max = max($c4);
            $normalisasi4 = $this->hitungBenefit($c4, $max);
        } else {
            $min = min($c4);
            $normalisasi4 = $this->hitungCost($c4, $min);
        }

        if ($jenis5 == 'Benefit') {
            $max = max($c5);
            $normalisasi5 = $this->hitungBenefit($c5, $max);
        } else {
            $min = min($c5);
            $normalisasi5 = $this->hitungCost($c5, $min);
        }

        if ($jenis6 == 'Benefit') {
            $max = max($c6);
            $normalisasi6 = $this->hitungBenefit($c6, $max);
        } else {
            $min = min($c6);
            $normalisasi6 = $this->hitungCost($c6, $min);
        }

        $data_normalisasi = [
            'jenis_kelamin' => $jk,
            'nama' => $nama,
            'c1' => $normalisasi1,
            'c2' => $normalisasi2,
            'c3' => $normalisasi3,
            'c4' => $normalisasi4,
            'c5' => $normalisasi5,
            'c6' => $normalisasi6,
        ];

        return $data_normalisasi;
    }

    public function hitungBenefit($data, $max)
    {
        $benefit = [];
       foreach($data as $nilai) {
           $benefit[] = ($nilai !== 0 && $max !== 0) ? $nilai/$max : 0;
        }
        return $benefit;
    }

    public function hitungCost($data, $min)
    {
        $cost = [];
       foreach($data as $nilai) {
           $cost[] = ($nilai !== 0 && $min !== 0) ? $min/$nilai : 0;
        }
        return $cost;
    }

    public function dataNormalisasi($normalisasi)
    {
        if (!empty($normalisasi)) {
            $kolom = [
                array_column($normalisasi, 0),
                array_column($normalisasi, 1),
                array_column($normalisasi, 2),
                array_column($normalisasi, 3),
                array_column($normalisasi, 4),
                array_column($normalisasi, 5),
                array_column($normalisasi, 6),
                array_column($normalisasi, 7)
            ];

            $final_data = [];
            foreach($kolom as $k => $data) {
                $new_data = [];
                if (!empty($data)) {
                    $new_data['jenis_kelamin'] = $data[0];
                    $new_data['nama'] = $data[1];
                    $new_data['c1'] = $data[2];
                    $new_data['c2'] = $data[3];
                    $new_data['c3'] = $data[4];
                    $new_data['c4'] = $data[5];
                    $new_data['c5'] = $data[6];
                    $new_data['c6'] = $data[7];

                    $final_data[] = $new_data;
                    unset($new_data);
                }
            }

            return $final_data;
        }
    }

    public function rangking($normalisasi)
    {
        if (!empty($normalisasi)) {
            $hitung = $this->kalkulasiBobot($normalisasi);
            return array_replace($normalisasi, $hitung);
        }
    }

    public function kalkulasiBobot($normalisasi)
    {
        $kriteria = SubKriteria::find()->where(['id_parent_subkriteria' => '0'])->all();
        if (!empty($normalisasi)) {
            unset($normalisasi['jenis_kelamin']);
            unset($normalisasi['nama']);

            $i = 0;
            $rangking = [];
            foreach($normalisasi as $k => $data) {
                if ($kriteria[$i]) {
                    foreach($data as $key => $nilai) {
                        $data[$key] = $nilai * $kriteria[$i]->bobot;
                    }
                }
                $rangking['c'. intval($i+1)] = $data;
                $i++;
            }
            
            return $rangking;
        }
    }

    public function dataRangking($rangking)
    {
        if (!empty($rangking)) {
            $kolom = [
                array_column($rangking, 0),
                array_column($rangking, 1),
                array_column($rangking, 2),
                array_column($rangking, 3),
                array_column($rangking, 4),
                array_column($rangking, 5),
                array_column($rangking, 6),
                array_column($rangking, 7)
            ];

            $final_data = [];

            foreach($kolom as $k => $data) {
                $new_data = [];
                if (!empty($data)) {
                    $new_data['jenis_kelamin'] = $data[0];
                    $new_data['nama'] = $data[1];
                    $new_data['c1'] = $data[2];
                    $new_data['c2'] = $data[3];
                    $new_data['c3'] = $data[4];
                    $new_data['c4'] = $data[5];
                    $new_data['c5'] = $data[6];
                    $new_data['c6'] = $data[7];
                    $new_data['total'] = $new_data['c1'] + $new_data['c2'] + $new_data['c3'] + $new_data['c4'] + $new_data['c5'] + $new_data['c6'];

                    $final_data[] = $new_data;
                    unset($new_data);
                }
            }

            $keys = array_column($final_data, 'total');
            array_multisort($keys, SORT_DESC, $final_data);
            $urutan_rangking = $this->urutanRangking($final_data);

            return $urutan_rangking;
        }
    }
    
    public function urutanRangking($data_rangking)
    {
        if (!empty($data_rangking)) {
            $rank = 1;
            $new_data = [];
            foreach($data_rangking as $key => $data) {
                $new_data[] = array_merge($data, ['peringkat' => $rank]);
                $rank++;
            }

            return $new_data;
        }
    }
}