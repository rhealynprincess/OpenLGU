<?php
/**
 * Model class for Performance Evaluation.
 *
 * @package EmployeeInformationSystem
 * @subpackage Evaluation
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "performance_evaluation".
 *
 * The followings are the available columns in table 'performance_evaluation':
 * @property integer $evaluation_id
 * @property integer $employee_id
 * @property integer $head_id
 * @property string $date
 * @property string $details
 * @property integer $attachment
 *
 * The followings are the available model relations:
 * @property Employee $head
 * @property Employee $employee
 * @property Document $attachment
 */
class PerformanceEvaluation extends CActiveRecord
{
    private $_fullName = null;
    private $_headName = null;
    
    /**
     * get and set constructors for retrieving full name of Employee.
     * @return string full name of Employee
     */
    public function getFullName()
    {
        if ($this->_fullName === null && $this->employee !== null) {
            $this->_fullName = $this->employee->fullName;
        }
        return $this->_fullName;
    }
    public function setFullName($value)
    {
        $this->_fullName = $value;
    }
    
    /**
     * get and set constructors for retrieving full name of Department Head.
     * @return string full name of Department Head
     */
    public function getHeadName()
    {
        if ($this->_headName === null && $this->head !== null) {
            $this->_headName = $this->head->fullName;
        }
        return $this->_headName;
    }
    public function setHeadName($value)
    {
        $this->_headName = $value;
    }
    
    /**
     * Retrieves all Performance Evaluations under this Department.
     * @return CActiveDataProvider list of Performance Evaluations
     */
    public function getPerformanceEvaluations()
    {
        $position = Position::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));
        $id = $position->department->department_id;
        
        return new CActiveDataProvider($this, array(
            'criteria'=>array(
                'order'=>'date',
                'with'=>array('employee.position'),
                'condition'=>"position.department_id = $id",
            )
        ));
    }
    
    /**
     * Retrieves all Documents belonging to this Employee.
     * @return listData list of Documents
     */
    public function getAttachments()
    {
        $id = ($this->employee_id) ? $this->employee_id : Yii::app()->user->getId();
        
        return CHtml::listData(
            Document::model()->findAll(array(
                'condition'=>"owner_id = $id",
                'order'=>'filename'
            )),
            'document_id',
            'filename'
        );
    }
    
    /**
     * Attaches AuditTrail logging to the current model.
     * @return array AuditTrail behavior
     */
    public function behaviors() 
    {
        return array(
            'LoggableBehavior'=>'application.modules.auditTrail.behaviors.LoggableBehavior',
        ); 
    }
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PerformanceEvaluation the static model class
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
        return 'performance_evaluation';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee_id, head_id, attachment', 'numerical', 'integerOnly'=>true), 
            array('date, attachment', 'required'),
            array('date, details', 'safe'), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('evaluation_id, employee_id, head_id, date, details, attachment,
                  fullName, headName', 'safe', 'on'=>'search'), 
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
            'head'=>array(self::BELONGS_TO, 'Employee', 'head_id'), 
            'employee'=>array(self::BELONGS_TO, 'Employee', 'employee_id'), 
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'evaluation_id'=>'Evaluation', 
            'employee_id'=>'Employee', 
            'head_id'=>'Head', 
            'date'=>'Date', 
            'details'=>'Details', 
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

        $criteria = new CDbCriteria;
        $criteria->with = array('employee.usr', 'head.usr'=>array('alias'=>'usr1'));

        $criteria->compare('evaluation_id::VARCHAR', $this->evaluation_id);
        $criteria->compare('employee_id::VARCHAR', $this->employee_id);
        $criteria->compare('head_id::VARCHAR', $this->head_id);
        $criteria->compare('date::VARCHAR', $this->date, true);
        $criteria->compare('LOWER(details)', $this->details, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare("LOWER(usr1.first_name || ' ' || usr1.middle_name || ' ' || usr1.last_name)",
                           $this->headName, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria, 
        ));
    }
}