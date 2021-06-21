<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\Warga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warga-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_warga') ?>

    <?= $form->field($model, 'id_kk') ?>

    <?= $form->field($model, 'nama') ?>

    <?= $form->field($model, 'id_c1') ?>

    <?= $form->field($model, 'id_c2') ?>

    <?php // echo $form->field($model, 'id_c3') ?>

    <?php // echo $form->field($model, 'id_c4') ?>

    <?php // echo $form->field($model, 'id_c5') ?>

    <?php // echo $form->field($model, 'id_c6') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
