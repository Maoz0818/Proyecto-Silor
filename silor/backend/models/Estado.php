<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "estado".
 *
 * @property integer $estado_id
 * @property string $nombre
 *
 * @property Reserva[] $reservas
 */
class Estado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'estado';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre'], 'required'],
            [['nombre'], 'string', 'max' => 48],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'estado_id' => Yii::t('app', 'Estado ID'),
            'nombre' => Yii::t('app', 'Nombre'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReservas()
    {
        return $this->hasMany(Reserva::className(), ['estado_id' => 'estado_id']);
    }
}
