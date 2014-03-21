<?php

/**
 * This is the model class for table "{{progress}}".
 *
 * The followings are the available columns in table '{{progress}}':
 * @property integer $progress_id
 * @property integer $business_id
 * @property string $business_information
 * @property string $documents
 * @property string $assessment
 * @property string $payment
 * @property string $approval
 *
 * The followings are the available model relations:
 * @property Business $business
 */
class Progress extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Progress the static model class
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
		return '{{progress}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_holder_id', 'numerical', 'integerOnly'=>true),
			array('business_information, documents, assessment, payment, approval', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('progress_id, account_holder_id, business_information, documents, assessment, payment, approval', 'safe', 'on'=>'search'),
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
			'busAcctHolder' => array(self::BELONGS_TO, 'BusAcctHolder', 'account_holder_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'progress_id' => 'Progress Id',
			'account_holder_id' => 'Business Account Holder Id',
			'business_information' => 'Business Information',
			'documents' => 'Documents',
			'assessment' => 'Assessment',
			'payment' => 'Payment',
			'approval' => 'Approval',
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

		$criteria->compare('progress_id',$this->progress_id);
		$criteria->compare('account_holder_id',$this->account_holder_id);
		$criteria->compare('business_information',$this->business_information,true);
		$criteria->compare('documents',$this->documents,true);
		$criteria->compare('assessment',$this->assessment,true);
		$criteria->compare('payment',$this->payment,true);
		$criteria->compare('approval',$this->approval,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
}
