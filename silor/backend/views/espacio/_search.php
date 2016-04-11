<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\EspacioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="espacio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'espacio_id') ?>

    <?= $form->field($model, 'codigo') ?>

    <?= $form->field($model, 'capacidad') ?>

    <?= $form->field($model, 'ubicacion') ?>

    <?= $form->field($model, 'edificio_id') ?>

    <?php // echo $form->field($model, 'tipo_espacio_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
