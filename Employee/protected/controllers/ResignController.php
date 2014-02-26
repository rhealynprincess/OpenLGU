<?php
/**
 * Controller class for the Resign model.
 *
 * @package EmployeeInformationSystem
 * @subpackage Resign
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class ResignController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

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
                'actions'=>array('delete', 'index', 'update'),
                'roles'=>array('ADMIN'),
            ),
            array('allow',
                'actions'=>array('update'),
                'roles'=>array('DEPARTMENT HEAD', 'HRMO'),
            ),
            array('deny',
                'actions'=>array('request'),
                'roles'=>array('APPLICANT'),
            ),
            array('allow',
                'actions'=>array('request'),
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
    
    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionRequest()
    {
        $model = new Resign('create');
        $position = Position::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));
        $resign = Resign::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        if (!$position) {
            Yii::app()->user->setFlash('error', 'You don\'t have a Position.');
        }
        else if ($resign) {
            if ($resign->hrmo_status == 'APPROVED') {
                Yii::app()->user->setFlash('error', 'Your Resignation Request has been approved.');
            }
            else if ($resign->hrmo_status == 'PENDING') {
                Yii::app()->user->setFlash('error', 'You already have a pending Resignation Request.');
            }
        }
        if (isset($_POST['Resign'])) {
            $model->attributes = $_POST['Resign'];
            $model->head_id = ($position->department->head) ? $position->department->head->employee_id : null;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Resignation Request sent successfully.');
                $this->redirect(array('site/profile'));
            }
        }
        $this->render('request', array(
            'model'=>$model, 
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Resign'])) {
            $model->attributes = $_POST['Resign'];
            if ($model->head_status != "PENDING") {
                $model->head_id = Yii::app()->user->getId();
                if ($model->hrmo_status != "PENDING") {
                    $model->hrmo_id = Yii::app()->user->getId();
                    $model->approve_date = date('m/d/Y');
                }
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Resignation Request updated.');
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }
        $this->renderPartial('_form', array(
            'model'=>$model,
        ), false, true);
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
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Resign('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Resign'])) {
            $model->attributes = $_GET['Resign'];
        }
        $this->render('index', array(
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
        $model = Resign::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'resign-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
