<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use common\models\ValueHelpers;
use kartik\icons\Icon;
use yii\helpers\Url;
use yii\widgets\Pjax;
use conquer\momentjs\MomentjsAsset;

AppAsset::register($this);
Icon::map($this);
MomentjsAsset::register($this);

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

    $is_admin = ValueHelpers::getRoleValue('Administrador');
    $is_superUser = ValueHelpers::getRoleValue('SuperUsuario');

    NavBar::begin([
            'brandLabel' => '<img src="/images/univalle.png" class="pull-left"/> &nbsp Universidad del Valle',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
            'class' => 'navbar-collapse navbar-fixed-top',],
    ]); 
    


    $menuItems = [
    ['label' => Icon::show('home').'Inicio', 'url' => ['/site/index']],
    ];

    if (!Yii::$app->user->isGuest
    && Yii::$app->user->identity->role_id == $is_admin) {

        $menuItems []=['label' => Icon::show('building-o').'Espacios',
            'items' => [
                ['label' => 'Gestión de Espacios', 'url' => ['/espacio/index']],
                ['label' => 'Tipos de Espacio', 'url' => ['/tipo-espacio/index']],
                ['label' => 'Edificios', 'url' => ['/edificio/index']],
            ],
        ];

        $menuItems []=['label' => Icon::show('laptop').'Equipos',
            'items' => [
                ['label' => 'Gestión de Equipos', 'url' => ['/equipo/index']],
                ['label' => 'Categorias', 'url' => ['/categoria/index']],  
            ],
        ];

        $menuItems []=['label' => Icon::show('users').'Usuarios',
            'items' => [
                ['label' => 'Gestión de Usuarios', 'url' => ['/user/index']],  
            ],
        ];
    }

    if (!Yii::$app->user->isGuest
    && Yii::$app->user->identity->role_id == $is_superUser) {

        $menuItems []=['label' => Icon::show('users').'Usuarios',
            'items' => [
                ['label' => 'Gestión de Usuarios', 'url' => ['/user/index']],  
            ],
        ];  
    }

    if (Yii::$app->user->isGuest) {
        
        $menuItems[] = ['label' => Icon::show('info-circle').'Acerca de', 'url' => ['/site/about']];
        $menuItems[] = ['label' => Icon::show('envelope').'Solicitud de registro', 'url' => ['/site/contact']];
        $menuItems[] = ['label' => Icon::show('sign-in').'Ingresar', 'url' => ['/site/login']];

    } else {

        $menuItems [] = ['label' => '<img src="/images/user.png"/> &nbsp'.Yii::$app->user->identity->nombre_completo,
            'items' => [
                ['label' => Icon::show('times').'Cerrar sesión','url' => ['/site/logout']], 
            ],
        ];
        // $menuItems[] = ['label' => Icon::show('sign-out').'Salir (' . Yii::$app->user->identity->nombre_completo .')' ,
        // 'url' => ['/site/logout']];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
        'encodeLabels' => false,
    ]);

    NavBar::end();

    ?>

    <div class="container" id="main-content">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>

        <?php Pjax::begin(); ?> 
        <?= $content ?>
        <?php Pjax::end(); ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <div class="footer-logo">
            <p class="pull-left"><?=Html::img('@web/images/logoUnivalle.jpg')?> Universidad del Valle <?= date('Y') ?></p>

            <p class="pull-right"><br> &copy; Derechos reservados por el equipo de desarrollo "SILOR" </p>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
