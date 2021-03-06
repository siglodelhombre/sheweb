<?php
/* @var $this EstrellascategoriaeditorialController */
/* @var $data Estrellascategoriaeditorial */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idestrellascategoriaeditorial')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idestrellascategoriaeditorial), array('view', 'id'=>$data->idestrellascategoriaeditorial)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('estrellas_idestrellas')); ?>:</b>
	<?php echo CHtml::encode($data->estrellasIdestrellas->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_idcategoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoriaIdcategoria->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editorial_ideditorial')); ?>:</b>
	<?php echo CHtml::encode($data->editorialIdeditorial->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('condicioncomercial_idcondicioncomercial')); ?>:</b>
	<?php echo CHtml::encode($data->condicioncomercialIdcondicioncomercial->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cantidad')); ?>:</b>
	<?php echo CHtml::encode($data->cantidad); ?>
	<br />


</div>