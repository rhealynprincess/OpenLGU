<?php
/**
 * Controller class for the User model.
 *
 * @package EmployeeInformationSystem
 * @subpackage User
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class UserController extends Controller
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
                'roles'=>array('ADMIN'),
            ),
            array('allow',
                'actions'=>array('account'),
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
    public function actionCreate()
    {
        $model = new User;
        $employee = new Employee;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->first_name = strtoupper($_POST['User']['first_name']);
            $model->middle_name = strtoupper($_POST['User']['middle_name']);
            $model->last_name = strtoupper($_POST['User']['last_name']);
            $model->password = $model->hashPassword($model->newPassword);
            if ($model->save()) {
                $employee->employee_id = $model->user_id;
                $employee->sex = $_POST['Employee']['sex'];
                $employee->save();
                $this->redirect(array('/user'));
            }
        }
        $this->renderPartial('_form', array(
            'model'=>$model,
            'employee'=>$employee,
        ), false, true);
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
         $this->performAjaxValidation($model);
         
        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            $model->first_name = strtoupper($_POST['User']['first_name']);
            $model->middle_name = strtoupper($_POST['User']['middle_name']);
            $model->last_name = strtoupper($_POST['User']['last_name']);
            if ($model->newPassword) {
                $model->password = $model->hashPassword($model->newPassword);
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Pending Account updated.");
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
     * Manages all models.
     */
    public function actionIndex()
    {
        $model = new User('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['User'])) {
            $model->attributes = $_GET['User'];
        }
        $this->render('index', array(
            'model'=>$model,
        ));
    }

    /**
     * Updates email if specified. Updates password if password validation succeeds.
     */
    public function actionAccount()
    {
        $model = $this->loadModel(Yii::app()->user->getId());
        $model->setScenario('changePassword');
        
        $this->performAjaxValidation($model);

        if (isset($_POST['User'])) {
            $model->attributes = $_POST['User'];
            if ($model->newPassword != '') {
                if ($model->password === $model->hashPassword($model->oldPassword)) {
                    $model->password = $model->hashPassword($model->newPassword);
                    $model->save();
                    Yii::app()->user->setFlash('success password', 'Password updated successfully.');
                }
                else {
                    Yii::app()->user->setFlash('error', 'Wrong password.');
                }
            }
            if ($model->newEmail != '') {
                $model->email = $model->newEmail;
                $model->save();
                Yii::app()->user->setFlash('success email', 'Email updated successfully.');
            }
            $this->redirect(array('account'));
        }
        $this->render('account', array(
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
        $model = User::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'user-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}