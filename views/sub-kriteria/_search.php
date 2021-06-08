<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\SubKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-kriteria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_subkriteria') ?>

    <?= $form->field($model, 'id_kriteria') ?>

    <?= $form->field($model, 'nama_subkriteria') ?>

    <?= $form->field($model, 'bobot') ?>

    <?= $form->field($model, 'kode') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
