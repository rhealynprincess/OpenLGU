<?php
/**
 * Model class for Employee Education.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "employee_education".
 *
 * The followings are the available columns in table 'employee_education':
 * @property integer $education_id
 * @property integer $employee_id
 * @property string $level
 * @property string $school_name
 * @property string $degree_course
 * @property integer $year_graduated
 * @property string $highest_grade
 * @property integer $from_year
 * @property integer $to_year
 * @property string $honors_received
 * @property string $attachment
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class EmployeeEducation extends CActiveRecord
{
    public $levelList = array(
        'ELEMENTARY'=>'ELEMENTARY',
        'SECONDARY'=>'SECONDARY',
        'VOCATIONAL'=>'VOCATIONAL',
        'COLLEGE'=>'COLLEGE',
        'GRADUATE'=>'GRADUATE',
    );
    
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployeeEducation the static model class
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
        return 'employee_education';
    }
    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('school_name, from_year, to_year', 'required'),
            array('year_graduated, from_year, to_year', 'numerical', 'integerOnly'=>true,
                  'min'=>1900, 'tooSmall'=>'Please enter valid date.',
                  'max'=>date("Y"), 'tooBig'=>'Please enter valid date.'),
            array('level, degree_course, highest_grade, honors_received, attachment', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('level, school_name, degree_course, year_graduated, highest_grade,
                  from_year, to_year, honors_received, attachment', 'safe', 'on'=>'search'),
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
            'level'=>'Level',
            'school_name'=>'School Name',
            'degree_course'=>'Degree Course',
            'year_graduated'=>'Year Graduated',
            'highest_grade'=>'Highest Grade',
            'from_year'=>'From Year',
            'to_year'=>'To Year',
            'honors_received'=>'Honors Received',
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

        $criteria->compare('level', $this->level, true);
        $criteria->compare('school_name', $this->school_name, true);
        $criteria->compare('degree_course', $this->degree_course, true);
        $criteria->compare('year_graduated', $this->year_graduated);
        $criteria->compare('highest_grade', $this->highest_grade, true);
        $criteria->compare('from_year', $this->from_year);
        $criteria->compare('to_year', $this->to_year);
        $criteria->compare('honors_received', $this->honors_received, true);
        $criteria->compare('attachment', $this->attachment, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}