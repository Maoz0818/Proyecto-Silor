<?php

use yii\helpers\Html;
use yii\widgets\Pjax;
use common\models\PermissionHelpers;
use yii\helpers\Url;
use kartik\icons\Icon;
use backend\models\Event;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Calendario');
$this->params['breadcrumbs'][] = $this->title;
$model = new Event();
?>
<div class="event-calendario">

    <h1><?= Html::encode($this->title) ?></h1>
 

    <?php $form = ActiveForm::begin([
        'id' => 'evento',
        ]); ?>
        
        <?= Html::a( Icon::show('plus').'Nueva reserva', ['create','fecha' => trim($model->fecha)], ['class' => 'btn btn-success','data' => [
                'method' => 'post',
                ]
        ]) ?>

        <?= $form->field($model, 'fecha')->textInput(['maxlength' => true]) ?>

    <?php ActiveForm::end(); ?>

<?php Pjax::begin(); ?>

<!--     <div id='calendar'></div> -->

    <?= yii2fullcalendar\yii2fullcalendar::widget(array(

        'options' => [
            'id' => 'event-grid',
        ],

        'ajaxEvents' => Url::to(['/event/jsoncalendar']),
        'clientOptions' => [
            'monthNames' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'monthNamesShort' => ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 
            'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
            'dayNamesShort' => ['Domingo', 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes','Sabado'],
            'firstDay' => '1',
            'allDay' => false,
            'allDaySlot' => false,
            'minTime' => '06:00:00',
            'maxTime' => '23:00:00',
            'buttonText' => [

                    'today' => ['Hoy'],
                    'month' => ['Mes'],
                    'week' => ['Semana'],
            ],
        ],

    ));
    ?>


<?php Pjax::end(); ?>

</div>
