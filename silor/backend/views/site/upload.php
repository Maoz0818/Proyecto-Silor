<?php

   use yii\bootstrap\ActiveForm;
   use yii\helpers\Html;
?>

<?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]) ?>

<p>Indique el archivo de docentes  a cargar:</p>

<?= $form->field($model,'excelFile')->fileInput() ?>

<?= Html::submitButton(Yii::t('app','Upload'),['class'=>'btn btn-primary']) ?>

<?php ActiveForm::end() ?>
