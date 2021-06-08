<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-kriteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id_kriteria')->textInput() ?>

    <?= $form->field($model, 'nama_subkriteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bobot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kode')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
