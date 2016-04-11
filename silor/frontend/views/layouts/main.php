<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use kartik\icons\Icon;
use yii\helpers\Url;


AppAsset::register($this);
Icon::map($this);

?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => '<img src="images/univalle.png" class="pull-left"/>&nbsp SILOR',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    
    $menuItems = [
        ['label' => Icon::show('home').'Inicio', 'url' => ['/site/index']],  
        ['label' => Icon::show('info-circle').'Acerca de', 'url' => ['/site/about']],
        ['label' => Icon::show('envelope').'Contactanos', 'url' => ['/site/contact']],
    ];

    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => Icon::show('sign-in').'Ingresar', 'url' => ['/site/redirect']];
    } else {
        $menuItems[] = ['label' => Icon::show('sign-out').'Salir (' . Yii::$app->user->identity->nombre_completo .')' ,
        'url' => ['/site/logout']];
    }

    echo Nav::widget([
        'items' => $menuItems,
        'options' => ['class' => 'navbar-nav navbar-right'],
        'encodeLabels' => false,
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        
        <?= $content ?>
        
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left"><?=Html::img('@web/images/logoUnivalle.jpg')?> Universidad del Valle <?= date('Y') ?></p>

        <p class="pull-right"><br> &copy; Derechos reservados por el equipo de desarrollo "SILOR" </p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
