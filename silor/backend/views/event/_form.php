<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use kartik\time\TimePicker;
use kartik\date\DatePicker;
use yii\grid\GridView;
use yii\widgets\Pjax;
use yii\helpers\Url;
use backend\models\Espacio;
use backend\models\search\EspacioSearch;
use yii\data\ActiveDataProvider;
use backend\models\ItemEspacio;
use yii\web\view;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */
/* @var $form yii\widgets\ActiveForm */

?>

<div class="event-form">

    <hr/>
    
    <div class="form-group">

        <h3>Primero selecciona un espacio</h3>

    </div>

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]);?>

    <div class="row">
    <div class="col-sm-8">
                                                                                                                                                                     
    <div class="form-group">
     <div class="input-group">
        <?= $form->field($searchModel, 'globalSearch', ['options' => ['class' => 'input-group-btn', 'id' => 'input-reset']])->label(false) ?>
        <span class="input-group-btn">
        <?= Html::submitButton(Icon::show('search').'Buscar', ['class' => 'btn btn-primary']) ?>
        </span>
     </div>
    </div>

    </div>
    </div>
    
    <?php  echo $this->render('_espacios', ['model' => $searchModel]); ?>

    <p id="mensaje-espacios"></p>

    <?php ActiveForm::end(); ?>

    <?php $form = ActiveForm::begin(); ?>
    
    <div class="row" id="espacio-seleccionado">
    <div class="col-sm-4">

    <?= $form->field($item, 'espacio_id')->textInput(['readonly' => true]) ?>
    
    </div>
    </div>

    <hr/>
    
    <div class="form-group">

        <h3>Ahora ingresa los siguientes datos para terminar</h3>

    </div>

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

    <?= $form->field($model, 'start_date')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    <?= $form->field($model, 'end_date')->textInput(['maxlength' => true, 'readonly' => true]) ?>

    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <hr/>

    <div class="form-group">
    <?= Html::submitButton($model->isNewRecord ? Icon::show('floppy-o').'Guardar' : Icon::show('pencil').'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'id' => 'guardar-reserva']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
