<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemEspacio */

$this->title = $model->item_espacio_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Espacios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-espacio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->item_espacio_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->item_espacio_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'item_espacio_id',
            'espacio_id',
            'event_id',
        ],
    ]) ?>

</div>
