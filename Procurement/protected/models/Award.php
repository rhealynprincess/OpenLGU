<?php

/**
 * This is the model class for table "award".
 *
 * The followings are the available columns in table 'award':
 * @property integer $id
 * @property string $title
 * @property string $procuring_entity
 * @property string $procurement_mode
 * @property string $classification
 * @property string $category
 * @property double $abc
 * @property string $contract_duration
 * @property string $contact_details
 * @property string $description
 * @property string $status
 * @property string $date_published
 * @property string $time_published
 * @property string $time_last_modified
 * @property string $date_last_modified
 * @property string $date_closing
 * @property string $time_closing
 * @property integer $total_document_request
 * @property string $area_of_delivery
 * @property integer $created_by
 * @property string $bidding_document
 * @property integer $lcb
 * @property integer $lcrb
 * @property integer $awardee
 * @property string $date_approved
 * @property string $time_approved
 * @property integer $contact_person_id
 *
 * The followings are the available model relations:
 * @property User $awardee0
 */
class Award extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Award the static model class
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
		return 'award';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('id, title, abc', 'required'),
			array('id, total_document_request, created_by, lcb, lcrb, awardee, contact_person_id', 'numerical', 'integerOnly'=>true),
			array('abc', 'numerical'),
			array('procuring_entity, procurement_mode, classification, category, contract_duration, contact_details, description, status, date_published, time_published, time_last_modified, date_last_modified, date_closing, time_closing, area_of_delivery, bidding_document, date_approved, time_approved,amount', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, procuring_entity, procurement_mode, classification, category, abc, contract_duration, contact_details, description, status, date_published, time_published, time_last_modified, date_last_modified, date_closing, time_closing, total_document_request, area_of_delivery, created_by, bidding_document, lcb, lcrb, awardee, date_approved, time_approved, contact_person_id,amount', 'safe', 'on'=>'search'),
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
			'awardee0' => array(self::BELONGS_TO, 'User', 'awardee'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'procuring_entity' => 'Procuring Entity',
			'procurement_mode' => 'Procurement Mode',
			'classification' => 'Classification',
			'category' => 'Category',
			'abc' => 'Abc',
			'contract_duration' => 'Contract Duration',
			'contact_details' => 'Contact Details',
			'description' => 'Description',
			'status' => 'Status',
			'date_published' => 'Date Published',
			'time_published' => 'Time Published',
			'time_last_modified' => 'Time Last Modified',
			'date_last_modified' => 'Date Last Modified',
			'date_closing' => 'Date Closing',
			'time_closing' => 'Time Closing',
			'total_document_request' => 'Total Document Request',
			'area_of_delivery' => 'Area Of Delivery',
			'created_by' => 'Created By',
			'bidding_document' => 'Bidding Document',
			'lcb' => 'Lcb',
			'lcrb' => 'Lcrb',
			'awardee' => 'Awardee',
			'date_approved' => 'Date Approved',
			'time_approved' => 'Time Approved',
			'contact_person_id' => 'Contact Person',
			'amount' => 'Amount',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('procuring_entity',$this->procuring_entity,true);
		$criteria->compare('procurement_mode',$this->procurement_mode,true);
		$criteria->compare('classification',$this->classification,true);
		$criteria->compare('category',$this->category,true);
		$criteria->compare('abc',$this->abc);
		$criteria->compare('contract_duration',$this->contract_duration,true);
		$criteria->compare('contact_details',$this->contact_details,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('date_published',$this->date_published,true);
		$criteria->compare('time_published',$this->time_published,true);
		$criteria->compare('time_last_modified',$this->time_last_modified,true);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('date_closing',$this->date_closing,true);
		$criteria->compare('time_closing',$this->time_closing,true);
		$criteria->compare('total_document_request',$this->total_document_request);
		$criteria->compare('area_of_delivery',$this->area_of_delivery,true);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('bidding_document',$this->bidding_document,true);
		$criteria->compare('lcb',$this->lcb);
		$criteria->compare('lcrb',$this->lcrb);
		$criteria->compare('awardee',$this->awardee);
		$criteria->compare('date_approved',$this->date_approved,true);
		$criteria->compare('time_approved',$this->time_approved,true);
		$criteria->compare('contact_person_id',$this->contact_person_id);
		$criteria->compare('amount',$this->amount);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
