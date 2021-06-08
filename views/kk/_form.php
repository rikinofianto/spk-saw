<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\date\DatePicker

/* @var $this yii\web\View */
/* @var $model app\models\Kk */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="kk-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'nama_kk')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tgl_lahir')->widget(DatePicker::classname(), [
        'options' => [
            'class' => 'form-control',
        ],
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd'
        ]
    ]) ?>

    <?= $form->field($model, 'jk')->dropDownList([ 'Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'pekerjaan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'jml_keluarga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
