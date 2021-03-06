<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Espacio;
use yii\widgets\Pjax;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model backend\models\search\EspacioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="espacio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['search'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($searchModel, 'globalSearch') ?>

    <?php // echo $form->field($model, 'tipo_espacio_id') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php Pjax::begin(); ?>
    
    <?= GridView::widget([
        'id' => 'espacio-grid',
        'dataProvider' => $dataProvider,
        'layout' => "{items}\n{pager}",
        'columns' => [
            'espacio_id',
            [
                'attribute' => 'tipo_espacio_id',
                'value' => 'tipoEspacio.nombre_tipo',
            ],
            'codigo',
            'capacidad',
            [
                'attribute' => 'edificio_id',
                'value' => 'edificio.nombre_edificio',
            ],

            [
            'class' => 'yii\grid\CheckboxColumn',
            // you may configure additional properties here
                'multiple'=> false,
                'checkboxOptions' => function ($model, $key, $index, $column) {
                return ['value' => $model->espacio_id];
            }
            ],
            //'ubicacion',
            //'edificio_id',
            // 'tipo_espacio_id',
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
