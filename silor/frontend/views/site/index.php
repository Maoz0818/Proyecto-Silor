<?php

use yii\helpers\Html;
use common\models\ValueHelpers;

/* @var $this yii\web\View */

$this->title = 'Silor';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Bienvenido a SILOR!</h1>

        <p class="lead">Sistema logístico de reservas</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Calendario de reservas</a></p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Reserva de equipos</a></p>

    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Contactanos</h2>

                <p>
                    Aqui puedes contactar con el administrador del sistema. Puedes enviar una solicitud para ser registrado
                    , basta con hacer clic el enlace de abajo.
                </p>

                <p>
                    <?php
                        if (Yii::$app->user->isGuest) {

                            echo Html::a('Contactanos', ['/site/contact'],['class' => 'btn btn-default']);
 
                        }
                    ?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Contactanos</h2>

                <p>
                    Aqui puedes contactar con el administrador del sistema. Puedes enviar una solicitud para ser registrado
                    , basta con hacer clic el enlace de abajo.
                </p>

                <p>
                    <?php
                        if (Yii::$app->user->isGuest) {

                            echo Html::a('Contactanos', ['/site/contact'],['class' => 'btn btn-default']);
 
                        }
                    ?>
                </p>
            </div>
            <div class="col-lg-4">
                <h2>Contactanos</h2>

                <p>
                    Aqui puedes contactar con el administrador del sistema. Puedes enviar una solicitud para ser registrado
                    , basta con hacer clic el enlace de abajo.
                </p>

                <p>
                    <?php
                        if (Yii::$app->user->isGuest) {

                            echo Html::a('Contactanos', ['/site/contact'],['class' => 'btn btn-default']);
 
                        }
                    ?>
                </p>
            </div>
        </div>

    </div>
</div>
