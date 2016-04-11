<?php

namespace backend\models;

use Yii;
use backend\models\Categoria;
use yii\helpers\ArrayHelper;



/**
 * This is the model class for table "equipo".
 *
 * @property integer $equipo_id
 * @property string $nombre_equipo
 * @property string $descripcion
 * @property integer $categoria_id
 *
 * @property Categoria $categoria
 */
class Equipo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'equipo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nombre_equipo', 'categoria_id'], 'required'],
            [['categoria_id'], 'integer'],
            [['nombre_equipo'], 'string', 'max' => 100],
            [['descripcion'], 'string', 'max' => 200],
            [['categoria_id'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['categoria_id' => 'categoria_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'equipo_id' => 'Equipo ID',
            'nombre_equipo' => 'Nombre Equipo',
            'descripcion' => 'Descripcion',
            'categoria_id' => 'Categoria',
            'nombreCategoria' => 'Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['categoria_id' => 'categoria_id']);
    }

    /**
    * get list of categoria for dropdown
    */
    public static function getCategoriaList()
    {
        $droptions = Categoria::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'categoria_id', 'nombre_categoria');
    }

    /**
    * get categoria name
    *
    */

    public function getNombreCategoria()
    {
        return $this->categoria ? $this->categoria->nombre_categoria : '- no role -';
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }
}
