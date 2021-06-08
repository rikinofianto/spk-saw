<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Kk */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'KK';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kk-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create KK', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'nama_kk',
            'tgl_lahir',
            'jk',
            'pekerjaan',
            //'jml_keluarga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
