<?php
/**
 * Model class for Leave.
 *
 * @package EmployeeInformationSystem
 * @subpackage Leave
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "leave".
 *
 * The followings are the available columns in table 'leave':
 * @property integer $leave_id
 * @property integer $employee_id
 * @property integer $head_id
 * @property string $date_from
 * @property string $date_to
 * @property integer $days
 * @property string $commutation
 * @property integer $leave_type
 * @property string $leave_option
 * @property string $details
 * @property string $head_status
 * @property string $head_details
 * @property integer $days_with_pay
 * @property integer $days_without_pay
 * @property string $request_date
 * @property string $approve_date
 * @property string $attachment
 *
 * The followings are the available model relations:
 * @property Employee $employee
 * @property LeaveType $leaveType
 */
class Leave extends CActiveRecord
{
    public $vacation = array(
        'WITHIN THE PHILIPPINES'=>'WITHIN THE PHILIPPINES',
        'ABROAD'=>'ABROAD',
    );
    public $sick = array(
        'OUT PATIENT'=>'OUT PATIENT',
        'IN HOSPITAL'=>'IN HOSPITAL',
    );
    public $commutationList = array(
        'NOT REQUESTED'=>'NOT REQUESTED',
        'REQUESTED'=>'REQUESTED',
    );
    
    private $_fullName = null;
    private $_headName = null;
    private $_leaveName = null;
    
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
     * get and set constructors for retrieving type of Leave.
     * @return string type of Leave
     */
    public function getLeaveName()
    {
        if ($this->_leaveName === null && $this->leaveType !== null) {
            $this->_leaveName = $this->leaveType->name;
        }
        return $this->_leaveName;
    }
    public function setLeaveName($value)
    {
        $this->_leaveName = $value;
    }
    
    /**
     * Retrieves all Leave Types.
     * @return listData list of Leave Types
     */
    public function getLeaveTypes()
    {
        return CHtml::listData(
            LeaveType::model()->findAll(array('order'=>'leave_type_id')),
            'leave_type_id',
            'name'
        );
    }
    
    /**
     * Retrieves Leave credits for vacation and sick leaves.
     *
     * The two child select statements select all approved leaves of the employee for the current year.
     * The sums of each leave are computed and subtracted from the annual leave credits
     * for vacation and sick leaves, which is 15 days each.
     * @return array leave credits for vacation and sick leave
     */
    public function getLeaveCredits()
    {
        $sql = "
            SELECT
                vacation,
                sick
            FROM (
                SELECT 15 - coalesce(sum(days), 0) AS vacation FROM leave
                WHERE
                    leave_type = 1 AND
                    head_status = 'APPROVED' AND
                    employee_id = $this->employee_id AND
                    extract(year FROM request_date) = " . date('Y', strtotime($this->request_date)) . "
            ) AS v, (
                SELECT 15 - coalesce(sum(days), 0) AS sick FROM leave
                WHERE
                    leave_type = 2 AND
                    head_status = 'APPROVED' AND
                    employee_id = $this->employee_id AND
                    extract(year FROM request_date) = " . date('Y', strtotime($this->request_date)) . "
            ) AS s";
        $credits = Yii::app()->db->createCommand($sql)->queryRow();
        return $credits;
    }
    
    /**
     * Retrieves the Department Head or the User who approved this leave.
     * @return listData list of Department Head and User
     */
    public function getHead()
    {
        $head = ($this->head_id) ? $this->head_id : 0;
        
        return CHtml::listData(
            Employee::model()->findAll(array(
                'condition'=>"t.employee_id = $head OR
                    (department_id = {$this->employee->position->department_id} AND position.role ='DEPARTMENT HEAD')",
                'with'=>array('position', 'usr'),
                'order'=>'last_name'
            )),
            'employee_id',
            'fullName'
        );
    }
    
