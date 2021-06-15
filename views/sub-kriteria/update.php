<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubKriteria */

$this->title = 'Update Sub Kriteria: ' . $model->id_subkriteria;
$this->params['breadcrumbs'][] = ['label' => 'Sub Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_subkriteria, 'url' => ['view', 'id' => $model->id_subkriteria]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="sub-kriteria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listParent' => $listParent
    ]) ?>

</div>
