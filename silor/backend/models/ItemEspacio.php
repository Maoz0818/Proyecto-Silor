<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "item_espacio".
 *
 * @property integer $item_espacio_id
 * @property integer $espacio_id
 * @property string $event_id
 *
 * @property Espacio $espacio
 * @property Event $event
 */
class ItemEspacio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'item_espacio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['espacio_id'], 'required','message'=>'Debes seleccionar un espacio de la tabla.'],
            [['espacio_id', 'event_id'], 'integer'],
            [['espacio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Espacio::className(), 'targetAttribute' => ['espacio_id' => 'espacio_id']],
            [['event_id'], 'exist', 'skipOnError' => true, 'targetClass' => Event::className(), 'targetAttribute' => ['event_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'item_espacio_id' => Yii::t('app', 'Item Espacio ID'),
            'espacio_id' => Yii::t('app', 'Espacio seleccionado'),
            'event_id' => Yii::t('app', 'Event ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEspacio()
    {
        return $this->hasOne(Espacio::className(), ['espacio_id' => 'espacio_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEvent()
    {
        return $this->hasOne(Event::className(), ['id' => 'event_id']);
    }
}
