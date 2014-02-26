<?php

/**
 * This is the model class for table "{{emergency_contact}}".
 *
 * The followings are the available columns in table '{{emergency_contact}}':
 * @property integer $emergency_id
 * @property integer $user_id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $suffix_name
 * @property string $full_name
 * @property string $contact_num
 * @property string $contact_email
 * @property string $contact_relationship
 * @property string $sys_entry_date
 *
 * The followings are the available model relations:
 * @property Taxpayer $user
 */
class EmergencyContact extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return EmergencyContact the static model class
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
		return '{{emergency_contact}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, middle_name, last_name, contact_relationship, contact_num', 'required'),
			array('first_name, middle_name, last_name, suffix_name, full_name, contact_num, contact_email, contact_relationship, sys_entry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('emergency_id, user_id, first_name, middle_name, last_name, suffix_name, full_name, contact_num, contact_email, contact_relationship, sys_entry_date', 'safe', 'on'=>'search'),
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
			'user' => array(self::BELONGS_TO, 'Taxpayer', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'emergency_id' => 'Emergency ID',
			'user_id' => 'User ID',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'suffix_name' => 'Name Suffix',
			'full_name' => 'Full Name',
			'contact_num' => 'Contact Number',
			'contact_email' => 'Email Address',
			'contact_relationship' => 'Relationship',
			'sys_entry_date' => 'Sys Entry Date',
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

		$criteria=new CDbCriteria;

		$criteria->compare('emergency_id',$this->emergency_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('suffix_name',$this->suffix_name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('contact_num',$this->contact_num,true);
		$criteria->compare('contact_email',$this->contact_email,true);
		$criteria->compare('contact_relationship',$this->contact_relationship,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getRel()
	{
		return $emRel = array(
			'Parent' => 'Parent',
			'Spouse' => 'Spouse',
			'Sibling' => 'Sibling',
			'Child' => 'Child',
			'Relative' => 'Relative',
		);
	}
}
