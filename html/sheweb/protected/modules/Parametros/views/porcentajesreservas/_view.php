<?php
/* @var $this PorcentajesreservasController */
/* @var $data Porcentajesreservas */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idporcentajesreservas')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idporcentajesreservas), array('view', 'id'=>$data->idporcentajesreservas)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('usergroups_user_id')); ?>:</b>
	<?php echo CHtml::encode($data->usergroupsUser->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('categoria_idcategoria')); ?>:</b>
	<?php echo CHtml::encode($data->categoriaIdcategoria->nombre); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('editorial_ideditorial')); ?>:</b>
	<?php echo CHtml::encode($data->editorialIdeditorial->nombre); ?>
	<br />

        <b><?php echo CHtml::encode($data->getAttributeLabel('bodega_idbodega')); ?>:</b>
	<?php 
            if(isset($data->bodegaIdbodega->nombre)){
                echo CHtml::encode($data->bodegaIdbodega->nombre);
            }
         ?>
	<br />
        
	<b><?php echo CHtml::encode($data->getAttributeLabel('porcentaje')); ?>:</b>
	<?php echo CHtml::encode($data->porcentaje); ?>
	<br />


</div>