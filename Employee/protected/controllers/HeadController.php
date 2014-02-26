<?php
/**
 * Controller class which renders the Department Head page.
 *
 * @package EmployeeInformationSystem
 * @subpackage DepartmentHead
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class HeadController extends Controller
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
                'roles'=>array('DEPARTMENT HEAD'),
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
        $position = Position::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));
        $department = Department::model()->findByAttributes(array('head_id'=>$position->position_id));
        
        $this->render('index', array(
            'model'=>$department,
        ));
    }
    
    /**
     * Lists all Pending Evaluations.
     */
    public function actionEvaluation()
    {
        $this->render('evaluation', array(
            'model'=>PerformanceEvaluation::model(),
        ));
    }

    /**
     * Lists all Pending Leaves.
     */
    public function actionLeave()
    {
        $this->render('leave', array(
            'model'=>Leave::model(),
        ));
    }

    /**
     * Lists all Pending Overtimes.
     */
    public function actionOvertime()
    {
        $this->render('overtime', array(
            'model'=>Overtime::model(),
        ));
    }

    /**
     * Lists all Pending Resignations.
     */
    public function actionResign()
    {
        $this->render('resign', array(
            'model'=>Resign::model(),
        ));
    }
}