    /**
     * Retrieves all pending Leaves under this Department.
     * @return CActiveDataProvider list of Positions
     */
    public function getPendingLeaves()
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
     * Retrieves all approved/rejected Leaves belonging to this Employee.
     * @return CActiveDataProvider list of Leaves
     */
    public function getApprovedLeaves()
    {
        $id = Yii::app()->user->getId();
        
        return new CActiveDataProvider($this, array(
                'criteria'=>array(
                    'order'=>'request_date',
                    'condition'=>"head_status != 'PENDING' AND
                        employee_id = $id AND
                        extract(year FROM request_date) = " . date('Y'),
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
     * @return Leave the static model class
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
        return 'leave';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee_id, head_id, leave_type, days', 'numerical', 'integerOnly'=>true, 'min'=>1),
            array('days_with_pay, days_without_pay', 'numerical', 'integerOnly'=>true, 'min'=>0),
            array('date_from, date_to, details', 'required'),
            array('head_id, commutation, leave_option, date_from, date_to, days, details,
                  head_status, head_details, request_date, approve_date, attachment', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('leave_id, employee_id, head_id, leave_type, date_from, date_to, days, commutation, leave_option,
                  details, head_status, head_details, days_with_pay, days_without_pay, request_date, approve_date,
                  attachment, fullName, headName, leaveName', 'safe', 'on'=>'search'),
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
            'leaveType'=>array(self::BELONGS_TO, 'LeaveType', 'leave_type'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'leave_id'=>'Leave ID',
            'employee_id'=>'Employee Name',
            'head_id'=>'Department Head',
            'date_from'=>'Date From',
            'date_to'=>'Date To',
            'days'=>'Days',
            'commutation'=>'Commutation',
            'leave_type'=>'Leave Type',
            'leave_option'=>'Leave Option',
            'details'=>'Details',
            'head_status'=>'Head Status',
            'head_details'=>'Head Details',
            'request_date'=>'Request Date',
            'approve_date'=>'Approve Date',
            'attachment'=>'Attachment',
            'fullName'=>'Employee Name',
            'headName'=>'Department Head',
            'leaveName'=>'Leave Type',
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
        $criteria->with = array('employee.usr', 'head.usr'=>array('alias'=>'usr1'), 'leaveType');

        $criteria->compare('leave_id::VARCHAR', $this->leave_id);
        $criteria->compare('employee_id::VARCHAR', $this->employee_id);
        $criteria->compare('head_id::VARCHAR', $this->head_id);
        $criteria->compare('date_from::VARCHAR', $this->date_from, true);
        $criteria->compare('date_to::VARCHAR', $this->date_to, true);
        $criteria->compare('days::VARCHAR', $this->days);
        $criteria->compare('leave_type', $this->leave_type);
        $criteria->compare('leave_option', $this->leave_option, true);
        $criteria->compare('details', $this->details, true);
        $criteria->compare('LOWER(head_status)', $this->head_status, true);
        $criteria->compare('LOWER(head_details)', $this->head_details, true);
        $criteria->compare('days_with_pay::VARCHAR', $this->days_with_pay, true);
        $criteria->compare('days_without_pay::VARCHAR', $this->days_without_pay, true);
        $criteria->compare('request_date::VARCHAR', $this->request_date, true);
        $criteria->compare('approve_date::VARCHAR', $this->approve_date, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare("LOWER(usr1.first_name || ' ' || usr1.middle_name || ' ' || usr1.last_name)",
                           $this->headName, true);
        $criteria->compare('LOWER("leaveType".name)', $this->leaveName, true);
        
        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'leave_id'=>array(
                'asc'=>'leave_id',
                'desc'=>'leave_id desc',
            ),
            'fullName'=>array(
                'asc'=>'usr.last_name',
                'desc'=>'usr.last_name desc',
            ),
            'leaveName'=>array(
                'asc'=>'"leaveType".name',
                'desc'=>'"leaveType".name desc',
            ),
            'date_from'=>array(
                'asc'=>'date_from',
                'desc'=>'date_from desc',
            ),
            'date_to'=>array(
                'asc'=>'date_to',
                'desc'=>'date_to desc',
            ),
            'days'=>array(
                'asc'=>'days',
                'desc'=>'days desc',
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