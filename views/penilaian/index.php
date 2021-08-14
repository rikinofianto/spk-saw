<?php

use yii\helpers\Html;
use yii\grid\GridView;
use kartik\export\ExportMenu;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Kriteria */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Penilaian';
$this->params['breadcrumbs'][] = $this->title;

$gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'nama',
    'jenis_kelamin',
    'total',
    'peringkat',
];
?>
<div class="row">
    <div class="col-md-12">

        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Penilaian</h3>
                <div class="box-tools pull-right">
                    <?php
                        echo ExportMenu::widget([
                            'dataProvider' => $dataProvideRangking,
                            'columns' => $gridColumns
                        ]);
                    ?>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <?php
                //  GridView::widget([
                //     'dataProvider' => $dataProvideRangking,
                //     'columns' => [
                //         ['class' => 'yii\grid\SerialColumn'],
                //         'nama',
                //         'jenis_kelamin',
                //         'total',
                //         'peringkat'
                //     ],
                // ]); 
                ?>
                <?php
                    echo \kartik\grid\GridView::widget([
                        'dataProvider' => $dataProvideRangking,
                        'columns' => $gridColumns
                    ]);
                ?>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </div>
</div>