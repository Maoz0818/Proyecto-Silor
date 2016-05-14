<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use common\models\PermissionHelpers;
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\Espacio;
use backend\models\EspacioSearch;
use yii\widgets\ActiveForm;
use kartik\time\TimePicker;
use kartik\date\DatePicker;
use yii\bootstrap\Modal;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="event-calendario">

<div class="form-group">

<hr/>

    <h4>Selecciona un espacio, recuerda que tienes la opción de ver la disponibilidad de cada espacio</h4>

<hr/>

    <?php Pjax::begin(); ?> 

    <?= $this->render('_espacios', ['model' => $searchModel]); ?>

    <?php Pjax::end(); ?>
   
</div>

    <?php $form = ActiveForm::begin(); ?>

    <hr/>

        <h4>Ingresa los siguientes datos para terminar tu solicitud</h4>

    <hr/>
    

    <div class="row">

    <div class="form-group col-sm-4">

    <?= $form->field($model, 'fecha')->widget(DatePicker::classname(), [
    'name' => 'fecha-reserva',
    'id' => 'fecha-seleccionada',
    'type' => DatePicker::TYPE_COMPONENT_APPEND,
    'readonly' => true,
    'removeButton' => false,
    'pluginOptions' => [
        'autoclose'=>true,
        'format' => 'yyyy-mm-dd',
        'startDate' => '+1d',
        'endDate' => '+15d',
    ],
    ])?>

    </div>

    <div class="form-group col-sm-4">

    <?= $form->field($model, 'horaInicio')->widget(TimePicker::classname(), [
    'name' => 'begin_time',
    'id' => 'hora-inicio',
    'options' => [
        'readonly' => true,
    ],
    'pluginOptions' => [
        'minuteStep' => 30,
        'showMeridian' => false,
        'defaultTime' => false,
        'timeFormat' => 'Th:m:s\Z',
    ],
    'addonOptions' => [
        'asButton' => true
    ]
    ])?>

    </div>

    <div class="form-group col-sm-4">

    <?= $form->field($model, 'horaFin')->widget(TimePicker::classname(), [
    'name' => 'end_time',
    'id' => 'hora-fin',
    'options' => [
        'readonly' => true,
    ],
    'pluginOptions' => [
        'minuteStep' => 30,
        'showMeridian' => false,
        'defaultTime' => false,
    ],
    'addonOptions' => [
        'asButton' => true
    ]
    ]);?>

    </div>

    </div>

    <div class="form-group" id="horario">

    <?= $form->field($model, 'espacio_id')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'start_date')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'end_date')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o').'Guardar Solicitud' : Icon::show('pencil').'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'guardar-reserva']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php

        Modal::begin([
            'id' => 'modal',
            'size' => 'modal-lg',
            'header' => '<h3>Disponibilidad</h3>',
            ]);

        echo "<div></div>";

        Modal::end();
    ?>

</div>
