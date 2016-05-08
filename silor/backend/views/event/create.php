<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Event */

$this->title = Yii::t('app', 'Solicitud de reserva');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Calendario'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
		'model' => $model,
        'item' => $item,
        'searchModel' => $searchModel,
        'dataProvider' => $dataProvider,
    ]) ?>

</div>
