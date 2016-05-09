<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\EventSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Events');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="event-index">

    <h1><?= Html::encode($this->title) ?></h1>
<!--<p>
        <?= Html::a(Yii::t('app', 'Create Event'), ['create'], ['class' => 'btn btn-success']) ?>
    </p> -->

<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'description',
            'start_date',
            'end_date',
            [
            'attribute' => 'estado_id',
            'value' => 'estado.nombre',
            ],
            [
            'attribute' => 'user_id',
            'value' => 'user.nombre_completo',
            ],
            // 'user_id',
            //'estado_id',
            // 'motivo_estado_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
