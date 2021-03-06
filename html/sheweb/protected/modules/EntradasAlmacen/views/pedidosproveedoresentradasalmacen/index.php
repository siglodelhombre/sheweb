<?php
/* @var $this PedidosproveedoresentradasalmacenController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Pedidosproveedoresentradasalmacens',
);

$this->menu=array(
	array('label'=>'Consultar entradas', 'url'=>array('admin')),
);
?>
<?php include_once(Yii::app()->basePath . "/modules/".$this->module->id."/views/default/menu.php"); ?>


<?php
        if($estado=='impreso'){
            echo "<h1>Pedidos a Proveedores pendientes de entrada</h1>";
            $columnas= array(
                  'idpedidosproveedores',
                  'nombreproveedor',
                  'tipopedidosproveedores',
                  'fechaestimada',
                  'descripcion',
                  array('class' => 'CLinkColumn',
                        'header'=>'Accion',
                        'label'=>'Hacer entrada',
                        'urlExpression'=>'Yii::app()->createUrl("/EntradasAlmacen/pedidosproveedoresentradasalmacen/create/id/".$data->idpedidosproveedores)',
                  ),
                ); 
        }else{
            echo "<h1>Pedidos a Proveedores en estado  \"".$estado."\"</h1>";
            $columnas = array(
                  'idpedidosproveedores',
                  'nombreproveedor',
                  'tipopedidosproveedores',
                  'fechaestimada',
                  'descripcion',
                  'estado');
        }
        
        $this->widget('ext.groupgridview.GroupGridView', array(
                'id' => 'grid1',
                'dataProvider' => $dataProvider,
                 'columns' => $columnas,
              ));
?>
