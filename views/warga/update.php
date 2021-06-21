<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Warga */

$this->title = 'Update Warga: ' . $model->id_warga;
$this->params['breadcrumbs'][] = ['label' => 'Wargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_warga, 'url' => ['view', 'id' => $model->id_warga]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="warga-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list_kriteria' => $list_kriteria,
        'list_subkriteria' => $list_subkriteria
    ]) ?>

</div>
