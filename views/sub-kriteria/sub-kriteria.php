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
        <?= Html::a('Create Sub Kriteria', ['create', 'id_kriteria' => $id_subkriteria], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'Parent',
                'value' => function($model, $key, $index, $column) {
                    return $model->parent->nama_subkriteria;
                } 
            ],
            'nama_subkriteria',
            'bobot',
            'nilai',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    echo Html::a( 'Back', Yii::$app->request->referrer);
    ?>

</div>
