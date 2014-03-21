<?php
/**
 * Model class for Resign.
 *
 * @package EmployeeInformationSystem
 * @subpackage Resign
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */

/**
 * This is the model class for table "resign".
 *
 * The followings are the available columns in table 'resign':
 * @property integer $resign_id
 * @property integer $employee_id
 * @property integer $head_id
 * @property integer $hrmo_id
 * @property string $details
 * @property string $head_status
 * @property string $hrmo_status
 * @property string $request_date
 * @property string $approve_date
 * @property integer $attachment
 *
 * The followings are the available model relations:
 * @property Employee $employee
 * @property Employee $head
 * @property Employee $hrmo
 */
class Resign extends CActiveRecord
{
    private $_fullName = null;
    private $_headName = null;
    private $_hrmoName = null;

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
     * get and set constructors for retrieving full name of HRMO.
     * @return string full name of HRMO
     */
    public function getHrmoName()
    {
        if ($this->_hrmoName === null && $this->hrmo !== null) {
            $this->_hrmoName = $this->hrmo->fullName;
        }
        return $this->_hrmoName;
    }
    public function setHrmoName($value)
    {
        $this->_hrmoName = $value;
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
     * Retrieves all Resignations pending from Department Head.
     * @return CActiveDataProvider list of Resignations
     */
    public function getPendingHeadResignations()
    {
        $position = Position::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));
        $id = $position->department->department_id;
        
        return new CActiveDataProvider($this, array(
            'criteria'=>array(
                'order'=>'request_date',
                'with'=>array('employee.position'),
                'condition'=>"head_status = 'PENDING' AND position.department_id = $id",
            )
        ));
    }
    
    /**
     * Retrieves all Resignations approved by Department Head but pending from HRMO.
     * @return CActiveDataProvider list of Resignations
     */
    public function getPendingHrmoResignations()
    {
        $position = Position::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));
        $id = $position->department->department_id;
        
        return new CActiveDataProvider($this, array(
            'criteria'=>array(
                'order'=>'request_date',
                'with'=>array('employee.position'),
                'condition'=>"head_status = 'APPROVED' AND
                    hrmo_status = 'PENDING' AND 
                    position.department_id = $id",
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
     * @return Resign the static model class
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
        return 'resign';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee_id, head_id, hrmo_id, attachment', 'numerical', 'integerOnly'=>true), 
            array('details', 'required'),
            array('attachment', 'required', 'on'=>'create'),
            array('details, head_status, hrmo_status, request_date, approve_date', 'safe'), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('resign_id, employee_id, head_id, hrmo_id, details, head_status, hrmo_status, 
                  request_date, approve_date, attachment, fullName, headName, hrmoName', 'safe', 'on'=>'search'), 
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
            'head'=>array(self::BELONGS_TO, 'Employee', 'head_id'), 
            'hrmo'=>array(self::BELONGS_TO, 'Employee', 'hrmo_id'), 
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'resign_id'=>'Resign ID', 
            'employee_id'=>'Employee', 
            'head_id'=>'Head', 
            'hrmo_id'=>'Hrmo', 
            'details'=>'Details', 
            'head_status'=>'Head Status', 
            'hrmo_status'=>'HRMO Status', 
            'request_date'=>'Request Date', 
            'approve_date'=>'Approve Date', 
            'fullName'=>'Employee Name',
            'headName'=>'Department Head',
            'hrmoName'=>'HRMO',
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
        $criteria->with = array(
            'employee.usr',
            'head.usr'=>array('alias'=>'usr1'),
            'hrmo.usr'=>array('alias'=>'usr2')
        );

        $criteria->compare('resign_id::VARCHAR', $this->resign_id);
        $criteria->compare('employee_id::VARCHAR', $this->employee_id);
        $criteria->compare('head_id::VARCHAR', $this->head_id);
        $criteria->compare('hrmo_id::VARCHAR', $this->hrmo_id);
        $criteria->compare('LOWER(details)', $this->details, true);
        $criteria->compare('LOWER(head_status)', $this->head_status, true);
        $criteria->compare('LOWER(hrmo_status)', $this->hrmo_status, true);
        $criteria->compare('request_date::VARCHAR', $this->request_date, true);
        $criteria->compare('approve_date::VARCHAR', $this->approve_date, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare("LOWER(usr1.first_name || ' ' || usr1.middle_name || ' ' || usr1.last_name)",
                           $this->headName, true);
        $criteria->compare("LOWER(usr2.first_name || ' ' || usr2.middle_name || ' ' || usr2.last_name)",
                           $this->hrmoName, true);

        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'resign_id'=>array(
                'asc'=>'resign_id',
                'desc'=>'resign_id desc',
            ),
            'fullName'=>array(
                'asc'=>'usr.last_name',
                'desc'=>'usr.last_name desc',
            ),
            'request_date'=>array(
                'asc'=>'request_date',
                'desc'=>'request_date desc',
            ),
            'approve_date'=>array(
                'asc'=>'approve_date',
                'desc'=>'approve_date desc',
            ),
            'head_status'=>array(
                'asc'=>'head_status',
                'desc'=>'head_status desc',
            ),
            'hrmo_status'=>array(
                'asc'=>'hrmo_status',
                'desc'=>'hrmo_status desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}