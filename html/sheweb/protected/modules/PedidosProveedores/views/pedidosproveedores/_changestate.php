<?php
/* @var $this PedidosproveedoresController */
/* @var $model Pedidosproveedores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pedidosproveedores-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>


        <?php echo $form->errorSummary(array($pedidosproveedores)); ?>



	<div class="row">
            <?php echo $form->labelEx($pedidosproveedores,'fechaestimada'); ?>
            <?php
            if ($pedidosproveedores->fechaestimada!='') {
                $pedidosproveedores->fechaestimada=date('Y-m-d',strtotime($pedidosproveedores->fechaestimada));
                
            }
            $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                'model'=>$pedidosproveedores,
                'attribute'=>'fechaestimada',
                'value'=>$pedidosproveedores->fechaestimada,
                'language' => 'es',
                'htmlOptions' => array('readonly'=>"readonly"),
                'options'=>array(
                    'autoSize'=>true,
                    'defaultDate'=>$pedidosproveedores->fechaestimada,
                    'dateFormat'=>'yy-mm-dd',
                    'buttonImage'=>Yii::app()->baseUrl.'/images/basic/calendar_icon_mini.png',
                    'buttonImageOnly'=>true,
                    'buttonText'=>'Fecha',
                    'selectOtherMonths'=>true,
                    'showAnim'=>'slide',
                    'showButtonPanel'=>true,
                    'showOn'=>'button',
                    'showOtherMonths'=>true,
                    'changeMonth' => 'true',
                    'changeYear' => 'true',),
                ));
            ?>
            <?php echo $form->error($pedidosproveedores,'fechaestimada'); ?>
	</div>
        <hr class="separador_blanco">
        
        <div class="row">
            <b>Estado:</b>
		<?php echo $form->dropDownList($pedidosproveedores,'estado',array('activo'=>'activo','aprobado'=>'aprobado','cerrado'=>'cerrado','anulado'=>'anulado'));?>
	</div>
        
        <hr class="separador_blanco">
        
            
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($pedidosproveedores->isNewRecord ? 'Crear' : 'Guardar'); 
             echo "<div class='boton' >";
            echo CHtml::link("Cancelar",Yii::app()->createUrl($this->module->id."/pedidosproveedores/view", array("id"=>$pedidosproveedores->idpedidosproveedores)));
            echo "</div>"; 
            
            ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->