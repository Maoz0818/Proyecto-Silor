<?php

namespace backend\models;

use Yii;
use backend\models\TipoEspacio;
use backend\models\Edificio;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "espacio".
 *
 * @property integer $espacio_id
 * @property string $codigo
 * @property integer $capacidad
 * @property string $ubicacion
 * @property integer $edificio_id
 * @property integer $tipo_espacio_id
 *
 * @property Edificio $edificio
 * @property TipoEspacio $tipoEspacio
 */
class Espacio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'espacio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'capacidad', 'tipo_espacio_id'], 'required'],
            [['capacidad', 'edificio_id', 'tipo_espacio_id'], 'integer'],
            [['codigo'], 'string', 'max' => 20],
            [['ubicacion'], 'string', 'max' => 80],
            [['codigo'], 'unique'],
            [['edificio_id'], 'exist', 'skipOnError' => true, 'targetClass' => Edificio::className(), 'targetAttribute' => ['edificio_id' => 'edificio_id']],
            [['tipo_espacio_id'], 'exist', 'skipOnError' => true, 'targetClass' => TipoEspacio::className(), 'targetAttribute' => ['tipo_espacio_id' => 'tipo_espacio_id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'tipo_espacio_id' => 'Tipo de Espacio',
            'codigo' => 'Codigo',
            'espacio_id' => 'Espacio ID',
            'capacidad' => 'Capacidad de personas',
            'ubicacion' => 'Ubicacion',
            'edificio_id' => 'Edificio',
            'nombreTipoEspacio' => 'Tipo de espacio',
            'nombreEdificio' => 'Edificio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEdificio()
    {
        return $this->hasOne(Edificio::className(), ['edificio_id' => 'edificio_id']);
    }

            /**
    * get list of Edificio for dropdown
    */
    public static function getEdificioList()
    {
        $droptions = Edificio::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'edificio_id', 'nombre_edificio');
    }

    /**
    * get edificio name
    *
    */

    public function getNombreEdificio()
    {
        return $this->edificio ? $this->edificio->nombre_edificio : '- no role -';
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoEspacio()
    {
        return $this->hasOne(TipoEspacio::className(), ['tipo_espacio_id' => 'tipo_espacio_id']);
    }

                /**
    * get list of tipoEspacio for dropdown
    */
    public static function getTipoEspacioList()
    {
        $droptions = TipoEspacio::find()->asArray()->all();
        return Arrayhelper::map($droptions, 'tipo_espacio_id', 'nombre_tipo');
    }

    /**
    * get tipoEspacio name
    *
    */

    public function getNombreTipoEspacio()
    {
        return $this->tipoEspacio ? $this->tipoEspacio->nombre_tipo : '- no role -';
    }

    public function getId()
    {
        return $this->getPrimaryKey();
    }


}
