<?php

/**
 * This is the model class for table "{{bus_acct_holder}}".
 *
 * The followings are the available columns in table '{{bus_acct_holder}}':
 * @property integer $account_holder_id
 * @property integer $business_id
 * @property integer $user_id
 * @property string $application_date
 *
 * The followings are the available model relations:
 * @property Business $business
 * @property BusAcctDetail[] $busAcctDetails
 */
class BusAcctHolder extends CActiveRecord
{
	public $businessName;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BusAcctHolder the static model class
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
		return '{{bus_acct_holder}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('business_id, user_id', 'numerical', 'integerOnly'=>true),
			array('application_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('account_holder_id, business_id, user_id, application_date', 'safe', 'on'=>'search'),
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
			'business' => array(self::BELONGS_TO, 'Business', 'business_id'),
			'busAcctDetail' => array(self::HAS_ONE, 'BusAcctDetail', 'account_holder_id'),
			'paymentHolder' => array(self::HAS_ONE, 'PaymentHolder', 'account_holder_id'),
			'approval' => array(self::HAS_ONE, 'Approval', 'account_holder_id'),
			'document'=>array(self::HAS_ONE, 'Document', 'account_holder_id'),
			'progress'=>array(self::HAS_ONE, 'Progress', 'account_holder_id'),
			
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'account_holder_id' => 'Account Holder ID',
			'business_id' => 'Business ID',
			'user_id' => 'User ID',
			'application_date' => 'Application Date',
			
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
		
		$criteria->compare('account_holder_id',$this->account_holder_id, true);
		$criteria->compare('business_id',$this->business_id, true);
		$criteria->compare('user_id',$this->user_id, true);
		$criteria->compare('application_date',$this->application_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function afterSave()
	{
		$progress = new Progress;
		$progress->account_holder_id = $this->account_holder_id;
		$progress->save();
	}
}
