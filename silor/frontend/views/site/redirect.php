<?php

use yii\helpers\Html;
use common\models\ValueHelpers;
use kartik\icons\Icon;

/* @var $this yii\web\View */
Icon::map($this);

$this->title = 'Silor';
?>
<div class="site-redirect">

    <div class="jumbotron">
        <h1>Selecciona la opción de ingreso</h1>

    </div>
 
    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2>Acceso de administrador</h2>

                <p >
                    Aqui puedes ingresar al sistema si possees permiso de administrador, basta con hacer clic el siguiente enlace.
                </p>

                <p>
                             <p><a class="btn btn-danger" href="http://backend.silor.com/"><?= Icon::show('user', ['class' => 'fa-2x'])?>Administradores</a></p>
        
                    
                </p>
            </div>

            <div class="col-lg-6">
                <h2>Acceso de usuarios</h2>

                <p>

                    Aqui puedes ingresar al sistema si ya te encuentras registrado, basta con hacer clic en siguente enlace.
                </p>

                <p>
                    <?php
                        if (Yii::$app->user->isGuest) {

                            echo Html::a(Icon::show('user', ['class' => 'fa-2x']).'Usuarios', ['/site/login'],['class' => 'btn btn-danger']);
 
                        }
                    ?>
                </p>
            </div>

        </div>

    </div>
</div>
