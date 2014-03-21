<?php
/**
 * Controller class for the Application model.
 *
 * @package EmployeeInformationSystem
 * @subpackage Application
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class ApplicationController extends Controller
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
                'actions'=>array('delete', 'index'),
                'roles'=>array('ADMIN'),
            ),
            array('allow', 
                'actions'=>array('create', 'update'), 
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
    public function actionCreate($id)
    {
        $model = new Application;
        $position = Position::model()->findByPk($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Application'])) {
            $model->attributes = $_POST['Application'];
            $requirements = $_POST['Application']['attachments'];
            foreach ($requirements as &$requirement) {
                ($requirement[0]) ? $requirement[1] = 0 : $requirement = array(0,0);
                $requirement = implode(',', $requirement);
            }
            $model->attachment = implode(';', $requirements);
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "Job Application sent successfully.");
                $this->redirect(array('/vacancy/index'));
            }
        }

        $this->renderPartial('_form', array(
            'model'=>$model, 
            'requirements'=>$position->details,
            'id'=>$id,
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
        $position = Position::model()->findByPk($model->position_id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        if ($model->checkChair()) {
            $model->setScenario('schedule');
        }

        if (isset($_POST['Application'])) {
            $model->attributes = $_POST['Application'];
            $requirements = $_POST['Application']['attachments'];
            foreach ($requirements as &$requirement) {
                ($requirement[0]) ? null : $requirement = array(0,0);
                $requirement = implode(',', $requirement);
            }
            $model->attachment = implode(';', $requirements);
            $model->screen_date = ($model->screen_date) ? $model->screen_date : null;
            if ($model->hrmo_status == 'APPROVED') {
                $model->rejectOtherApplications();
                $oldPosition = Position::model()->findByAttributes(array('employee_id'=>$model->employee_id));
                $newPosition = Position::model()->findByAttributes(array('position_id'=>$model->position_id));
                $model->hrmo_id = Yii::app()->user->getId();
                $model->approve_date = date('m/d/Y');
                if ($oldPosition) {
                    $oldPosition->appoint($model->employee_id, null);
                }
                $newPosition->appoint(null, $model->employee_id);
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Job Application updated.');
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }

        $this->renderPartial('_form', array(
            'model'=>$model, 
            'requirements'=>$position->details,
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
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new Application('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Application'])) {
            $model->attributes=$_GET['Application'];
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
        $model = Application::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'application-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
