<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $categoria_id
 * @property string $nombre_categoria
 *
 * @property Equipo[] $equipos
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_categoria'], 'required'],
            [['nombre_categoria'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoria_id' => 'Categoria ID',
            'nombre_categoria' => 'Nombre Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEquipos()
    {
        return $this->hasMany(Equipo::className(), ['categoria_id' => 'categoria_id']);
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
