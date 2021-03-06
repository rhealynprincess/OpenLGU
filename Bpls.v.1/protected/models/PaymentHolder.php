<?php

/**
 * This is the model class for table "{{payment_holder}}".
 *
 * The followings are the available columns in table '{{payment_holder}}':
 * @property integer $payment_holder_id
 * @property integer $account_holder_id
 * @property integer $business_id
 *
 * The followings are the available model relations:
 * @property PaymentDetail[] $paymentDetails
 * @property BusAcctHolder $accountHolder
 */
class PaymentHolder extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaymentHolder the static model class
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
		return '{{payment_holder}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('account_holder_id, business_id', 'required', 'on'=>'create'),
			array('account_holder_id, business_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('payment_holder_id, account_holder_id, business_id', 'safe', 'on'=>'search'),
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
			'payMode' => array(self::HAS_MANY, 'PayMode', 'payment_holder_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'payment_holder_id' => 'Payment Holder',
			'account_holder_id' => 'Account Holder ID',
			'business_id' => 'Business ID',
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

		$criteria->compare('payment_holder_id',$this->payment_holder_id);
		$criteria->compare('account_holder_id',$this->account_holder_id);
		$criteria->compare('business_id',$this->business_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function afterSave()
    {
    	
    	if($this->busAcctHolder->business->pay_mode == 'Annually')
    	{
			$payModel = new PayMode;
			$payModel->payment_holder_id = $this->payment_holder_id;
			$payModel->name = 'Annual';
			$payModel->save();
    	}
    	elseif($this->busAcctHolder->business->pay_mode == 'Bi-Annually')
    	{
			for($index=1;$index<=2;$index++)
			{
			$payModel = new PayMode;
			$payModel->payment_holder_id = $this->payment_holder_id;
			$payModel->name = 'Bi-Annual '.$index;
			$payModel->save();
			}
    	}
    	elseif($this->busAcctHolder->business->pay_mode == 'Quarterly')
    	{
			for($index=1;$index<=4;$index++)
			{
			$payModel = new PayMode;
			$payModel->payment_holder_id = $this->payment_holder_id;
			$payModel->name = 'Quarter '.$index;
			$payModel->save();
			}
    	}
    	

    	
    }
}
