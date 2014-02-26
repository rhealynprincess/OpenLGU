<?php
/**
 * Model class for Overtime.
 *
 * @package EmployeeInformationSystem
 * @subpackage Overtime
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "overtime".
 *
 * The followings are the available columns in table 'overtime':
 * @property integer $overtime_id
 * @property integer $head_id
 * @property string $time
 * @property string $details
 * @property string $report
 * @property string $head_status
 * @property string $request_date
 *
 * The followings are the available model relations:
 * @property Employee $head
 * @property Employee[] $employees
 */
class Overtime extends CActiveRecord
{
    private $_headName = null;
    
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
     * Retrieves all Employees under this Department which is not the head.
     * @return listData list of Employees
     */
    public function getAllEmployees()
    {
        $head = Position::model()->findByAttributes(array(
            'employee_id'=>($this->head_id) ? $this->head_id : Yii::app()->user->getId()
        ));

        return CHtml::listData(
            User::model()->findAll(array(
                'join'=>'JOIN position ON user_id = position.employee_id',
                'condition'=>"status = 'ACTIVE' AND 
                    user_id != $head->employee_id AND 
                    position.department_id = $head->department_id",
                'order'=>'last_name'
            )),
            'user_id',
            'fullName'
        );
    }
    
    /**
     * Retrieves all Employees who are part of this Overtime.
     * @return listData list of Employees
     */
    public function getOvertimeEmployees()
    {
        return CHtml::listData(
            OvertimeEmployee::model()->findAll(
                array('condition'=>"overtime_id = $this->overtime_id")
            ),
            'employee_id',
            'fullName'
        );
    }
    
    /**
     * Creates a flash message containing a pending Overtime for the current month.
     *
     * An AJAX button is appended to the notice which creates a dialog box containing the details
     * of the Overtime.
     */
    public function getOvertimeNotice()
    {
        $overtime = OvertimeEmployee::model()->findAll(array(
                'condition'=>"employee_id = " . Yii::app()->user->getId() . " AND
                    head_status = 'PENDING' AND
                    extract(month FROM time) = " . date('m'),
                'with'=>'overtime',
        ));
        
        if ($overtime) {
            foreach ($overtime as $row=>$data) {
                $url =  CHtml::ajaxButton(
                    'View',
                    Yii::app()->createUrl('overtime/view', array('id'=>$data->overtime_id)),
                    array('success'=>'function(data){
                        $("#order-dialog").dialog("option", "title", "Overtime Order");
                        $("#order-dialog").html(data).dialog("open");
                    }')
                );
                echo Yii::app()->user->setFlash('notice o-' . $row, 'You have an Overtime Order. ' . $url);
            }
        }
    }
    
    /**
     * Retrieves all pending Overtimes belonging to this Department Head.
     * @return CActiveDataProvider list of Overtimes
     */
    public function getPendingOvertimes()
    {
        return new CActiveDataProvider($this, array(
            'criteria'=>array(
                'order'=>'request_date',
                'condition'=>"head_status = 'PENDING' AND head_id = " . Yii::app()->user->getId(),
            )
        ));
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
     * @return Overtime the static model class
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
        return 'overtime';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('head_id', 'numerical', 'integerOnly'=>true), 
            array('time, details', 'required'),
            array('time, details, report, head_status, request_date', 'safe'), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('overtime_id, head_id, time, details, report, head_status,
                  request_date, headName', 'safe', 'on'=>'search'), 
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
            'employees'=>array(self::HAS_MANY, 'OvertimeEmployee', 'overtime_id'), 
            //'employees'=>array(self::MANY_MANY, 'Employee', 'overtime_employee(overtime_id, employee_id)'), 
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'overtime_id'=>'Overtime ID', 
            'head_id'=>'Head', 
            'time'=>'Expected Finish Time', 
            'details'=>'Details', 
            'report'=>'Report', 
            'head_status'=>'Head Status', 
            'request_date'=>'Request Date', 
            'headName'=>'Department Head',
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
        $criteria->with = array('head.usr');

        $criteria->compare('t.overtime_id::VARCHAR', $this->overtime_id);
        $criteria->compare('head_id', $this->head_id);
        $criteria->compare('time::VARCHAR', $this->time, true);
        $criteria->compare('LOWER(details)', $this->details, true);
        $criteria->compare('LOWER(report)', $this->report, true);
        $criteria->compare('LOWER(head_status)', $this->head_status, true);
        $criteria->compare('request_date::VARCHAR', $this->request_date, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->headName, true);

        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'overtime_id'=>array(
                'asc'=>'overtime_id',
                'desc'=>'overtime_id desc',
            ),
            'headName'=>array(
                'asc'=>'usr1.last_name',
                'desc'=>'usr1.last_name desc',
            ),
            'details'=>array(
                'asc'=>'details',
                'desc'=>'details desc',
            ),
            'time'=>array(
                'asc'=>'time',
                'desc'=>'time desc',
            ),
            'request_date'=>array(
                'asc'=>'request_date',
                'desc'=>'request_date desc',
            ),
            'head_status'=>array(
                'asc'=>'head_status',
                'desc'=>'head_status desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}