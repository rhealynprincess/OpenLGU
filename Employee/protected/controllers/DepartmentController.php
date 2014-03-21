<?php
/**
 * Controller class for the Department model.
 *
 * @package EmployeeInformationSystem
 * @subpackage Department
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class DepartmentController extends Controller
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
                'actions'=>array('view'),
                'roles'=>array('HRMO'),
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
        $model = new Department;

        // Uncomment the following line if   validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Department'])) {
            $model->attributes = $_POST['Department'];
            $model->name = strtoupper($_POST['Department']['name']);
            if ($model->save()) {
                $this->redirect(array('update', 'id'=>$model->department_id));
            }
        }
        $this->renderPartial('_form', array(
            'model'=>$model,
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
        $oldHead = ($model->head_id) ? Position::model()->findByPk($model->head_id) : null;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['Department'])) {
            $model->attributes = $_POST['Department'];
            $model->name = strtoupper($_POST['Department']['name']);
            if ($model->save()) {
                if ($oldHead && $oldHead->position_id != $model->head_id) {
                    $oldHead->role = 'USER';
                    $oldHead->save();
                    if ($oldHead->employee) {
                        $oldHead->employee->usr->role = $oldHead->role;
                        $oldHead->employee->usr->save();
                    }
                }
                if ($model->head_id) {
                    $newHead = Position::model()->findByPk($model->head_id);
                    $newHead->role = 'DEPARTMENT HEAD';
                    $newHead->save();
                    $newHead->employee->usr->role = $newHead->role;
                    $newHead->employee->usr->save();
                }
                $this->redirect(array('/department'));
            }
        }
        $this->render('update', array(
            'model'=>$model,
            'id'=>$id,
        ));
    }

    /**
     * Views a particular model.
     * @param integer $id the ID of the model to be viewed
     */
    public function actionView($id)
    {
        $model = $this->loadModel($id);

        $this->renderPartial('update', array(
            'model'=>$model,
            'view'=>true,
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
        $model = new Department('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Department'])) {
            $model->attributes = $_GET['Department'];
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
        $model = Department::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'department-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
