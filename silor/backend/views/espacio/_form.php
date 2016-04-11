<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $model backend\models\Espacio */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="espacio-form">

    <?php $form = ActiveForm::begin([
        'id' => 'espacio-form',
        'enableAjaxValidation' => true,
        'enableClientScript' => true,
        'enableClientValidation' => true,
        ]); ?>

    <?= $form->field($model, 'edificio_id')->dropDownList($model->edificioList,[ 'prompt' => 'Si el epacio pertenece a un edificio elige uno' ]);?>

    <?= $form->field($model, 'tipo_espacio_id')->dropDownList($model->tipoEspacioList,[ 'prompt' => 'Por favor elige uno' ]);?>

    <?= $form->field($model, 'codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'capacidad')->textInput() ?>

    <?= $form->field($model, 'ubicacion')->textInput(['maxlength' => true])->textInput(['placeholder' => "La ubicación es opcional"])?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o').'Guardar' : Icon::show('pencil').'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

        <?php
    $this->registerJs('
    // obtener la id del formulario y establecer el manejador de eventos
        $("form#espacio-form").on("beforeSubmit", function(e) {
            var form = $(this);
            $.post(
            form.attr("action")+"&submit=true",
            form.serialize()
            )
            .done(function(result) {
                form.parent().html(result.message);
                $.pjax.reload({container:"#espacio-grid"});
            });
            return false;
        }).on("submit", function(e){
            e.preventDefault();
            e.stopImmediatePropagation();
            return false;
        });
        ');
    ?>

</div>
