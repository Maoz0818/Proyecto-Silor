<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\PermissionHelpers;
use yii\helpers\Url;
use yii\bootstrap\Modal;
use kartik\icons\Icon;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EdificioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Edificios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="edificio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a( Icon::show('plus').'Nuevo edificio', '#', [
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
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'edificio_id',
            'nombre_edificio',
            'ubicacion',

             ['class' => 'yii\grid\ActionColumn',

                'visibleButtons' => [

                    'view' => (PermissionHelpers::requireRole('Administrador')
                                && PermissionHelpers::requireStatus('Activo')),

                    'update' => (PermissionHelpers::requireRole('Administrador')
                                && PermissionHelpers::requireStatus('Activo')),

                    'delete' => (PermissionHelpers::requireRole('Administrador')
                                && PermissionHelpers::requireStatus('Activo')),
                ], 

                'template' => '{view}{update}{delete}',
                'buttons' => [
                'update' => function ($url, $model, $key) {
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', '#', [
                        'id' => 'activity-index-link',
                        'title' => Yii::t('app', 'Actualizar'),
                        'data-toggle' => 'modal',
                        'data-target' => '#modal',
                        'data-url' => Url::to(['update', 'id' => $model->id]),
                        'data-pjax' => '0',
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
        ]);

    echo "<div></div>";

    Modal::end();
    ?>

</div>