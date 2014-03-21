<?php
/**
 * Model class for Employee Civil Service Eligibility.
 *
 * @package EmployeeInformationSystem
 * @subpackage Employee
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "employee_eligibility".
 *
 * The followings are the available columns in table 'employee_eligibility':
 * @property integer $eligibility_id
 * @property integer $employee_id
 * @property string $career_service
 * @property string $rating
 * @property string $date_of_exam
 * @property string $place_of_exam
 * @property integer $license_no
 * @property string $license_release_date
 * @property string $attachment
 *
 * The followings are the available model relations:
 * @property Employee $employee
 */
class EmployeeEligibility extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return EmployeeEligibility the static model class
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
        return 'employee_eligibility';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('license_release_date', 'default', 'setOnEmpty'=>true, 'value'=>NULL),
            array('career_service, rating, date_of_exam, place_of_exam', 'required'),
            array('rating', 'numerical', 'max'=>100.00, 'tooBig'=>'Max Rating is 100.00'),
            array('license_no', 'numerical', 'integerOnly'=>false),
            array('career_service, rating, date_of_exam, place_of_exam, license_release_date, attachment', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('career_service, rating, date_of_exam, place_of_exam,
                  license_no, license_release_date, attachment', 'safe', 'on'=>'search'),
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
            'career_service'=>'Career Service',
            'rating'=>'Rating',
            'date_of_exam'=>'Date Of Exam',
            'place_of_exam'=>'Place Of Exam',
            'license_no'=>'License No.',
            'license_release_date'=>'License Release Date',
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

        $criteria->compare('career_service', $this->career_service, true);
        $criteria->compare('rating', $this->rating, true);
        $criteria->compare('date_of_exam', $this->date_of_exam, true);
        $criteria->compare('place_of_exam', $this->place_of_exam, true);
        $criteria->compare('license_no', $this->license_no);
        $criteria->compare('license_release_date', $this->license_release_date, true);
        $criteria->compare('attachment', $this->attachment, true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}