<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Warga */

$this->title = 'Create Warga';
$this->params['breadcrumbs'][] = ['label' => 'Wargas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="warga-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'list_kriteria' => $list_kriteria,
        'list_subkriteria' => $list_subkriteria
    ]) ?>

</div>
