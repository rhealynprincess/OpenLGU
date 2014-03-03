<?php
/**
 * Model class for Employee Child.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "employee_child".
 *
 * The followings are the available columns in table 'employee_child':
 * @property integer $child_id
 * @property integer $employee_id
 * @property string $name
 * @property string $birthday
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class EmployeeChild extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployeeChild the static model class
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
        return 'employee_child';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('employee_id, name, birthday', 'required'),
            array('employee_id', 'numerical', 'integerOnly'=>true),
            array('name, birthday', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('child_id, employee_id, name, birthday', 'safe', 'on'=>'search'),
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'child_id'=>'Child',
            'employee_id'=>'Employee',
            'name'=>'Full Name',
            'birthday'=>'Birthday',
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

        $criteria->compare('child_id', $this->child_id);
        $criteria->compare('employee_id', $this->employee_id);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('birthday', $this->birthday, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}