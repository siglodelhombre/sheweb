<?php
/* @var $this PorcentajesreservasController */
/* @var $model Porcentajesreservas */

$this->breadcrumbs=array(
	'Porcentajesreservases'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Porcentajesreservas', 'url'=>array('index')),
	array('label'=>'Manage Porcentajesreservas', 'url'=>array('admin')),
);
?>
<?php include_once(Yii::app()->basePath . "/modules/".$this->module->id."/views/default/menu.php"); ?>
<h1>Create Porcentajesreservas</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>