<?php

class PedidosproveedoresitemdetallereservaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

        static $_permissionControl = array( 'read'=>'Consultar',
                                            'write' => 'Crear o Actializar', 
                                            'admin'=>'Administrar');
        
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'userGroupsAccessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				 'pbac'=>array('read'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','getreservas'),
				'pbac'=>array('write'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'pbac'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Pedidosproveedoresitemdetallereserva;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pedidosproveedoresitemdetallereserva']))
		{
			$model->attributes=$_POST['Pedidosproveedoresitemdetallereserva'];
                        $model->usuarios_idusuarios=Yii::app()->user->id;
			if($model->save())
                            $this->redirect (Yii::app ()->baseUrl."/index.php/PedidosProveedores/pedidosproveedoresitemdetallereserva/getreservas/id/".$model->pedidosproveedoresitems_idpedidosproveedoresitems);
                               //$this->redirect (Yii::app ()->baseUrl."/index.php/PedidosProveedores/pedidosproveedores/view/id/1");
				//$this->redirect(array('view','id'=>$model->idpedidosproveedoresitemdetallereserva));
		}
                $model->pedidosproveedoresitems_idpedidosproveedoresitems = (isset($_REQUEST['idpedidosproveedoresitems']))?$_REQUEST['idpedidosproveedoresitems']:false;
                
		$this->render('create',array(
			'model'=>$model
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                if(Yii::app()->user->id!=$model->usuarios_idusuarios){
                    $this->redirect (Yii::app ()->baseUrl."/index.php/PedidosProveedores/pedidosproveedoresitemdetallereserva/getreservas/id/".$model->pedidosproveedoresitems_idpedidosproveedoresitems);
                }
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Pedidosproveedoresitemdetallereserva']))
		{
			$model->attributes=$_POST['Pedidosproveedoresitemdetallereserva'];
			if($model->save())
                            $this->redirect (Yii::app ()->baseUrl."/index.php/PedidosProveedores/pedidosproveedoresitemdetallereserva/getreservas/id/".$model->pedidosproveedoresitems_idpedidosproveedoresitems);
				//$this->redirect(array('view','id'=>$model->idpedidosproveedoresitemdetallereserva));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
                $model = $this->loadModel($id);
                if(Yii::app()->user->id!=$model->usuarios_idusuarios){
                    $this->redirect (Yii::app ()->baseUrl."/index.php/PedidosProveedores/pedidosproveedoresitemdetallereserva/getreservas/id/".$model->pedidosproveedoresitems_idpedidosproveedoresitems);
                }
                
		$model->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Pedidosproveedoresitemdetallereserva');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

        /**
	 * Lists all models of one item
	 */
	public function actionGetreservas($id)
	{
		$dataProvider=new CActiveDataProvider('ViewPedidosproveedoresitemdetallereserva',array(
                                                                                                    'criteria'=>array(
                                                                                                                        'condition'=>'idpedidosproveedoresitems='.$id,
                
                                                                                                                    )
                                                                                             )
                );
                
                $idpedidosproveedores = Yii::app()->db->createCommand("Select pedidosproveedores_idpedidosproveedores from pedidosproveedoresitems where idpedidosproveedoresitems=".$id)->queryAll();
                $idpedidosproveedores=$idpedidosproveedores[0]['pedidosproveedores_idpedidosproveedores'];
                
                
                
		$this->render('listreservaciones',array(
			'dataProvider'=>$dataProvider,
                        'idpedidosproveedoresitems'=>$id,
                        'idpedidosproveedores'=>$idpedidosproveedores,
		));
	}
        
	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Pedidosproveedoresitemdetallereserva('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Pedidosproveedoresitemdetallereserva']))
			$model->attributes=$_GET['Pedidosproveedoresitemdetallereserva'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Pedidosproveedoresitemdetallereserva::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='pedidosproveedoresitemdetallereserva-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
