<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */
/* @var $model backend\models\ItemEspacio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="item-espacio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'espacio_id')->textInput() ?>

    <?= $form->field($model, 'event_id')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
