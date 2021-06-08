<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\search\Kk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kk-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_kk') ?>

    <?= $form->field($model, 'nama_kk') ?>

    <?= $form->field($model, 'tgl_lahir') ?>

    <?= $form->field($model, 'jk') ?>

    <?= $form->field($model, 'pekerjaan') ?>

    <?php // echo $form->field($model, 'jml_keluarga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
