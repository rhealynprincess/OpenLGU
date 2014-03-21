<?php
/**
 * Model class for Personnel Selection Board.
 *
 * @package EmployeeInformationSystem
 * @subpackage PersonnelSelectionBoard
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "personnel_selection_board".
 *
 * The followings are the available columns in table 'personnel_selection_board':
 * @property integer $psb_id
 * @property integer $chair_id
 * @property integer $first_rep_id
 * @property integer $second_rep_id
 * @property string $last_modifed
 */
class PersonnelSelectionBoard extends CActiveRecord
{

    /**
     * Retrieves all active Employees elligible for each specified level in the Personnel Selection Board.
     * @return listData list of Employees
     */
    public function getEmployees($id, $level)
    {
        $id = ($id) ? $id : '0';
        $level = ($level) ? "AND level = $level" : null;
        
        return CHtml::listData(
            Position::model()->findAll(array(
                'condition'=>"t.employee_id = $id OR
                    (status = 'ACTIVE' AND usr.role = 'USER' AND t.employee_id IS NOT NULL $level)", 
                'with'=>'employee.usr',
                'order'=>'last_name'
            )), 
            'employee_id', 
            'fullName'
        );
    }
    
    /**
     * Checks the View Permission of the current user.
     *
     * Only acceptable users are Admin, Department Head, HRMO, and the Personnel Selection Board.
     * First check is if the current user has a position. Exit if no position.
     * Second check is if current user is Department Head of the vacant position, is HRMO, or is ADMIN.
     * Third check is if current user is a PSB representative of the vacant position's level or is the PSB Chairperson.
     * @params integer $vacancy the ID of the vacancy to be viewed
     */
    public function checkViewPermission($vacancy)
    {
        $position = Position::model()->findByAttributes(array('employee_id'=>Yii::app()->user->getId()));
        
        if (!$position) {
            return false;
        }        
        if (($vacancy->department_id == $position->department_id && $position->role == 'DEPARTMENT HEAD') ||
            $position->role == 'HRMO' || $position->employee->usr->role == 'ADMIN') {
            return true;
        }
        else {
            if ($vacancy->level == 1) {
                $levelCheck = "first_rep_id = $position->employee_id";
            }
            else if ($vacancy->level == 2) {
                $levelCheck = "second_rep_id = $position->employee_id";
            }
            
            $psb = PersonnelSelectionBoard::model()->findAll(array(
                'condition'=>"$levelCheck OR chair_id = $position->employee_id",
            ));
            return count($psb);
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
     * @return PersonnelSelectionBoard the static model class
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
        return 'personnel_selection_board';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('chair_id, first_rep_id, second_rep_id', 'numerical', 'integerOnly'=>true), 
            array('chair_id, first_rep_id, second_rep_id', 'unique'), 
            array('last_modifed', 'safe'), 
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('psb_id, chair_id, first_rep_id, second_rep_id', 'safe', 'on'=>'search'), 
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
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'psb_id'=>'Psb', 
            'chair_id'=>'Chairperson', 
            'first_rep_id'=>'First Level Representative', 
            'second_rep_id'=>'Second Level Representative', 
            'last_modifed'=>'Last Modified', 
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

        $criteria->compare('psb_id', $this->psb_id);
        $criteria->compare('chair_id', $this->chair_id);
        $criteria->compare('first_rep_id', $this->first_rep_id);
        $criteria->compare('second_rep_id', $this->second_rep_id);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria, 
        ));
    }
}