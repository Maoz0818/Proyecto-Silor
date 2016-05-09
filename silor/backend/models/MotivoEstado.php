<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "motivo_estado".
 *
 * @property integer $motivo_id
 * @property string $descripcion
 *
 * @property Event[] $events
 */
class MotivoEstado extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'motivo_estado';
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
    public function getEvents()
    {
        return $this->hasMany(Event::className(), ['motivo_cancelacion_id' => 'motivo_id']);
    }

}
