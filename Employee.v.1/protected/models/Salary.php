<?php
/**
 * Model class for Salary.
 *
 * @package EmployeeInformationSystem
 * @subpackage Salary
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * This is the model class for table "salary".
 *
 * The followings are the available columns in table 'salary':
 * @property integer $salary_id
 * @property integer $salary_grade
 * @property integer $step
 * @property integer $amount
 *
 * The followings are the available model relations:
 * @property Position[] $positions
 */
class Salary extends CActiveRecord
{
    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Salary the static model class
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
        return 'salary';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('amount', 'numerical', 'integerOnly'=>true),
            array('salary_grade', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('salary_id, salary_grade, step, amount', 'safe', 'on'=>'search'),
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
            'positions'=>array(self::HAS_MANY, 'Position', 'salary_grade'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'salary_id'=>'Salary',
            'salary_grade'=>'Salary Grade',
            'step'=>'Step',
            'amount'=>'Amount',
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

        $criteria->compare('salary_id', $this->salary_id);
        $criteria->compare('salary_grade', $this->salary_grade, true);
        $criteria->compare('step', $this->step);
        $criteria->compare('amount', $this->amount);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }
}