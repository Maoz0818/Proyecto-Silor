<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\Estado;
use backend\models\Espacio;
use backend\models\TipoEspacio;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "event".
 *
 * @property string $id
 * @property string $title
 * @property string $description
 * @property string $start_date
 * @property string $end_date
 * @property integer $user_id
 * @property integer $estado_id
 * @property integer $espacio_id

 * @property Espacio $espacio
 * @property Estado $estado
 * @property MotivoEstado $motivoEstado
 * @property User $user
 * @property ItemEquipo[] $itemEquipos
 */
class Event extends \yii\db\ActiveRecord
{
    public $fecha;
    public $horaInicio;
    public $horaFin;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'event';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'description', 'start_date', 'end_date', 'fecha', 'horaInicio', 'horaFin', 'espacio_id'], 'required'],
            [['user_id', 'estado_id', 'espacio_id'], 'integer'],
            [['title', 'description', 'fecha' , 'horaInicio', 'horaFin'], 'string', 'max' => 255],
            [['start_date', 'end_date'], 'string', 'max' => 48],
            [['espacio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Espacio::className(), 'targetAttribute' => ['espacio_id' => 'espacio_id']],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'estado_id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
            ['user_id', 'default', 'value' => Yii::$app->user->identity->id],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'No. de reserva'),
            'title' => Yii::t('app', 'Motivo de solicitud'),
            'description' => Yii::t('app', 'Descripción'),
            'start_date' => Yii::t('app', 'Fecha y hora de inicio'),
            'end_date' => Yii::t('app', 'Fecha y hora final'),
            'user_id' => Yii::t('app', 'Nombre del solicitante'),
            'estado_id' => Yii::t('app', 'Estado de solicitud'),
            'espacio_id' => Yii::t('app', 'Espacio solicitado'),
            'fecha' => Yii::t('app', 'Fecha seleccionada'),
            'horaInicio' => Yii::t('app', 'Hora de inicio'),
            'horaFin' => Yii::t('app', 'Hora de finalización'),
            'nombreUser' => Yii::t('app', 'Solicitante'),
            'nombreEstado' => Yii::t('app', 'Estado de solicitud'),
            'nombreEspacio' => Yii::t('app', 'Espacio solicitado'),
            'codigoEspacio' => Yii::t('app', 'Codigo'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['estado_id' => 'estado_id']);
    }


    public function getNombreEstado()
    {
        return $this->estado ? $this->estado->nombre : '- sin estado -';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspacio()
    {
        return $this->hasOne(Espacio::className(), ['espacio_id' => 'espacio_id']);
    }

    public function getNombreEspacio()
    {
        return $this->espacio ? $this->espacio->nombre : '- sin nombre -';
    }

    public function getCodigoEspacio()
    {
        return $this->espacio ? $this->espacio->codigo : '- sin codigo -';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getNombreUser()
    {
        return $this->user ? $this->user->nombre_completo : '- sin nombre -';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemEquipos()
    {
        return $this->hasMany(ItemEquipo::className(), ['event_id' => 'id']);
    }

    /**
    * get list of estado for dropdown
    */
    public static function getEstadoList()
    {
        $droptions = Estado::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'estado_id', 'nombre');
    }

}