<?php
/**
 * Controller class for the Transfer model.
 *
 * @package EmployeeInformationSystem
 * @subpackage Transfer
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class TransferController extends Controller
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
                'actions'=>array('request'),
                'roles'=>array('DEPARTMENT HEAD'),
            ),
            array('allow',
                'actions'=>array('update'),
                'roles'=>array('HRMO', 'USER'),
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
        $model = new Transfer;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);
        
        if (isset($_POST['Transfer'])) {
            $model->attributes = $_POST['Transfer'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Transfer Order sent successfully.');
                $this->redirect(array('request'));
            }
        }
        $this->render('request', array(
            'model'=>$model,
            'view'=>null,
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
        $oldAdmin = $model->admin_id;

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['Transfer'])) {
            $model->attributes = $_POST['Transfer'];
            if ($model->emp_status != "PENDING") {
                $model->approve_date = date('m/d/Y');
            }
            if ($model->admin_status != "PENDING") {
                if (!$oldAdmin) {
                    $model->admin_id = Yii::app()->user->getId();
                }
            }
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Transfer Order updated.');
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }
        $this->renderPartial('_form', array(
            'model'=>$model,
            'view'=>(isset($_GET['view'])) ? $_GET['view'] : null,
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
        $model = new Transfer('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Transfer'])) {
            $model->attributes = $_GET['Transfer'];
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
        $model = Transfer::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'transfer-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
