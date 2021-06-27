<?php

namespace app\controllers;

use Yii;
use yii\data\Sort;
use yii\data\ArrayDataProvider;

class PenilaianController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $normalisasi = Yii::$app->perhitunganhelper->normalisasi();
        $data_normalisasi = Yii::$app->perhitunganhelper->dataNormalisasi($normalisasi);
        $rangking = Yii::$app->perhitunganhelper->rangking($normalisasi);
        $data_rangking = Yii::$app->perhitunganhelper->dataRangking($rangking);


        $sort = new Sort([
            'attributes' => [
                'kk',
                'nama',
                'total'
            ]
        ]);

        $dataProvideRangking = new ArrayDataProvider([
            'allModels' => $data_rangking,
            'sort' => $sort
        ]);

        return $this->render('index', [
            'dataProvideRangking' => $dataProvideRangking
        ]);
    }

}
