<?php

/**
 * This is the model class for table "{{issuance}}".
 *
 * The followings are the available columns in table '{{issuance}}':
 * @property integer $issuance_id
 * @property integer $approval_id
 * @property string $business_reg_num
 * @property string $full_business_name
 * @property string $or_reference
 * @property string $or_reference_date
 * @property string $released_to
 * @property string $scheduled_release_date
 * @property string $actual_release_date
 * @property string $issuance_barcode_ref
 * @property string $issued_by_name
 * @property string $issued_by_id
 * @property string $sys_entry_date
 *
 * The followings are the available model relations:
 * @property Approval $approval
 */
class Issuance extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Issuance the static model class
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
		return '{{issuance}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('approval_id', 'numerical', 'integerOnly'=>true),
			array('released_to, actual_release_date', 'required', 'on'=>'update'),
			array('business_reg_num, full_business_name, or_reference, or_reference_date, released_to, scheduled_release_date, actual_release_date, issuance_barcode_ref, issued_by_name, issued_by_id, sys_entry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('issuance_id, approval_id, business_reg_num, full_business_name, or_reference, or_reference_date, released_to, scheduled_release_date, actual_release_date, issuance_barcode_ref, issued_by_name, issued_by_id, sys_entry_date', 'safe', 'on'=>'search'),
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
			'approval' => array(self::BELONGS_TO, 'Approval', 'approval_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'issuance_id' => 'Issuance',
			'approval_id' => 'Approval',
			'business_reg_num' => 'Business Reg Num',
			'full_business_name' => 'Full Business Name',
			'or_reference' => 'Or Reference',
			'or_reference_date' => 'Or Reference Date',
			'released_to' => 'Released To',
			'scheduled_release_date' => 'Scheduled Release Date',
			'actual_release_date' => 'Actual Release Date',
			'issuance_barcode_ref' => 'Issuance Barcode Ref',
			'issued_by_name' => 'Issued By Name',
			'issued_by_id' => 'Issued By',
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

		$criteria->compare('issuance_id',$this->issuance_id);
		$criteria->compare('approval_id',$this->approval_id);
		$criteria->compare('business_reg_num',$this->business_reg_num,true);
		$criteria->compare('full_business_name',$this->full_business_name,true);
		$criteria->compare('or_reference',$this->or_reference,true);
		$criteria->compare('or_reference_date',$this->or_reference_date,true);
		$criteria->compare('released_to',$this->released_to,true);
		$criteria->compare('scheduled_release_date',$this->scheduled_release_date,true);
		$criteria->compare('actual_release_date',$this->actual_release_date,true);
		$criteria->compare('issuance_barcode_ref',$this->issuance_barcode_ref,true);
		$criteria->compare('issued_by_name',$this->issued_by_name,true);
		$criteria->compare('issued_by_id',$this->issued_by_id,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	
}
