<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SubKriteria */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sub Kriterias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-kriteria-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Sub Kriteria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id_subkriteria',
            'id_kriteria',
            'nama_subkriteria',
            'bobot',
            'kode',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
