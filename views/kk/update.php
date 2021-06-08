<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kk */

$this->title = 'Update Kk: ' . $model->id_kk;
$this->params['breadcrumbs'][] = ['label' => 'Kks', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id_kk, 'url' => ['view', 'id' => $model->id_kk]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="kk-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
