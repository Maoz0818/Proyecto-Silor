<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\PermissionHelpers;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\icons\Icon;
use kartik\date\DatePicker;
use kartik\export\ExportMenu;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Solicitudes de reserva');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
    
    <div class="form-group">

    <p>

    <?php 
    $gridColumns = [
    ['class' => 'yii\grid\SerialColumn'],
    'id',
    'nombreUser',
    'title',
    'description',
    'start_date',
    'end_date',
    'nombreEstado',
    ];?>

    <?=ExportMenu::widget([
            'filterModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'columns' => $gridColumns,
            'filename' => 'Informe solicitudes de reserva',
            'target' => ExportMenu::TARGET_SELF,
            'fontAwesome' => true,
            'exportConfig' => [
            ExportMenu::FORMAT_HTML => false,

            ],
            'dropdownOptions' => [
            'label' => 'Exportar en:',
            'class' => 'btn btn-primary',
            ],
        ]);?>

    <?= Html::a(Yii::t('app', Icon::show('plus').'Nueva solicitud'), ['create'], ['class' => 'btn btn-success']) ?>

    </p>

    </div>

</div>

<?php Pjax::begin(); ?>    

<?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'id' => 'reservas-grid',
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            // 'nombre',
            [
            'attribute' => 'espacio_id',
            'value' => 'espacio.nombre',
            ],
            [
            'attribute' => 'codigo',
            'value' => 'espacio.codigo',
            ],
            [
            'attribute' => 'user_id',
            'value' => 'user.nombre_completo',
            ],
            'title',
            //'description',
            //'start_date',
            // 'espacio_id',
            [
            'attribute' => 'start_date',
            'value' => 'start_date',
            'format' => 'raw',
            'filter' => DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'start_date',
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),

            ],
            //'end_date',
            [
            'attribute' => 'end_date',
            'value' => 'end_date',
            'format' => 'raw',
            'filter' => DatePicker::widget([
                'model' => $searchModel,
                'attribute' => 'end_date',
                'type' => DatePicker::TYPE_INPUT,
                'pluginOptions' => [
                        'autoclose'=>true,
                        'format' => 'yyyy-mm-dd',
                    ]
                ]),

            ],
            [
            'attribute' => 'estado_id',
            'value' => 'estado.nombre',
            ],
            //'estado_id',
            // 'motivo_estado_id',
            ['class' => 'yii\grid\ActionColumn',
                'template' => '{view} &nbsp{update}',
                'header' => 'Opciones',
                'buttons' => [
                        'update' => function ($url, $model, $key) {
                            return Html::a(Icon::show('pencil'),'#', [
                                'id' => 'activity-index-link',
                                'title' => Yii::t('app', 'Actualizar estado'),
                                'class'=>'btn btn-primary btn-xs',
                                'data-toggle' => 'modal',
                                'data-target' => '#modal',
                                'data-url' => Url::to(['update', 'id' => $model->id, 'description' => $model->description]),
                                'data-pjax' => '0',
                                ]);
                        },
                        'view' => function ($url, $model){
                            return Html::a(Icon::show('eye'), $url, [
                                'title' => Yii::t('app', 'Ver solicitud'),
                                'class'=>'btn btn-primary btn-xs',
                                ]);
                        },
                ], 

            ],
        ],
    ]); ?>
<?php Pjax::end(); ?>

    <?php
        Modal::begin([
            'id' => 'modal',
            'size' => 'modal-lg',
            'header' => '<h3>Actualizar estado de solicitud</h3>',
            ]);

        echo "<div></div>";

        Modal::end();
    ?>


</div>



