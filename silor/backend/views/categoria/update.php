<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Categoria */

$this->title = 'Actualizar';
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->categoria_id, 'url' => ['view', 'id' => $model->categoria_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="categoria-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_form', [
        'model' => $model,
    ]) ?>

</div>
