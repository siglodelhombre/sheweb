<?php

/**
 * This is the model class for table "view_pedidosproveedoresentradasalmacenfallados".
 *
 * The followings are the available columns in table 'view_pedidosproveedoresentradasalmacenfallados':
 * @property integer $idpedidosproveedoresentradasalmacenfallados
 * @property integer $idpedidosproveedoresentradasalmacen
 * @property integer $item_iditem
 * @property integer $cantidad
 * @property string $nombre
 * @property integer $idcondicioncomercial
 * @property string $condicioncomercial
 */
class ViewPedidosproveedoresentradasalmacenfallados extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ViewPedidosproveedoresentradasalmacenfallados the static model class
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
		return 'view_pedidosproveedoresentradasalmacenfallados';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpedidosproveedoresentradasalmacen, item_iditem', 'required'),
			array('idpedidosproveedoresentradasalmacenfallados, idpedidosproveedoresentradasalmacen, item_iditem, cantidad, idcondicioncomercial', 'numerical', 'integerOnly'=>true),
			array('nombre', 'length', 'max'=>512),
			array('condicioncomercial', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpedidosproveedoresentradasalmacenfallados, idpedidosproveedoresentradasalmacen, item_iditem, cantidad, nombre, idcondicioncomercial, condicioncomercial', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpedidosproveedoresentradasalmacenfallados' => 'Idpedidosproveedoresentradasalmacenfallados',
			'idpedidosproveedoresentradasalmacen' => 'Idpedidosproveedoresentradasalmacen',
			'item_iditem' => 'Item Iditem',
			'cantidad' => 'Cantidad',
			'nombre' => 'Nombre',
			'idcondicioncomercial' => 'Idcondicioncomercial',
			'condicioncomercial' => 'Condicioncomercial',
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

		$criteria->compare('idpedidosproveedoresentradasalmacenfallados',$this->idpedidosproveedoresentradasalmacenfallados);
		$criteria->compare('idpedidosproveedoresentradasalmacen',$this->idpedidosproveedoresentradasalmacen);
		$criteria->compare('item_iditem',$this->item_iditem);
		$criteria->compare('cantidad',$this->cantidad);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('idcondicioncomercial',$this->idcondicioncomercial);
		$criteria->compare('condicioncomercial',$this->condicioncomercial,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        
        /*LOG DE CAMBIOS*/
        public function behaviors()
        {
            return array(
                'LoggableBehavior'=>
                    'application.extensions.auditTrail.behaviors.LoggableBehavior',
            );
        }
 
}