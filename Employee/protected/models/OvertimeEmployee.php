<?php
/**
 * Model class for Overtime Employee.
 *
 * @package EmployeeInformationSystem
 * @subpackage Overtime
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "overtime_employee".
 *
 * The followings are the available columns in table 'overtime_employee':
 * @property integer $overtime_id
 * @property integer $employee_id
 *
 * The followings are the available model relations:
 * @property Employee[] $employees
 */
class OvertimeEmployee extends CActiveRecord
{
    private $_fullName = null;
    
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
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OvertimeEmployee the static model class
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
        return 'overtime_employee';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('overtime_id, employee_id', 'required', 'on'=>'request'), 
            array('overtime_id, employee_id', 'numerical', 'integerOnly'=>true), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('overtime_id, employee_id', 'safe', 'on'=>'search'), 
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
            'overtime'=>array(self::BELONGS_TO, 'Overtime', 'overtime_id'), 
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'overtime_id'=>'Overtime ID', 
            'employee_id'=>'Employees Included', 
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

        $criteria->compare('overtime_id', $this->overtime_id);
        $criteria->compare('employee_id', $this->employee_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria, 
        ));
    }
}