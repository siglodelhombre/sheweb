<?php
/* @var $this MonedaController */
/* @var $model Moneda */

$this->breadcrumbs=array(
	'Monedas'=>array('index'),
	$model->idmoneda=>array('view','id'=>$model->idmoneda),
	'Update',
);

$this->menu=array(
	array('label'=>'List Moneda', 'url'=>array('index')),
	array('label'=>'Create Moneda', 'url'=>array('create')),
	array('label'=>'View Moneda', 'url'=>array('view', 'id'=>$model->idmoneda)),
	array('label'=>'Manage Moneda', 'url'=>array('admin')),
);
?>
<?php include_once(Yii::app()->basePath . "/modules/".$this->module->id."/views/default/menu.php"); ?>
<h1>Update Moneda <?php echo $model->idmoneda; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>