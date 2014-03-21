<?php
/**
 * Controller class for the Employee model.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class EmployeeController extends Controller
{
    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';
    private $form = array(
        '_personalForm',
        '_familyForm',
        '_educationForm',
        '_cseForm',
        '_workForm',
        '_volWorkForm',
        '_trainingForm',
        '_otherForm',
        '_childForm',
    );
    
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
            array('deny',
                'actions'=>array('delete', 'index'),
                'roles'=>array('APPLICANT', 'DEPARTMENT HEAD', 'HRMO', 'USER'),
            ),
            array('allow',
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
     * @params integer $id the ID of the model
     * @params integer $cat the active tab in the view
     */
    public function actionCreate($id, $cat)
    {
        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        if (!empty($_POST)) {
            $data = array_shift($_POST);
            foreach ($data as &$val) {
                $val = strtoupper($val);
            }
            switch ($cat) {
                case 2 : $model = new EmployeeEducation; break;
                case 3 : $model = new EmployeeEligibility; break;
                case 4 : $model = new EmployeeWork; break;
                case 5 : $model = new EmployeeVolWork; break;
                case 6 : $model = new EmployeeTraining; break;
                case 8 : $model = new EmployeeChild; $cat = 1; break;
                default: break;
            }
            $model->attributes = $data;
            $model->employee_id = $id;
            if ($model->save()) {
                if ($id != Yii::app()->user->getId()) {
                    $url = array('view', 'id'=>$id, 'cat'=>$cat);
                }
                else {
                    $url = array('view', 'cat'=>$cat);
                }
                $this->redirect($url);
            }
        }
        $this->renderPartial($this->form[$cat], array(
            'id'=>$id,
            'model'=>$this->loadModel($id)
        ), false, true);
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id'] != Yii::app()->user->getId() &&
                (Yii::app()->user->checkAccess('ADMIN') || 
                 Yii::app()->user->checkAccess('HRMO'))) {
                $id = $_GET['id'];
            }
            else {
                $this->redirect(Yii::app()->createUrl('employee/view',
                    isset($_GET['cat']) ? array('cat'=>$_GET['cat']) : array()
                ));
            }
        }
        else {
            $id = Yii::app()->user->getId();
        }        
        $this->render('view', array(
            'id'=>$id,
        ));
    }
    
    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     * @param integer $cat the active tab in the view
     */
    public function actionUpdate($id, $cat)
    {
        $model = $this->loadModel($id);
        
        if (!Yii::app()->request->isAjaxRequest && empty($_POST)) {
            $this->redirect(Yii::app()->createUrl('employee/view'));
        }        
        switch ($cat) {
            case 0 : $model->setScenario('updatePersonal'); break;
            case 1 : $model->setScenario('updateFamily'); break;
            default: break;
        }

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (!empty($_POST)) {
            $data = array_shift($_POST);
            $row = isset($_GET['row']) ? $_GET['row'] : null;
            foreach ($data as &$val) {
                $val = strtoupper($val);
            }
            switch ($cat) {
                case 2 : $model = EmployeeEducation::model()->findByPk($row); break;
                case 3 : $model = EmployeeEligibility::model()->findByPk($row); break;
                case 4 : $model = EmployeeWork::model()->findByPk($row); break;
                case 5 : $model = EmployeeVolWork::model()->findByPk($row); break;
                case 6 : $model = EmployeeTraining::model()->findByPk($row); break;
                case 8 : $model = EmployeeChild::model()->findByPk($row); $cat = 1; break;
                default: break;
            }
            $model->attributes = $data;
            if ($model->save()) {
                $this->redirect(array('view', 'id'=>$id, 'cat'=>$cat));
            }
        }        
        $this->renderPartial($this->form[$cat], array(
            'model'=>$model,
            'id'=>$id,
        ), false, true);
    }
    
    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     * @param integer $cat the active tab in the view
     */
    public function actionDelete($row, $cat)
    {
        switch ($cat) {
            case 2 : $model = EmployeeEducation::model()->findByPk($row); break;
            case 3 : $model = EmployeeEligibility::model()->findByPk($row); break;
            case 4 : $model = EmployeeWork::model()->findByPk($row); break;
            case 5 : $model = EmployeeVolWork::model()->findByPk($row); break;
            case 6 : $model = EmployeeTraining::model()->findByPk($row); break;
            case 8 : $model = EmployeeChild::model()->findByPk($row); break;
            default: break;
        }
        
        $model->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
        }
    }
    
    /**
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new Employee('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Employee'])) {
            $model->attributes = $_GET['Employee'];
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
        $model = Employee::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404,'The requested page does not exist.');
        }
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'employee-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}