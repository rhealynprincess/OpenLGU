<?php
/**
 * Model class for Transfer.
 *
 * @package EmployeeInformationSystem
 * @subpackage Transfer
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "transfer".
 *
 * The followings are the available columns in table 'transfer':
 * @property integer $transfer_id
 * @property integer $employee_id
 * @property integer $head_id
 * @property integer $admin_id
 * @property string $details
 * @property string $emp_status
 * @property string $admin_status
 * @property string $request_date
 * @property string $approve_date
 *
 * The followings are the available model relations:
 * @property Employee $employee
 * @property Employee $head
 */
class Transfer extends CActiveRecord
{
    private $_fullName = null;
    private $_headName = null;
    private $_adminName = null;
    
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
     * get and set constructors for retrieving full name of Administrator.
     * @return string full name of Administrator
     */
    public function getAdminName()
    {
        if ($this->_adminName === null && $this->admin !== null) {
            $this->_adminName = $this->admin->fullName;
        }
        return $this->_adminName;
    }
    public function setAdminName($value)
    {
        $this->_adminName = $value;
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
     * Creates a flash message containing a pending Transfer for the current month.
     *
     * An AJAX button is appended to the notice which creates a dialog box containing the details
     * of the Transfer.
     */
    public function getTransferNotice()
    {
        $transfer = Transfer::model()->findAll(array(
                'condition'=>"employee_id = " . Yii::app()->user->getId() . " AND
                    emp_status = 'PENDING' AND
                    extract(month FROM request_date) = " . date('m'),
        ));
        
        if ($transfer) {
            foreach ($transfer as $row=>$data) {
                $url =  CHtml::ajaxButton(
                    'View',
                    Yii::app()->createUrl('transfer/update', array('id'=>$data->transfer_id, 'view'=>'emp')),
                    array('success'=>'function(data){
                        $("#order-dialog").dialog("option", "title", "Transfer Order");
                        $("#order-dialog").html(data).dialog("open");
                    }')
                );
                echo Yii::app()->user->setFlash("notice t-$row", "You have a Transfer Order. $url");
            }
        }
    }
    
    /**
     * Creates a flash message containing an approved Transfer for the current month.
     *
     * An AJAX button is appended to the notice which creates a dialog box containing the details
     * of the Transfer. This notifies the Administrator to update the profile of an Employee due for transfer.
     */
    public function getTransferUpdateNotice()
    {
        $transfer = Transfer::model()->findAll(array(
                'condition'=>"emp_status = 'APPROVED' AND
                    admin_status = 'PENDING' AND
                    extract(month FROM request_date) = " . date('m'),
        ));
        
        if ($transfer) {
            foreach ($transfer as $row=>$data) {
                $url =  CHtml::ajaxButton(
                    'View',
                    Yii::app()->createUrl('transfer/update', array('id'=>$data->transfer_id, 'view'=>'admin')),
                    array('success'=>'function(data){
                        $("#order-dialog").dialog("option", "title", "Update Transferee");
                        $("#order-dialog").html(data).dialog("open");
                    }')
                );
                return Yii::app()->user->setFlash('notice t-' . $row, 'Please update this Transferee. ' . $url);
            }
        }
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
     * @return Transfer the static model class
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
        return 'transfer';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee_id, head_id', 'numerical', 'integerOnly'=>true),
            array('details', 'required'),
            array('details, emp_status, admin_status, request_date, approve_date', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('transfer_id, employee_id, head_id, details, emp_status, admin_status, request_date,
                  approve_date, fullName, headName, adminName', 'safe', 'on'=>'search'),
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
            'admin'=>array(self::BELONGS_TO, 'Employee', 'admin_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'transfer_id'=>'Transfer ID',
            'employee_id'=>'Employee',
            'head_id'=>'Head',
            'admin_id'=>'Admin',
            'details'=>'Details',
            'emp_status'=>'Employee Status',
            'head_status'=>'Admin Status',
            'request_date'=>'Request Date',
            'approve_date'=>'Approve Date',
            'fullName'=>'Employee Name',
            'headName'=>'Department Head',
            'adminName'=>'Administrator',
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
            'admin.usr'=>array('alias'=>'usr2')
        );

        $criteria->compare('transfer_id::VARCHAR', $this->transfer_id);
        $criteria->compare('employee_id', $this->employee_id);
        $criteria->compare('head_id', $this->head_id);
        $criteria->compare('LOWER(details)', $this->details,true);
        $criteria->compare('LOWER(emp_status)', $this->emp_status,true);
        $criteria->compare('LOWER(admin_status)', $this->admin_status,true);
        $criteria->compare('request_date::VARCHAR', $this->request_date,true);
        $criteria->compare('approve_date::VARCHAR', $this->approve_date,true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);
        $criteria->compare("LOWER(usr1.first_name || ' ' || usr1.middle_name || ' ' || usr1.last_name)",
                           $this->headName, true);
        $criteria->compare("LOWER(usr2.first_name || ' ' || usr2.middle_name || ' ' || usr2.last_name)",
                           $this->adminName, true);

        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'transfer_id'=>array(
                'asc'=>'transfer_id',
                'desc'=>'transfer_id desc',
            ),
            'headName'=>array(
                'asc'=>'usr1.last_name',
                'desc'=>'usr1.last_name desc',
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
            'emp_status'=>array(
                'asc'=>'emp_status',
                'desc'=>'emp_status desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}