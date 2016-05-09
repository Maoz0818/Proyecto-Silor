<?php

namespace backend\models;

use Yii;
use common\models\User;
use backend\models\Estado;
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
 * @property integer $motivo_estado_id
 *
 * @property Estado $estado
 * @property MotivoEstado $motivoEstado
 * @property User $user
 * @property ItemEquipo[] $itemEquipos
 * @property ItemEspacio[] $itemEspacios
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
            [['title', 'description', 'start_date', 'end_date', 'fecha', 'horaInicio', 'horaFin', 'estado_id'], 'required'],
            [['user_id', 'estado_id', 'motivo_estado_id'], 'integer'],
            [['title', 'description', 'fecha' , 'horaInicio', 'horaFin'], 'string', 'max' => 255],
            [['start_date', 'end_date'], 'string', 'max' => 48],
            [['estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Estado::className(), 'targetAttribute' => ['estado_id' => 'estado_id']],
            [['motivo_estado_id'], 'exist', 'skipOnError' => true, 'targetClass' => MotivoEstado::className(), 'targetAttribute' => ['motivo_estado_id' => 'motivo_id']],
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
            'id' => Yii::t('app', 'Consecutivo'),
            'title' => Yii::t('app', 'Motivo solicitud'),
            'description' => Yii::t('app', 'Descripcion'),
            'start_date' => Yii::t('app', 'Fecha y hora inicio'),
            'end_date' => Yii::t('app', 'Fecha y hora final'),
            'user_id' => Yii::t('app', 'Nombre del solicitante'),
            'estado_id' => Yii::t('app', 'Estado de solicitud'),
            'motivo_estado_id' => Yii::t('app', 'Motivo de cancelacion'),
            'fecha' => Yii::t('app', 'Fecha seleccionada'),
            'horaInicio' => Yii::t('app', 'Hora de inicio'),
            'horaFin' => Yii::t('app', 'Hora de finalización'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstado()
    {
        return $this->hasOne(Estado::className(), ['estado_id' => 'estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMotivoEstado()
    {
        return $this->hasOne(MotivoEstado::className(), ['motivo_id' => 'motivo_estado_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemEquipos()
    {
        return $this->hasMany(ItemEquipo::className(), ['event_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getItemEspacios()
    {
        return $this->hasMany(ItemEspacio::className(), ['event_id' => 'id']);
    }

        /**
    * get list of motovo_estado for dropdown
    */
    public static function getEstadoList()
    {
        $droptions = Estado::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'estado_id', 'nombre');
    }

}
