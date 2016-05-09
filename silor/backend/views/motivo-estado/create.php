<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\MotivoEstado */

$this->title = Yii::t('app', 'Create Motivo Estado');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Motivo Estados'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="motivo-estado-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
