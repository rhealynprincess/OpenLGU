<?php
/**
 * Controller class which renders the Job Vacancy page.
 *
 * @package EmployeeInformationSystem
 * @subpackage Vacancy
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
class VacancyController extends Controller
{
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
     * Manages all models.
     */
    public function actionIndex()
    {
        $dataProvider = new CActiveDataProvider('Position', array(
            'criteria'=>array(
                'order'=>'vacancy_date desc',
                'condition'=>"employee_id IS NULL",
            ),
            'pagination'=>array(
                'pageSize'=>50,
            ),
        ));
        
        $this->render('index', array(
            'dataProvider'=>$dataProvider
        ));
    }

    /**
     * Views a particular model.
     * @params integer $id the ID of the model to be viewed
     */
    public function actionView($id)
    {
        $model = Position::model()->findByPk($id);
        if (!PersonnelSelectionBoard::model()->checkViewPermission($model)) {
            $this->redirect(array('index'));
        }
        
        $this->render('view', array(
            'model'=>$model,
            'application'=>Application::model(),
        ));
    }
}