<?php

/**
 * This is the model class for table "pedidosproveedoresentradasalmacen".
 *
 * The followings are the available columns in table 'pedidosproveedoresentradasalmacen':
 * @property integer $idpedidosproveedoresentradasalmacen
 * @property string $fecha
 * @property string $observaciones
 * @property integer $bodega_idbodega
 * @property integer $usuarios_idusuarios
 * @property integer $pedidosproveedores_idpedidosproveedores
 *
 * The followings are the available model relations:
 * @property Pedidosproveedores[] $pedidosproveedores
 * @property Bodega $bodegaIdbodega
 * @property Pedidosproveedores $pedidosproveedoresIdpedidosproveedores
 * @property Usuarios $usuariosIdusuarios
 * @property Pedidosproveedoresentradasalmacendetalle[] $pedidosproveedoresentradasalmacendetalles
 * @property Pedidosproveedoresentradasalmacenfallados[] $pedidosproveedoresentradasalmacenfalladoses
 */
class Pedidosproveedoresentradasalmacen extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Pedidosproveedoresentradasalmacen the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'pedidosproveedoresentradasalmacen';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('bodega_idbodega, usuarios_idusuarios, pedidosproveedores_idpedidosproveedores', 'required'),
			array('bodega_idbodega, usuarios_idusuarios, pedidosproveedores_idpedidosproveedores', 'numerical', 'integerOnly'=>true),
			array('fecha, observaciones', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpedidosproveedoresentradasalmacen, fecha, observaciones, bodega_idbodega, usuarios_idusuarios, pedidosproveedores_idpedidosproveedores', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'pedidosproveedores' => array(self::MANY_MANY, 'Pedidosproveedores', 'pedidosproveedores_has_pedidosproveedoresentradasalmacen(idpedidosproveedoresentradasalmacen, idpedidosproveedores)'),
			'bodegaIdbodega' => array(self::BELONGS_TO, 'Bodega', 'bodega_idbodega'),
			'pedidosproveedoresIdpedidosproveedores' => array(self::BELONGS_TO, 'Pedidosproveedores', 'pedidosproveedores_idpedidosproveedores'),
			'usuariosIdusuarios' => array(self::BELONGS_TO, 'Usuarios', 'usuarios_idusuarios'),
			'pedidosproveedoresentradasalmacendetalles' => array(self::HAS_MANY, 'Pedidosproveedoresentradasalmacendetalle', 'idpedidosproveedoresentradasalmacen'),
			'pedidosproveedoresentradasalmacenfalladoses' => array(self::HAS_MANY, 'Pedidosproveedoresentradasalmacenfallados', 'idpedidosproveedoresentradasalmacen'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpedidosproveedoresentradasalmacen' => 'Idpedidosproveedoresentradasalmacen',
			'fecha' => 'Fecha',
			'observaciones' => 'Observaciones',
			'bodega_idbodega' => 'Bodega Idbodega',
			'usuarios_idusuarios' => 'Usuarios Idusuarios',
			'pedidosproveedores_idpedidosproveedores' => 'Pedidosproveedores Idpedidosproveedores',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('idpedidosproveedoresentradasalmacen',$this->idpedidosproveedoresentradasalmacen);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('observaciones',$this->observaciones,true);
		$criteria->compare('bodega_idbodega',$this->bodega_idbodega);
		$criteria->compare('usuarios_idusuarios',$this->usuarios_idusuarios);
		$criteria->compare('pedidosproveedores_idpedidosproveedores',$this->pedidosproveedores_idpedidosproveedores);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}