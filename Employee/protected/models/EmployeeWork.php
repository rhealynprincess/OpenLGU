<?php
/**
 * Model class for Employee Work.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "employee_work".
 *
 * The followings are the available columns in table 'employee_work':
 * @property integer $work_id
 * @property integer $employee_id
 * @property string $position_title
 * @property string $company_name
 * @property string $from_date
 * @property string $to_date
 * @property integer $monthly_salary
 * @property string $salary_grade
 * @property string $appointment_status
 * @property string $goverment_service
 * @property string $attachment
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class EmployeeWork extends CActiveRecord
{
    public $attachment = null;
    public $government = array(
        'YES'=>'YES',
        'NO'=>'NO',
    );
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployeeWork the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName()
    {
        return 'employee_work';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('position_title, company_name, from_date, to_date', 'required'),
            array('from_date, to_date', 'default', 'setOnEmpty'=>true, 'value'=>NULL),
            array('monthly_salary', 'numerical', 'integerOnly'=>true),
            array('position_title, company_name, from_date, to_date, salary_grade,
                  appointment_status, goverment_service, attachment', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('position_title, company_name, from_date, to_date, monthly_salary, salary_grade,
                  appointment_status, goverment_service, attachment', 'safe', 'on'=>'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'employee'=>array(self::BELONGS_TO, 'Employee', 'employee_id'),
            'documents'=>array(self::HAS_MANY, 'Document', 'owner_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'position_title'=>'Position Title',
            'company_name'=>'Company Name',
            'from_date'=>'From Date',
            'to_date'=>'To Date',
            'monthly_salary'=>'Monthly Salary',
            'salary_grade'=>'Salary Grade',
            'appointment_status'=>'Appointment Status',
            'goverment_service'=>'Goverment Service',
            'attachment'=>'Attachment',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search()
    {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('position_title', $this->position_title, true);
        $criteria->compare('company_name', $this->company_name, true);
        $criteria->compare('from_date', $this->from_date, true);
        $criteria->compare('to_date', $this->to_date, true);
        $criteria->compare('monthly_salary', $this->monthly_salary);
        $criteria->compare('salary_grade', $this->salary_grade, true);
        $criteria->compare('appointment_status', $this->appointment_status, true);
        $criteria->compare('goverment_service', $this->goverment_service, true);
        $criteria->compare('attachment', $this->attachment, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}