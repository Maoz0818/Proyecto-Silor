<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\ItemEspacio */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Item Espacio',
]) . $model->item_espacio_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Espacios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->item_espacio_id, 'url' => ['view', 'id' => $model->item_espacio_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="item-espacio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
