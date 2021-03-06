<?php

/**
 * This is the model class for table "{{address}}".
 *
 * The followings are the available columns in table '{{address}}':
 * @property integer $address_id
 * @property integer $user_id
 * @property string $unit_num
 * @property string $street
 * @property string $subdivision
 * @property string $barangay
 * @property string $sys_entry_date
 * @property string $full_address
 *
 * The followings are the available model relations:
 * @property Taxpayer $user
 */
class Address extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Address the static model class
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
		return '{{address}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('unit_num, street, subdivision, barangay', 'required'),
			array('unit_num, street, subdivision, barangay, sys_entry_date, full_address', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('address_id, user_id, unit_num, street, subdivision, barangay, sys_entry_date, full_address', 'safe', 'on'=>'search'),
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
			'address_id' => 'Address ID',
			'user_id' => 'User ID',
			'unit_num' => 'Unit Number',
			'street' => 'Street',
			'subdivision' => 'Subdivision',
			'barangay' => 'Barangay',
			'sys_entry_date' => 'Sys Entry Date',
			'full_address' => 'Full Address',
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

		$criteria->compare('address_id',$this->address_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('unit_num',$this->unit_num,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('subdivision',$this->subdivision,true);
		$criteria->compare('barangay',$this->barangay,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);
		$criteria->compare('full_address',$this->full_address,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getAddresses($id)
	{
		$criteria=new CDbCriteria;
		$criteria->condition = "user_id=".$id;
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
