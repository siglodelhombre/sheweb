<?php
/* @var $this MonedaController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Monedas',
);

$this->menu=array(
	array('label'=>'Create Moneda', 'url'=>array('create')),
	array('label'=>'Manage Moneda', 'url'=>array('admin')),
);
?>
<?php include_once(Yii::app()->basePath . "/modules/".$this->module->id."/views/default/menu.php"); ?>
<h1>Monedas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
