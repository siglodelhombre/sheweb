<?php
/* @var $this TiposidentificacionController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Tiposidentificacions',
);

$this->menu=array(
	array('label'=>'Create Tiposidentificacion', 'url'=>array('create')),
	array('label'=>'Manage Tiposidentificacion', 'url'=>array('admin')),
);
?>
<?php include_once(Yii::app()->basePath . "/modules/".$this->module->id."/views/default/menu.php"); ?>
<h1>Tiposidentificacions</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
