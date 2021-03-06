<?php

class ProyectosespecialesController extends Controller
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
				'actions'=>array('create','update'),
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
		$model=new Proyectosespeciales;
                $proyectosespecialesuser = new ProyectosespecialesHasUsergroupsUser;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Proyectosespeciales']))
		{
			$model->attributes=$_POST['Proyectosespeciales'];
                        $model->idusuariocreacion = Yii::app()->user->id;
			if($model->save()){
                            if(isset($_POST['usergroups_user'])){
                                
                                foreach($_POST['usergroups_user'] as $usuario){
                                    
                                    $model2=new ProyectosespecialesHasUsergroupsUser;
                                    $model2->proyectosespeciales_idproyectosespeciales = $model->idproyectosespeciales;
                                    $model2->usergroups_user_id = $usuario;
                                    $model2->save();
                                    unset($model2);
                                    
                                }
                            }
                            
                            
                            $this->redirect(array('view','id'=>$model->idproyectosespeciales));
                        }
		}
                
                

		$this->render('create',array(
			'model'=>$model,
                        'proyectosespecialesuser'=>$proyectosespecialesuser,
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Proyectosespeciales']))
		{
			$model->attributes=$_POST['Proyectosespeciales'];
			if($model->save()){
                            if(isset($_POST['usergroups_user'])){
                                 
                                ProyectosespecialesHasUsergroupsUser::model()->deleteAll('proyectosespeciales_idproyectosespeciales=:proyectosespeciales_idproyectosespeciales',array('proyectosespeciales_idproyectosespeciales'=>$model->idproyectosespeciales));
                                foreach($_POST['usergroups_user'] as $usuario){
                                    
                                    $model2=new ProyectosespecialesHasUsergroupsUser;
                                    $model2->proyectosespeciales_idproyectosespeciales = $model->idproyectosespeciales;
                                    $model2->usergroups_user_id = $usuario;
                                    $model2->save();
                                    unset($model2);
                                    
                                }
                            }
                            
                            $this->redirect(array('view','id'=>$model->idproyectosespeciales));
                            
                        }
				
		}
                
                
                $sql = "select *   from proyectosespeciales_has_usergroups_user as p 
                            where p.proyectosespeciales_idproyectosespeciales='".$id."'" ;               
                $proyectosespecialesuser = Yii::app()->db->createCommand($sql)->queryAll();
                if(is_array($proyectosespecialesuser)){
                    $users=array();
                    foreach($proyectosespecialesuser as $row){
                        $users[]=$row['usergroups_user_id'];
                    }
                }else{
                    $users=null;
                }
                
                
		$this->render('update',array(
			'model'=>$model,
                        'proyectosespecialesuser'=>$users,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Proyectosespeciales');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Proyectosespeciales('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Proyectosespeciales']))
			$model->attributes=$_GET['Proyectosespeciales'];

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
		$model=Proyectosespeciales::model()->findByPk($id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='proyectosespeciales-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
