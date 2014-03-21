<?php
/**
 * Site controller.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */

class SiteController extends Controller
{
    /**
     * @return array action filters
     */
    public function filters()
    {
        return array(
            'accessControl', // perform access control for CRUD operations
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
                'actions'=>array('error', 'index', 'login', 'register'),
                'users'=>array('*')
            ),
            array('allow',
                'actions'=>array('head'),
                'roles'=>array('DEPARTMENT HEAD'),
            ),
            array('allow',
                'actions'=>array('hrmo'),
                'roles'=>array('HRMO'),
            ),
            array('allow',
                'actions'=>array('logout', 'profile'),
                'users'=>array('@'),
            ),
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
    
    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex()
    {
        $this->render('index');
    }
    /*
     * Render the user's profile page. Pending Overtime, Transfer,
     * and Application requests are scanned from the database.
     */
    public function actionProfile()
    {
        $this->layout = '//layouts/column2';
        $model = User::model()->findByPk(Yii::app()->user->getId());
        
        $this->render('profile', array(
            'model'=>$model,
            Overtime::model()->getOvertimeNotice(),
            Transfer::model()->getTransferNotice(),
            Application::model()->getApplicationNotice(),
        ));
    }
        
    /**
     * This is the action to handle external exceptions.
     */
    public function actionError()
    {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest) {
                echo $error['message'];
            }
            else {
                $this->render('error', $error);
            }
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact()
    {
        $model = new ContactForm;
        
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?'.base64_encode($model->name).'?=';
                $subject = '=?UTF-8?B?'.base64_encode($model->subject).'?=';
                $headers = "From: $name <{$model->email}>\r\n".
                    "Reply-To: {$model->email}\r\n".
                    "MIME-Version: 1.0\r\n".
                    "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
                Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model'=>$model));
    }

    /**
     * Renders Register page.
     */
    public function actionRegister()
    {
        $model = new User;
        $employee = new Employee;
        
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
                Yii::app()->user->setFlash('success', 'Registration complete.
                    You can access the site once your account is activated.');
                $this->redirect(array('register'));
            }
        }
        $this->render('register', array(
            'model'=>$model,
            'employee'=>$employee,
        ));
    }
    
    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate()) {
                $this->redirect(Yii::app()->homeUrl);
            }
        }
        // display the login form
        $this->render('login', array(
            'model'=>$model,
        ));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout()
    {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'register-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}