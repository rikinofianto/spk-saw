<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SubKriteria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="sub-kriteria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?=$form->field($model, 'is_parent',
    [
        'options' => [
            'style' => 'display:inline-block'
        ]
    ])->radioList(array('1'=>'Parent',2=>'Child'));?>

    <?= $form->field($model, 'id_parent_subkriteria')->dropDownList($listParent, ['class' => 'hidden form-control']) ?>
    <?= $form->field($model, 'nama_subkriteria')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bobot')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nilai')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php

$this->registerJs(
    "
    $(document).ready(function () {
        var parentSubKriteria = $('.field-subkriteria-id_parent_subkriteria');
        // parentSubKriteria.addClass('hidden');

        if ($('input:radio[name=\"SubKriteria[is_parent]\"]').is(':checked')) {
            if ($('input:radio[name=\"SubKriteria[is_parent]\"]:checked').val() == '2') {
                parentSubKriteria.removeClass('hidden');
                $('#subkriteria-id_parent_subkriteria').removeClass('hidden');
            } else {
                parentSubKriteria.addClass('hidden');
                $('#subkriteria-id_parent_subkriteria').addClass('hidden');
            }
        }

        $('input:radio[name=\"SubKriteria[is_parent]\"]').change(function(){
            if($(this).val() == '2'){
               parentSubKriteria.removeClass('hidden');
               $('#subkriteria-id_parent_subkriteria').removeClass('hidden');
            } else {
                parentSubKriteria.addClass('hidden');
                $('#subkriteria-id_parent_subkriteria').addClass('hidden');
            }
        });
    });
    ",
     \yii\web\View::POS_END,
    'form-sub-kriteria'
);
?>