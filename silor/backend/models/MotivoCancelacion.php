<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "motivo_cancelacion".
 *
 * @property integer $motivo_id
 * @property string $descripcion
 *
 * @property Reserva[] $reservas
 */
class MotivoCancelacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'motivo_cancelacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion'], 'required'],
            [['descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'motivo_id' => Yii::t('app', 'Motivo ID'),
            'descripcion' => Yii::t('app', 'Descripcion'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['motivo_cancelacion_id' => 'motivo_id']);
    }
}
