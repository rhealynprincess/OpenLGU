<?php

class AdminController extends Controller
{
	public $defaultAction = "admin";
	public $layout='//layouts/column1';
    
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
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
            array('allow',
                'roles'=>array('ADMIN'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
    
	public function actionAdmin()
	{
		$model=new AuditTrail('search');
		$model->unsetAttributes();	// clear any default values
		if(isset($_GET['AuditTrail'])) {
			$model->attributes=$_GET['AuditTrail'];
		}
		$this->render('admin',array(
			'model'=>$model,
		));
	}
}