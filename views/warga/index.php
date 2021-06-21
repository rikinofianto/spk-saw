<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Warga */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Wargas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warga-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Warga', ['create', 'id_kk' => $id_kk], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'KK',
                'value' => function($model, $key, $index, $column) {
                    return $model->kk->nama_kk;
                } 
            ],
            'nama',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
