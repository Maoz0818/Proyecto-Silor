<?php

use yii\helpers\Html;
use common\models\ValueHelpers;
use kartik\icons\Icon;

/**
* @var yii\web\View $this
*/

$this->title = 'Silor';

?>

<div class="site-index">

    <div class="jumbotron">

        <h1>Bienvenido a silor!</h1>

        <p class="lead">

            Sistema logístico de reservas, conoce nuestros servicios.

        </p>

    </div>

    <div class="body-content">

        <div class="row">

            <div class="col-lg-6">

                <h2>Reserva de espacios</h2>

                <p>
                    Aquí puedes realizar la solicitud para la reserva de espacios con los cuales cuenta la universidad del valle. Para realizar una solicitud de reserva debes ser un usuario registrado, si aún no te encuentras registrado puedes solicitarlo en el enlace de arriba.
                    Si ya eres un usuario registrado, basta con hacer clic el enlace de abajo para identificarte y empezar.
                </p>

                <p>

                    <?php

                            echo Html::a(Icon::show('calendar', ['class' => 'fa-2x']).'Reservar Espacios', ['user/index'],['class' => 'btn btn-danger']);

                    ?>
                </p>
            </div>
  
            <div class="col-lg-6">
                <h2>Reserva de Equipos</h2>
                <p>
                    Aquí puedes realizar la reserva de equipos o ayudas audiovisuales con las cuales cuenta la universidad del valle, sede yumbo. Para realizar una solicitud de reserva debes ser un usuario registrado, si aún no te encuentras registrado puedes solicitarlo en el enlace de arriba.
                    Si ya eres un usuario registrado, basta con hacer clic el enlace de abajo para identificarte y empezar.
                </p>
                <p>
                    <?php
                    
                            echo Html::a(Icon::show('laptop', ['class' => 'fa-2x']).'Reservar Equipos', ['user/index'],['class' => 'btn btn-danger']);
                    ?>
                </p>
            </div>

        </div>
    </div>
</div>