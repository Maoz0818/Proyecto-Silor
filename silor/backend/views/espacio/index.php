<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\PermissionHelpers;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EspacioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Espacios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="espacio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a( Icon::show('plus').'Nuevo espacio', '#', [
            'id' => 'activity-index-link',
            'class' => 'btn btn-success',
            'data-toggle' => 'modal',
            'data-target' => '#modal',
            'data-url' => Url::to(['create']),
            'data-pjax' => '0',
        ]); ?>  
    </p>
<?php Pjax::begin(); ?>    
    
    <?= GridView::widget([
        'id' => 'espacio-grid',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'espacio_id',
            'nombre',
            'codigo',
            'capacidad',
            [
                'attribute' => 'edificio_id',
                'value' => 'edificio.nombre_edificio',
            ],
            'ubicacion',
            //'edificio_id',

            ['class' => 'yii\grid\ActionColumn',

                'visibleButtons' => [

                    'view' => (PermissionHelpers::requireRole('Administrador')
                                && PermissionHelpers::requireStatus('Activo')),

                    'update' => (PermissionHelpers::requireRole('Administrador')
                                && PermissionHelpers::requireStatus('Activo')),

                    'delete' => (PermissionHelpers::requireRole('Administrador')
                                && PermissionHelpers::requireStatus('Activo')),
                ], 

                'template' => '{view} {update}',
                'header' => 'Opciones',
                'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                        'id' => 'activity-index-link',
                        'title' => Yii::t('app', 'Actualizar espacio'),
                        'class'=>'btn btn-primary btn-xs',
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'data-url' => Url::to(['update', 'id' => $model->id]),
                        'data-pjax' => '0',
                        ]);
                },

                'view' => function ($url, $model){
                            return Html::a(Icon::show('eye'), $url, [
                                'title' => Yii::t('app', 'Ver espacio'),
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
            'header' => '<h3>Gestión de espacios</h3>',
            ]);

        echo "<div></div>";

        Modal::end();
    ?>

    </div>