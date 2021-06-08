<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Kk */

$this->title = 'Create Kk';
$this->params['breadcrumbs'][] = ['label' => 'Kks', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="kk-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
