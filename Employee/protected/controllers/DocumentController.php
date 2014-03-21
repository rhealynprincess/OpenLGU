<?php
/**
 * Controller class for the Document model.
 *
 * @package EmployeeInformationSystem
 * @subpackage Document
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class DocumentController extends Controller
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
            'postOnly + delete, download', // we only allow deletion via POST request
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
                'roles'=>array('APPLICANT', 'DIVISION HEAD', 'HRMO', 'USER'),
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
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView()
    {
        $model = isset($_GET['id']) ? $this->loadModel($_GET['id']) : new Document;
        
        // Uncomment the following line if AJAX validation is needed
        //$this->performAjaxValidation($model);
        
        if (isset($_POST['Document'])) {
            $model->setScenario('update');
            $model->attributes = $_POST['Document'];
            $model->filename = CUploadedFile::getInstance($model, 'filename');
            $model->last_modified = date('Y-m-d H:i:s');
            if ($model->save()) {
                Yii::app()->user->setFlash('success', "File uploaded successfully.");
                $folder = Yii::app()->basePath . '/../documents/' . $model->owner_id . '/';
                (!is_dir($folder)) ? mkdir($folder) : null;
                $model->filename->saveAs($folder . $model->filename);
                $this->redirect(array('view'));
            }
        }
        $this->render('view',array(
            'model'=>$model,
        ));
    }
    
    /**
     * Downloads a document.
     * Downloads a document by combining the user_id and the filename.
     * @param integer $id the ID of the model to be downloaded
     */
    public function actionDownload($id)
    {
        $model = $this->loadModel($id);
        $file = YiiBase::getPathOfAlias('webroot') . "/documents/$model->owner_id/$model->filename";
        
        if (file_exists($file)) {
            return Yii::app()->getRequest()->sendFile($model->filename, @file_get_contents($file));
        }
        else {
            echo "FILE NOT FOUND: $file";
        }
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        $model = Document::model()->findByPk($id);
        
        unlink(Yii::app()->basePath . '/../documents/' . $model->owner_id . '/' . $model->filename);
        $model->delete();

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
        $model = new Document('search');
        
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Document'])) {
            $model->attributes = $_GET['Document'];
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
        $model = Document::model()->findByPk($id);
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
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'document-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
