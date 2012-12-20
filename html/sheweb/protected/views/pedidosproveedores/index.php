<?php
/* @var $this PedidosproveedoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pedidosproveedores',
);

$this->menu=array(
	array('label'=>'Crear Pedidos a Proveedores', 'url'=>array('create')),
	array('label'=>'Administrar Pedidos a Proveedores', 'url'=>array('admin')),
);
?>

<h1>Pedidosproveedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
