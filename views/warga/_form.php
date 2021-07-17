<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Warga */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="warga-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'jenis_kelamin')->dropDownList(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'], ['class' => 'form-control', 'prompt' => '-pilih jenis kelamin-']) ?>
    <?php
    $i = 1;
    foreach($list_kriteria as $key => $name): ?>
        <?= $form->field($model, 'id_c'.$i)->dropDownList($list_subkriteria[$key], ['class' => 'form-control', 'prompt' => '-pilih kriteria-'])->label($name) ?>
    <?php
    $i++;
    endforeach;?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
