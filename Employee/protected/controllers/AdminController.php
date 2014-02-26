<?php
/**
 * Controller which renders the Administrator page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Admin
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class AdminController extends Controller
{
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
            array('deny',
                'users'=>array('*'),
            ),
        );
    }
    
    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $this->render('index', array(
            User::model()->getPendingAccounts(),
            Transfer::model()->getTransferUpdateNotice(),
        ));
    }
    
    /**
     * Renders list of current PSB members.
     */
    public function actionPsb()
    {
        $model = PersonnelSelectionBoard::model()->findByPk(1);
        
        if (isset($_POST['PersonnelSelectionBoard'])) {
            $model->attributes = $_POST['PersonnelSelectionBoard'];
            $model->last_modified = date('m/d/Y');
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Personnel Selection Board updated.');
                $this->redirect(Yii::app()->request->urlReferrer);
            }
        }
        
        $this->render('psb', array(
            'model'=>$model,
        ));
    }
}