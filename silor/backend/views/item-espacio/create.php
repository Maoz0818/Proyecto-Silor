<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\ItemEspacio */

$this->title = Yii::t('app', 'Create Item Espacio');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Item Espacios'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="item-espacio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
