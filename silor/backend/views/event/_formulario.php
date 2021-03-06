<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form-update">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'estado_id')->dropDownList($model->estadoList,[ 'prompt' => 'Selecciona un estado' ])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Guardar') : Icon::show('pencil').Yii::t('app', 'Actualizar estado'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
