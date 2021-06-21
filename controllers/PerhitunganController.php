<?php

namespace app\controllers;

use Yii;
use app\models\search\Warga as WargaSearch;
use app\models\search\SubKriteria as SubKriteriaSearch;
use yii\data\ArrayDataProvider;
use yii\data\Sort;

class PerhitunganController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $warga = new WargaSearch();
        $kriteria = new SubKriteriaSearch();
        $parentKriteria = $kriteria->getParents();

        $dataProvider = $warga->searchAll(Yii::$app->request->queryParams);
        $normalisasi = Yii::$app->perhitunganhelper->normalisasi();
        $data_normalisasi = Yii::$app->perhitunganhelper->dataNormalisasi($normalisasi);
        $rangking = Yii::$app->perhitunganhelper->rangking($normalisasi);
        $data_rangking = Yii::$app->perhitunganhelper->dataRangking($rangking);

        $dataProviderNormalisasi = new ArrayDataProvider([
            'allModels' => $data_normalisasi,
        ]);

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
            'dataProvider' => $dataProvider,
            'dataProviderNormalisasi' => $dataProviderNormalisasi,
            'dataProvideRangking' => $dataProvideRangking
        ]);
    }

}
