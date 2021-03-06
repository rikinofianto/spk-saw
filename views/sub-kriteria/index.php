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
        <?= Html::a('Create Sub Kriteria', ['create', 'id_kriteria' => $id_kriteria], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Kriteria',
                'value' => function($model, $key, $index, $column) {
                    return $model->kriteria->kriteria;
                } 
            ],
            'nama_subkriteria',
            'bobot',
            [
                'format' => 'html',
                'value' => function($data) {
                    return Html::a('Kriteria', ['sub-kriteria', 'id_subkriteria' => $data->id_subkriteria]);
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
