<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Kriteria */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Perhitungan';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Data Penerima PKH</h3>
            </div>
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvider,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'nama',
                        'jenis_kelamin',
                        [
                            'attribute' => 'Ibu Hamil',
                            'value' => function($model, $key, $index, $column) {
                                return $model->nilai_c1;
                            }
                        ],
                        [
                            'attribute' => 'Usia Anak',
                            'value' => function($model, $key, $index, $column) {
                                return $model->nilai_c2;
                            }
                        ],
                        [
                            'attribute' => 'Pendidikan',
                            'value' => function($model, $key, $index, $column) {
                                return $model->nilai_c3;
                            }
                        ],
                        [
                            'attribute' => 'Disabilitas',
                            'value' => function($model, $key, $index, $column) {
                                return $model->nilai_c4;
                            }
                        ],
                        [
                            'attribute' => 'Lanjut Usia',
                            'value' => function($model, $key, $index, $column) {
                                return $model->nilai_c5;
                            }
                        ],
                        [
                            'attribute' => 'Pendapatan',
                            'value' => function($model, $key, $index, $column) {
                                return $model->nilai_c6;
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Normalisasi</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProviderNormalisasi,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'nama',
                        'jenis_kelamin',
                        [
                            'attribute' => 'Ibu Hamil',
                            'value' => function($model, $key, $index, $column) {
                                return $model['c1'];
                            }
                        ],
                        [
                            'attribute' => 'Usia Anak',
                            'value' => function($model, $key, $index, $column) {
                                return $model['c2'];
                            }
                        ],
                        [
                            'attribute' => 'Pendidikan',
                            'value' => function($model, $key, $index, $column) {
                                return $model['c3'];
                            }
                        ],
                        [
                            'attribute' => 'Disabilitas',
                            'value' => function($model, $key, $index, $column) {
                                return $model['c4'];
                            }
                        ],
                        [
                            'attribute' => 'Lanjut Usia',
                            'value' => function($model, $key, $index, $column) {
                                return $model['c5'];
                            }
                        ],
                        [
                            'attribute' => 'Pendapatan',
                            'value' => function($model, $key, $index, $column) {
                                return $model['c6'];
                            }
                        ]
                    ],
                ]); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Perangkingan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?= GridView::widget([
                    'dataProvider' => $dataProvideRangking,
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'nama',
                        'jenis_kelamin',
                        'total',
                        'peringkat'
                    ],
                ]); ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>

</div>
<!-- /.row -->