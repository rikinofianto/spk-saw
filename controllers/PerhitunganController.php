<?php

namespace app\controllers;

use Yii;
use app\models\search\Warga as WargaSearch;
use app\models\search\SubKriteria as SubKriteriaSearch;

class PerhitunganController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $warga = new WargaSearch();
        $kriteria = new SubKriteriaSearch();
        $parentKriteria = $kriteria->getParents();
var_dump('<pre');
print_r($parentKriteria->asArray());die;
        $dataProvider = $warga->searchAll(Yii::$app->request->queryParams);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

}
