<?php
/**
 * Controller class which renders the Human Resource Management Officer page.
 *
 * @package EmployeeInformationSystem
 * @subpackage HRMO
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class HrmoController extends Controller
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
                'roles'=>array('HRMO'),
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
            //Application::model()->getFinalApplications(),
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
     * Render Department Overview
     */
    public function actionDepartment()
    {
        $model = new Department('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Department'])) {
            $model->attributes = $_GET['Department'];
        }
        $this->render('department', array(
            'model'=>$model,
        ));
    }
    
    /**
     * Render Employee Overview
     */
    public function actionEmployee()
    {
        $model = new Employee('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Employee'])) {
            $model->attributes = $_GET['Employee'];
        }
        $this->render('employee', array(
            'model'=>$model,
        ));
    }
    
    /**
     * Render Position Overview
     */
    public function actionPosition()
    {
        $model = new Position('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Position'])) {
            $model->attributes = $_GET['Position'];
        }
        $this->render('position', array(
            'model'=>$model,
        ));
    }

    /**
     * Lists all Pending Applications.
     */
    public function actionApplication()
    {
        $this->render('application', array(
            'model'=>Application::model(),
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