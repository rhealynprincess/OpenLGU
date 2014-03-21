<?php
/**
 * Model class for Employee Training.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
 /**
 * This is the model class for table "employee_training".
 *
 * The followings are the available columns in table 'employee_training':
 * @property integer $training_id
 * @property integer $employee_id
 * @property string $program_title
 * @property string $from_date
 * @property string $to_date
 * @property integer $no_of_hours
 * @property string $sponsor
 * @property string $attachment
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class EmployeeTraining extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployeeTraining the static model class
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
        return 'employee_training';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('program_title, from_date, to_date, sponsor', 'required'),
            array('no_of_hours', 'numerical', 'integerOnly'=>true),
            array('program_title, from_date, to_date, sponsor, attachment', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('program_title, from_date, to_date, no_of_hours, sponsor, attachment', 'safe', 'on'=>'search'),
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
            'program_title'=>'Program Title',
            'from_date'=>'From Date',
            'to_date'=>'To Date',
            'no_of_hours'=>'No. Of Hours',
            'sponsor'=>'Sponsor',
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

        $criteria->compare('program_title', $this->program_title, true);
        $criteria->compare('from_date', $this->from_date, true);
        $criteria->compare('to_date', $this->to_date, true);
        $criteria->compare('no_of_hours', $this->no_of_hours);
        $criteria->compare('sponsor', $this->sponsor, true);
        $criteria->compare('attachment', $this->attachment, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}