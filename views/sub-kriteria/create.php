<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubKriteria */

$this->title = 'Create Sub Kriteria';
$this->params['breadcrumbs'][] = ['label' => 'Sub Kriterias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sub-kriteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'listParent' => $listParent
    ]) ?>

</div>
