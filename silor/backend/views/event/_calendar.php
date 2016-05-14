<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\icons\Icon;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="event-form-calendario">

    <?php $form = ActiveForm::begin(); ?>

        <?= yii2fullcalendar\yii2fullcalendar::widget([
        'options' => [
            'lang' => 'en',
            'id' => 'event-grid',
        ],
        'ajaxEvents' => array('events'=>$events,),
        'clientOptions' => [
            'monthNames' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'monthNamesShort' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'dayNamesShort' => ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes','Sabado'],
            'firstDay' => '1',
            'allDay' => false,
            'allDaySlot' => false,
            'minTime' => '07:00:00',
            'maxTime' => '21:30:00',
            'buttonText' => [

                    'today' => ['Hoy'],
                    'month' => ['Mes'],
                    'week' => ['Semana'],
            ],
                    'height' => 500,
            ],
        ]);
    ?>

    <?php ActiveForm::end(); ?>

</div>