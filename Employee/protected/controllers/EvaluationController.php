<?php
/**
 * Controller for the the Evaluation model.
 *
 * @package EmployeeInformationSystem
 * @subpackage Evaluation
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class EvaluationController extends Controller
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
                'actions'=>array('upload'),
                'roles'=>array('APPLICANT'),
            ),
            array('allow',
                'actions'=>array('upload'),
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
    public function actionUpload()
    {
        $model = new PerformanceEvaluation;
        $position = Position::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        if (!$position) {
            Yii::app()->user->setFlash('error', 'You don\'t have a Position.');
        }
        if (isset($_POST['PerformanceEvaluation'])) {
            $model->attributes = $_POST['PerformanceEvaluation'];
            $model->head_id = ($position->department->head) ? $position->department->head->employee_id : null;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Performance Evaluation sent successfully.');
                $this->redirect(array('site/profile'));
            }
        }
        $this->render('upload', array(
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

        if (isset($_POST['PerformanceEvaluation'])) {
            $model->attributes = $_POST['PerformanceEvaluation'];
            $model->head_id = Yii::app()->user->getId();
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Performance Evaluation updated.');
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
        $model = new PerformanceEvaluation('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['PerformanceEvaluation'])) {
            $model->attributes = $_GET['PerformanceEvaluation'];
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
        $model = PerformanceEvaluation::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'evaluation-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
