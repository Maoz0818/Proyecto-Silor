<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Event */

$this->title = "Solicitud ".$model->nombreEstado;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Solicitudes de reserva'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-view">

    <h1><?= Html::encode($this->title) ?></h1>

<!--     <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id, 'description' => $model->description], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id, 'description' => $model->description], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p> -->

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'nombreUser',
            'title',
            'description',
            'start_date',
            'end_date',
            'nombreEspacio',
            'codigoEspacio',
            'nombreEstado',
        ],
    ]) ?>

</div>
