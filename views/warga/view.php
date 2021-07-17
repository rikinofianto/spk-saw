<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Warga */

$this->title = $model->id_warga;
$this->params['breadcrumbs'][] = ['label' => 'Wargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="warga-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id_warga], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id_warga], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id_warga',
            'nama',
            'jenis_kelamin',
            [
                'label' => $model->subkriteria1->parent->nama_subkriteria,
                'value' => $model->subkriteria1->nama_subkriteria
            ],
            [
                'label' => $model->subkriteria2->parent->nama_subkriteria,
                'value' => $model->subkriteria2->nama_subkriteria
            ],
            [
                'label' => $model->subkriteria3->parent->nama_subkriteria,
                'value' => $model->subkriteria3->nama_subkriteria
            ],
            [
                'label' => $model->subkriteria4->parent->nama_subkriteria,
                'value' => $model->subkriteria4->nama_subkriteria
            ],
            [
                'label' => $model->subkriteria5->parent->nama_subkriteria,
                'value' => $model->subkriteria5->nama_subkriteria
            ],
            [
                'label' => $model->subkriteria6->parent->nama_subkriteria,
                'value' => $model->subkriteria6->nama_subkriteria
            ],
        ],
    ]) ?>

</div>
