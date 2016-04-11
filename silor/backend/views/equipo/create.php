<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Equipo */

$this->title = 'Nuevo equipo';
$this->params['breadcrumbs'][] = ['label' => 'Equipos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="equipo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
