<?php
date_default_timezone_set('America/Los_Angeles');

$script_tz = date_default_timezone_get();
/*
if (strcmp($script_tz, ini_get('date.timezone'))){
    echo 'Script timezone differs from ini-set timezone.';
} else {
    echo 'Script timezone and ini-set timezone match.';
}*/
?>

<?php

/**
 * This is the model class for table "{{payment_detail}}".
 *
 * The followings are the available columns in table '{{payment_detail}}':
 * @property integer $payment_detail_id
 * @property string $pay_mode
 * @property double $capital_amount
 * @property double $gross_sales_tax
 * @property double $gross_sales_tax_amt
 * @property double $gross_sales_tax_pnl
 * @property double $transport_truck_tax
 * @property double $transport_truck_tax_amt
 * @property double $transport_truck_tax_pnl
 * @property double $hazard_storage_tax
 * @property double $hazard_storage_tax_amt
 * @property double $hazard_storage_tax_pnl
 * @property double $sign_billboard_tax
 * @property double $sign_billboard_tax_amt
 * @property double $sign_billboard_tax_pnl
 * @property double $mayors_permit_fee
 * @property double $mayors_permit_fee_amt
 * @property double $mayors_permit_fee_pnl
 * @property double $garbage_fee
 * @property double $garbage_fee_amt
 * @property double $garbage_fee_pnl
 * @property double $truck_van_permit_fee
 * @property double $truck_van_permit_fee_amt
 * @property double $truck_van_permit_fee_pnl
 * @property double $sanitary_permit_fee
 * @property double $sanitary_permit_fee_amt
 * @property double $sanitary_permit_fee_pnl
 * @property double $bldg_insp_fee
 * @property double $bldg_insp_fee_amt
 * @property double $bldg_insp_fee_pnl
 * @property double $elec_insp_fee
 * @property double $elec_insp_fee_amt
 * @property double $elec_insp_fee_pnl
 * @property double $mech_insp_fee
 * @property double $mech_insp_fee_amt
 * @property double $mech_insp_fee_pnl
 * @property double $plumb_insp_fee
 * @property double $plumb_insp_fee_amt
 * @property double $plumb_insp_fee_pnl
 * @property double $sign_billboard_fee
 * @property double $sign_billboard_fee_amt
 * @property double $sign_billboard_fee_pnl
 * @property double $sign_billboard_renew_fee
 * @property double $sign_billboard_renew_fee_amt
 * @property double $sign_billboard_renew_fee_pnl
 * @property double $hazard_storage_fee
 * @property double $hazard_storage_fee_amt
 * @property double $hazard_storage_fee_pnl
 * @property double $bfp_fee
 * @property double $bfp_fee_amt
 * @property double $bfp_fee_pnl
 * @property string $or_num
 * @property string $sys_entry_date
 * @property integer $pay_mode_id
 *
 * The followings are the available model relations:
 * @property PayMode $payMode
 */
class PaymentDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PaymentDetail the static model class
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
		return '{{payment_detail}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('pay_mode_id', 'numerical', 'integerOnly'=>true),
			array('gross_sales_tax_amt, gross_sales_tax_pnl, transport_truck_tax_amt, transport_truck_tax_pnl, hazard_storage_tax_amt, hazard_storage_tax_pnl, sign_billboard_tax_amt, sign_billboard_tax_pnl, mayors_permit_fee_amt, mayors_permit_fee_pnl, garbage_fee_amt, garbage_fee_pnl, truck_van_permit_fee_amt, truck_van_permit_fee_pnl, sanitary_permit_fee_amt, sanitary_permit_fee_pnl,  bldg_insp_fee_amt, bldg_insp_fee_pnl, elec_insp_fee_amt, elec_insp_fee_pnl, mech_insp_fee_amt, mech_insp_fee_pnl, plumb_insp_fee_amt, plumb_insp_fee_pnl, sign_billboard_fee_amt, sign_billboard_fee_pnl, sign_billboard_renew_fee_amt, sign_billboard_renew_fee_pnl, hazard_storage_fee_amt, hazard_storage_fee_pnl, bfp_fee_amt, bfp_fee_pnl', 'oneRequired'),
			array('capital_amount, gross_sales_tax, gross_sales_tax_amt, gross_sales_tax_pnl, transport_truck_tax, transport_truck_tax_amt, transport_truck_tax_pnl, hazard_storage_tax, hazard_storage_tax_amt, hazard_storage_tax_pnl, sign_billboard_tax, sign_billboard_tax_amt, sign_billboard_tax_pnl, mayors_permit_fee, mayors_permit_fee_amt, mayors_permit_fee_pnl, garbage_fee, garbage_fee_amt, garbage_fee_pnl, truck_van_permit_fee, truck_van_permit_fee_amt, truck_van_permit_fee_pnl, sanitary_permit_fee, sanitary_permit_fee_amt, sanitary_permit_fee_pnl, bldg_insp_fee, bldg_insp_fee_amt, bldg_insp_fee_pnl, elec_insp_fee, elec_insp_fee_amt, elec_insp_fee_pnl, mech_insp_fee, mech_insp_fee_amt, mech_insp_fee_pnl, plumb_insp_fee, plumb_insp_fee_amt, plumb_insp_fee_pnl, sign_billboard_fee, sign_billboard_fee_amt, sign_billboard_fee_pnl, sign_billboard_renew_fee, sign_billboard_renew_fee_amt, sign_billboard_renew_fee_pnl, hazard_storage_fee, hazard_storage_fee_amt, hazard_storage_fee_pnl, bfp_fee, bfp_fee_amt, bfp_fee_pnl, grand_total', 'numerical'),
			array('pay_mode, or_num, sys_entry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('payment_detail_id, pay_mode, capital_amount, gross_sales_tax, gross_sales_tax_amt, gross_sales_tax_pnl, transport_truck_tax, transport_truck_tax_amt, transport_truck_tax_pnl, hazard_storage_tax, hazard_storage_tax_amt, hazard_storage_tax_pnl, sign_billboard_tax, sign_billboard_tax_amt, sign_billboard_tax_pnl, mayors_permit_fee, mayors_permit_fee_amt, mayors_permit_fee_pnl, garbage_fee, garbage_fee_amt, garbage_fee_pnl, truck_van_permit_fee, truck_van_permit_fee_amt, truck_van_permit_fee_pnl, sanitary_permit_fee, sanitary_permit_fee_amt, sanitary_permit_fee_pnl, bldg_insp_fee, bldg_insp_fee_amt, bldg_insp_fee_pnl, elec_insp_fee, elec_insp_fee_amt, elec_insp_fee_pnl, mech_insp_fee, mech_insp_fee_amt, mech_insp_fee_pnl, plumb_insp_fee, plumb_insp_fee_amt, plumb_insp_fee_pnl, sign_billboard_fee, sign_billboard_fee_amt, sign_billboard_fee_pnl, sign_billboard_renew_fee, sign_billboard_renew_fee_amt, sign_billboard_renew_fee_pnl, hazard_storage_fee, hazard_storage_fee_amt, hazard_storage_fee_pnl, bfp_fee, bfp_fee_amt, bfp_fee_pnl, or_num, sys_entry_date, pay_mode_id, grand_total', 'safe', 'on'=>'search'),
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
			'payMode' => array(self::BELONGS_TO, 'PayMode', 'pay_mode_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'payment_detail_id' => 'Payment Detail',
			'pay_mode' => 'Pay Mode',
			'capital_amount' => 'Capital Amount',
			'gross_sales_tax' => 'Gross Sales Tax',
			'gross_sales_tax_amt' => 'Gross Sales Tax Amt',
			'gross_sales_tax_pnl' => 'Gross Sales Tax Pnl',
			'transport_truck_tax' => 'Transport Truck Tax',
			'transport_truck_tax_amt' => 'Transport Truck Tax Amt',
			'transport_truck_tax_pnl' => 'Transport Truck Tax Pnl',
			'hazard_storage_tax' => 'Hazard Storage Tax',
			'hazard_storage_tax_amt' => 'Hazard Storage Tax Amt',
			'hazard_storage_tax_pnl' => 'Hazard Storage Tax Pnl',
			'sign_billboard_tax' => 'Sign Billboard Tax',
			'sign_billboard_tax_amt' => 'Sign Billboard Tax Amt',
			'sign_billboard_tax_pnl' => 'Sign Billboard Tax Pnl',
			'mayors_permit_fee' => 'Mayors Permit Fee',
			'mayors_permit_fee_amt' => 'Mayors Permit Fee Amt',
			'mayors_permit_fee_pnl' => 'Mayors Permit Fee Pnl',
			'garbage_fee' => 'Garbage Fee',
			'garbage_fee_amt' => 'Garbage Fee Amt',
			'garbage_fee_pnl' => 'Garbage Fee Pnl',
			'truck_van_permit_fee' => 'Truck Van Permit Fee',
			'truck_van_permit_fee_amt' => 'Truck Van Permit Fee Amt',
			'truck_van_permit_fee_pnl' => 'Truck Van Permit Fee Pnl',
			'sanitary_permit_fee' => 'Sanitary Permit Fee',
			'sanitary_permit_fee_amt' => 'Sanitary Permit Fee Amt',
			'sanitary_permit_fee_pnl' => 'Sanitary Permit Fee Pnl',
			'bldg_insp_fee' => 'Bldg Insp Fee',
			'bldg_insp_fee_amt' => 'Bldg Insp Fee Amt',
			'bldg_insp_fee_pnl' => 'Bldg Insp Fee Pnl',
			'elec_insp_fee' => 'Elec Insp Fee',
			'elec_insp_fee_amt' => 'Elec Insp Fee Amt',
			'elec_insp_fee_pnl' => 'Elec Insp Fee Pnl',
			'mech_insp_fee' => 'Mech Insp Fee',
			'mech_insp_fee_amt' => 'Mech Insp Fee Amt',
			'mech_insp_fee_pnl' => 'Mech Insp Fee Pnl',
			'plumb_insp_fee' => 'Plumb Insp Fee',
			'plumb_insp_fee_amt' => 'Plumb Insp Fee Amt',
			'plumb_insp_fee_pnl' => 'Plumb Insp Fee Pnl',
			'sign_billboard_fee' => 'Sign Billboard Fee',
			'sign_billboard_fee_amt' => 'Sign Billboard Fee Amt',
			'sign_billboard_fee_pnl' => 'Sign Billboard Fee Pnl',
			'sign_billboard_renew_fee' => 'Sign Billboard Renew Fee',
			'sign_billboard_renew_fee_amt' => 'Sign Billboard Renew Fee Amt',
			'sign_billboard_renew_fee_pnl' => 'Sign Billboard Renew Fee Pnl',
			'hazard_storage_fee' => 'Hazard Storage Fee',
			'hazard_storage_fee_amt' => 'Hazard Storage Fee Amt',
			'hazard_storage_fee_pnl' => 'Hazard Storage Fee Pnl',
			'bfp_fee' => 'Bfp Fee',
			'bfp_fee_amt' => 'Bfp Fee Amt',
			'bfp_fee_pnl' => 'Bfp Fee Pnl',
			'or_num' => 'Or Num',
			'sys_entry_date' => 'Sys Entry Date',
			'pay_mode_id' => 'Pay Mode',
			'grand_total' => 'Grand Total',
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

		$criteria->compare('payment_detail_id',$this->payment_detail_id);
		$criteria->compare('pay_mode',$this->pay_mode,true);
		$criteria->compare('capital_amount',$this->capital_amount);
		$criteria->compare('gross_sales_tax',$this->gross_sales_tax);
		$criteria->compare('gross_sales_tax_amt',$this->gross_sales_tax_amt);
		$criteria->compare('gross_sales_tax_pnl',$this->gross_sales_tax_pnl);
		$criteria->compare('transport_truck_tax',$this->transport_truck_tax);
		$criteria->compare('transport_truck_tax_amt',$this->transport_truck_tax_amt);
		$criteria->compare('transport_truck_tax_pnl',$this->transport_truck_tax_pnl);
		$criteria->compare('hazard_storage_tax',$this->hazard_storage_tax);
		$criteria->compare('hazard_storage_tax_amt',$this->hazard_storage_tax_amt);
		$criteria->compare('hazard_storage_tax_pnl',$this->hazard_storage_tax_pnl);
		$criteria->compare('sign_billboard_tax',$this->sign_billboard_tax);
		$criteria->compare('sign_billboard_tax_amt',$this->sign_billboard_tax_amt);
		$criteria->compare('sign_billboard_tax_pnl',$this->sign_billboard_tax_pnl);
		$criteria->compare('mayors_permit_fee',$this->mayors_permit_fee);
		$criteria->compare('mayors_permit_fee_amt',$this->mayors_permit_fee_amt);
		$criteria->compare('mayors_permit_fee_pnl',$this->mayors_permit_fee_pnl);
		$criteria->compare('garbage_fee',$this->garbage_fee);
		$criteria->compare('garbage_fee_amt',$this->garbage_fee_amt);
		$criteria->compare('garbage_fee_pnl',$this->garbage_fee_pnl);
		$criteria->compare('truck_van_permit_fee',$this->truck_van_permit_fee);
		$criteria->compare('truck_van_permit_fee_amt',$this->truck_van_permit_fee_amt);
		$criteria->compare('truck_van_permit_fee_pnl',$this->truck_van_permit_fee_pnl);
		$criteria->compare('sanitary_permit_fee',$this->sanitary_permit_fee);
		$criteria->compare('sanitary_permit_fee_amt',$this->sanitary_permit_fee_amt);
		$criteria->compare('sanitary_permit_fee_pnl',$this->sanitary_permit_fee_pnl);
		$criteria->compare('bldg_insp_fee',$this->bldg_insp_fee);
		$criteria->compare('bldg_insp_fee_amt',$this->bldg_insp_fee_amt);
		$criteria->compare('bldg_insp_fee_pnl',$this->bldg_insp_fee_pnl);
		$criteria->compare('elec_insp_fee',$this->elec_insp_fee);
		$criteria->compare('elec_insp_fee_amt',$this->elec_insp_fee_amt);
		$criteria->compare('elec_insp_fee_pnl',$this->elec_insp_fee_pnl);
		$criteria->compare('mech_insp_fee',$this->mech_insp_fee);
		$criteria->compare('mech_insp_fee_amt',$this->mech_insp_fee_amt);
		$criteria->compare('mech_insp_fee_pnl',$this->mech_insp_fee_pnl);
		$criteria->compare('plumb_insp_fee',$this->plumb_insp_fee);
		$criteria->compare('plumb_insp_fee_amt',$this->plumb_insp_fee_amt);
		$criteria->compare('plumb_insp_fee_pnl',$this->plumb_insp_fee_pnl);
		$criteria->compare('sign_billboard_fee',$this->sign_billboard_fee);
		$criteria->compare('sign_billboard_fee_amt',$this->sign_billboard_fee_amt);
		$criteria->compare('sign_billboard_fee_pnl',$this->sign_billboard_fee_pnl);
		$criteria->compare('sign_billboard_renew_fee',$this->sign_billboard_renew_fee);
		$criteria->compare('sign_billboard_renew_fee_amt',$this->sign_billboard_renew_fee_amt);
		$criteria->compare('sign_billboard_renew_fee_pnl',$this->sign_billboard_renew_fee_pnl);
		$criteria->compare('hazard_storage_fee',$this->hazard_storage_fee);
		$criteria->compare('hazard_storage_fee_amt',$this->hazard_storage_fee_amt);
		$criteria->compare('hazard_storage_fee_pnl',$this->hazard_storage_fee_pnl);
		$criteria->compare('bfp_fee',$this->bfp_fee);
		$criteria->compare('bfp_fee_amt',$this->bfp_fee_amt);
		$criteria->compare('bfp_fee_pnl',$this->bfp_fee_pnl);
		$criteria->compare('or_num',$this->or_num,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);
		$criteria->compare('pay_mode_id',$this->pay_mode_id);
		$criteria->compare('grand_total',$this->grand_total);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function setOrNumber($acctHolder)
	{
		
	 	return md5(date('Y-m-d').$acctHolder->business->name.uniqid($acctHolder->business->business_id));
	}
	
	public function oneRequired($attribute_name, $params)
	{
		if (empty($this->gross_sales_tax_amt) && empty($this->gross_sales_tax_pnl) && empty($this->transport_truck_tax_amt) && empty($this->transport_truck_tax_pnl) && empty($this->hazard_storage_tax_amt) && empty($this->hazard_storage_tax_pnl) && empty($this->sign_billboard_tax_amt) && empty($this->sign_billboard_tax_pnl) && empty($this->mayors_permit_fee_amt) && empty($this->mayors_permit_fee_pnl) && empty($this->garbage_fee_amt) && empty($this->garbage_fee_pnl) && empty($this->truck_van_permit_fee_amt) && empty($this->truck_van_permit_fee_pnl) && empty($this->sanitary_permit_fee_amt) && empty($this->sanitary_permit_fee_pnl) && empty($this->bldg_insp_fee_amt) && empty($this->bldg_insp_fee_pnl) && empty($this->elec_insp_fee_amt) && empty($this->elec_insp_fee_pnl) && empty($this->mech_insp_fee_amt) && empty($this->mech_insp_fee_pnl) && empty($this->plumb_insp_fee_amt) && empty($this->plumb_insp_fee_pnl) && empty($this->sign_billboard_fee_amt) && empty($this->sign_billboard_fee_pnl) && empty($this->sign_billboard_renew_fee_amt) && empty($this->sign_billboard_renew_fee_pnl) && empty($this->hazard_storage_fee_amt) && empty($this->hazard_storage_fee_pnl) && empty($this->bfp_fee_amt) && empty($this->bfp_fee_pnl)) {
		    $this->addError($attribute_name, Yii::t('user', 'At least 1 of the field must be filled up properly'));

		    return false;
		}

		return true;
	}
	
}
