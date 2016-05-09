<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\MotivoEstado */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Motivo Estado',
]) . $model->motivo_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Motivo Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->motivo_id, 'url' => ['view', 'id' => $model->motivo_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="motivo-estado-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
