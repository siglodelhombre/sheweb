<?php
/* @var $this EditorialController */
/* @var $model Editorial */

$this->breadcrumbs=array(
	'Editorials'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Editorial', 'url'=>array('index')),
	array('label'=>'Manage Editorial', 'url'=>array('admin')),
);
?>
<?php include_once(Yii::app()->basePath . "/modules/".$this->module->id."/views/default/menu.php"); ?>

<h1>Create Editorial</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>