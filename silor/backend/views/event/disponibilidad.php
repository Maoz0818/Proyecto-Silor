<?php

use yii\helpers\Html;

?>
<div class="disponibilidad-espacio">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->renderAjax('_calendar', [
        'events' => $tasks,
    ]) ?>

</div>
