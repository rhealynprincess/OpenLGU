<?php
/**
 * Model class for Department.
 *
 * @package EmployeeInformationSystem
 * @subpackage Department
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "department".
 *
 * The followings are the available columns in table 'department':
 * @property integer $department_id
 * @property string $name
 * @property integer $head_id
 * @property string $details
 *
 * The followings are the available model relations:
 * @property Position $head
 * @property Position[] $positions
 */
class Department extends CActiveRecord
{
    private $_fullName = null;
    
    /**
     * get and set constructors for retrieving full name of Department Head.
     * @return string full name of Department Head
     */
    public function getFullName()
    {
        if ($this->_fullName === null && $this->head !== null) {
            $this->_fullName = $this->head->fullName;
        }
        return $this->_fullName;
    }
    public function setFullName($value)
    {
        $this->_fullName = $value;
    }
    
    /**
     * Retrieves all Employees under this Department which is not an ADMIN or HRMO.
     * @return listData list of Employees
     */
    public function getEmployees()
    {        
        return CHtml::listData(
            Position::model()->findAll(array(
                'condition'=>"department_id = $this->department_id AND t.employee_id NOT IN
                    (SELECT user_id FROM \"user\" WHERE role IN ('ADMIN', 'HRMO'))",
                'with'=>'employee.usr',
                'order'=>'usr.last_name'
            )),
            'position_id',
            'fullName'
        );
    }
    
    /**
     * Retrieves all Positions under this Department.
     * @return CActiveDataProvider list of Positions
     */
    public function getPositions()
    {
        return new CActiveDataProvider('Position', array(
            'criteria'=>array(
                'order'=>'rank',
                'condition'=>"department_id = $this->department_id",
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
     * @return Department the static model class
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
        return 'department';
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
            array('name', 'unique', 'caseSensitive'=>false, 'message'=>'Name has already been taken.'),
            array('head_id', 'unique'),
            array('name, details', 'required'),
            array('name, details', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('department_id, name, head_id, details, fullName', 'safe', 'on'=>'search'),
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
            'head'=>array(self::BELONGS_TO, 'Position', 'head_id'),
            'positions'=>array(self::HAS_MANY, 'Position', 'department_id'),
            'leaves'=>array(self::HAS_MANY, 'Leave', 'head_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'department_id'=>'Department ID',
            'name'=>'Department Name',
            'head_id'=>'Department Head',
            'details'=>'Details',
            'fullName'=>'Department Head',
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
        $criteria->with = array('head.employee.usr');

        $criteria->compare('t.department_id::VARCHAR', $this->department_id);
        $criteria->compare('LOWER(name)', $this->name, true);
        $criteria->compare('head_id', $this->head_id);
        $criteria->compare('LOWER(details)', $this->details, true);
        $criteria->compare("LOWER(usr.first_name || ' ' || usr.middle_name || ' ' || usr.last_name)",
                           $this->fullName, true);

        $sort = new CSort();
        $sort->attributes = array(
            'defaultOrder'=>'t.create_time DESC',
            'department_id'=>array(
                'asc'=>'department_id',
                'desc'=>'department_id desc',
            ),
            'name'=>array(
                'asc'=>'name',
                'desc'=>'name desc',
            ),
            'fullName'=>array(
                'asc'=>'usr.last_name',
                'desc'=>'usr.last_name desc',
            ),
            'details'=>array(
                'asc'=>'details',
                'desc'=>'details desc',
            ),
        );
        
        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
            'sort'=>$sort,
        ));
    }
}