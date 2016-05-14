<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Espacio;
use backend\models\search\EspacioSearch;
use yii\widgets\Pjax;
use yii\grid\GridView;
use kartik\icons\Icon;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model backend\models\search\EspacioSearch */
/* @var $form yii\widgets\ActiveForm */
$searchModel = new EspacioSearch();
$dataProvider = $searchModel->searchParaReserva(Yii::$app->request->queryParams);
?>
<div class="espacio-search">
    
<?= GridView::widget([
        'id' => 'espacio-grid',
        'dataProvider' => $dataProvider,
        'columns' => [
            'espacio_id',
            'nombre',
            'codigo',
            'capacidad',
            [
            'attribute' => 'edificio_id',
            'value' => 'edificio.nombre_edificio',
            ],
            ['class' => 'yii\grid\ActionColumn',
            'template' => '{view}',
                'header' => 'Opciones',
                'buttons' => [
                    'view' => function ($url, $model, $key) {
                        return Html::a(Icon::show('eye').'Ver', '#', [
                            'id' => 'activity-index-link',
                            'title' => Yii::t('app', 'Ver Disponibilidad'),
                            'class'=>'btn btn-danger btn-xs',
                            'data-toggle' => 'modal',
                            'data-target' => '#modal',
                            'data-url' => Url::to(['disponibilidad', 'id' => $model->id]),
                            'data-pjax' => '0',
                        ]);
                    },
                ],
            ],
            [
            'class' => 'yii\grid\CheckboxColumn',
            // you may configure additional properties here
                'header' => 'Selección',
                'multiple'=> false,
                'checkboxOptions' => function ($model, $key, $index, $column) {
                return ['value' => $model->espacio_id,
                'title' => Yii::t('app', 'Selecciona un espacio'),];
                }
            ],
        ],
    ]); 
?>  
</div>