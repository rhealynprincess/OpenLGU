<?php

/**
 * This is the model class for table "{{bus_acct_detail}}".
 *
 * The followings are the available columns in table '{{bus_acct_detail}}':
 * @property integer $account_detail_id
 * @property integer $account_holder_id
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
 * @property double $grand_total
 * @property string $sys_entry_date
 *
 * The followings are the available model relations:
 * @property BusAcctHolder $accountHolder
 */
class BusAcctDetail extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return BusAcctDetail the static model class
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
		return '{{bus_acct_detail}}';
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
			array('capital_amount, grand_total, gross_sales_tax, gross_sales_tax_amt, gross_sales_tax_pnl, transport_truck_tax, transport_truck_tax_amt, transport_truck_tax_pnl, hazard_storage_tax, hazard_storage_tax_amt, hazard_storage_tax_pnl, sign_billboard_tax, sign_billboard_tax_amt, sign_billboard_tax_pnl, mayors_permit_fee, mayors_permit_fee_amt, mayors_permit_fee_pnl, garbage_fee, garbage_fee_amt, garbage_fee_pnl, truck_van_permit_fee, truck_van_permit_fee_amt, truck_van_permit_fee_pnl, sanitary_permit_fee, sanitary_permit_fee_amt, sanitary_permit_fee_pnl, bldg_insp_fee, bldg_insp_fee_amt, bldg_insp_fee_pnl, elec_insp_fee, elec_insp_fee_amt, elec_insp_fee_pnl, mech_insp_fee, mech_insp_fee_amt, mech_insp_fee_pnl, plumb_insp_fee, plumb_insp_fee_amt, plumb_insp_fee_pnl, sign_billboard_fee, sign_billboard_fee_amt, sign_billboard_fee_pnl, sign_billboard_renew_fee, sign_billboard_renew_fee_amt, sign_billboard_renew_fee_pnl, hazard_storage_fee, hazard_storage_fee_amt, hazard_storage_fee_pnl, bfp_fee, bfp_fee_amt, bfp_fee_pnl', 'numerical'),
			array('pay_mode, sys_entry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('account_detail_id, account_holder_id, pay_mode, capital_amount, gross_sales_tax, gross_sales_tax_amt, gross_sales_tax_pnl, transport_truck_tax, transport_truck_tax_amt, transport_truck_tax_pnl, hazard_storage_tax, hazard_storage_tax_amt, hazard_storage_tax_pnl, sign_billboard_tax, sign_billboard_tax_amt, sign_billboard_tax_pnl, mayors_permit_fee, mayors_permit_fee_amt, mayors_permit_fee_pnl, garbage_fee, garbage_fee_amt, garbage_fee_pnl, truck_van_permit_fee, truck_van_permit_fee_amt, truck_van_permit_fee_pnl, sanitary_permit_fee, sanitary_permit_fee_amt, sanitary_permit_fee_pnl, bldg_insp_fee, bldg_insp_fee_amt, bldg_insp_fee_pnl, elec_insp_fee, elec_insp_fee_amt, elec_insp_fee_pnl, mech_insp_fee, mech_insp_fee_amt, mech_insp_fee_pnl, plumb_insp_fee, plumb_insp_fee_amt, plumb_insp_fee_pnl, sign_billboard_fee, sign_billboard_fee_amt, sign_billboard_fee_pnl, sign_billboard_renew_fee, sign_billboard_renew_fee_amt, sign_billboard_renew_fee_pnl, hazard_storage_fee, hazard_storage_fee_amt, hazard_storage_fee_pnl, bfp_fee, bfp_fee_amt, bfp_fee_pnl, grand_total, sys_entry_date', 'safe', 'on'=>'search'),
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
			'account_detail_id' => 'Account Detail ID',
			'account_holder_id' => 'Account Holder ID',
			'pay_mode' => 'Pay Mode',
			'capital_amount' => 'Capital Amount',
			'gross_sales_tax' => 'Gross Sales Tax Total',
			'gross_sales_tax_amt' => 'Gross Sales Tax Amount',
			'gross_sales_tax_pnl' => 'Gross Sales Tax Penalty',
			'transport_truck_tax' => 'Transport Truck Tax Total',
			'transport_truck_tax_amt' => 'Transport Truck Tax Amount',
			'transport_truck_tax_pnl' => 'Transport Truck Tax Penalty',
			'hazard_storage_tax' => 'Hazard Storage Tax Total',
			'hazard_storage_tax_amt' => 'Hazard Storage Tax Amount',
			'hazard_storage_tax_pnl' => 'Hazard Storage Tax Penalty',
			'sign_billboard_tax' => 'Sign Billboard Tax Total',
			'sign_billboard_tax_amt' => 'Sign Billboard Tax Amount',
			'sign_billboard_tax_pnl' => 'Sign Billboard Tax Penalty',
			'mayors_permit_fee' => 'Mayors Permit Fee Total',
			'mayors_permit_fee_amt' => 'Mayors Permit Fee Amount',
			'mayors_permit_fee_pnl' => 'Mayors Permit Fee Penalty',
			'garbage_fee' => 'Garbage Fee Total',
			'garbage_fee_amt' => 'Garbage Fee Amount',
			'garbage_fee_pnl' => 'Garbage Fee Penalty',
			'truck_van_permit_fee' => 'Truck Van Permit Fee Total',
			'truck_van_permit_fee_amt' => 'Truck Van Permit Fee Amount',
			'truck_van_permit_fee_pnl' => 'Truck Van Permit Fee Penalty',
			'sanitary_permit_fee' => 'Sanitary Permit Fee Total',
			'sanitary_permit_fee_amt' => 'Sanitary Permit Fee Amount',
			'sanitary_permit_fee_pnl' => 'Sanitary Permit Fee Penalty',
			'bldg_insp_fee' => 'Bldg Inspection Fee Total',
			'bldg_insp_fee_amt' => 'Bldg Inspection Fee Amount',
			'bldg_insp_fee_pnl' => 'Bldg Inspection Fee Penalty',
			'elec_insp_fee' => 'Electrical Inspection Fee Total',
			'elec_insp_fee_amt' => 'Electrical Inspection Fee Amount',
			'elec_insp_fee_pnl' => 'Electrical Inspection Fee Penalty',
			'mech_insp_fee' => 'Mechanical Inspection Fee Total',
			'mech_insp_fee_amt' => 'Mechanical Inspection Fee Amount',
			'mech_insp_fee_pnl' => 'Mechanical Inspection Fee Penalty',
			'plumb_insp_fee' => 'Plumbing Inspection Fee Total',
			'plumb_insp_fee_amt' => 'Plumbing Inspection Fee Amount',
			'plumb_insp_fee_pnl' => 'Plumbing Inspection Fee Penalty',
			'sign_billboard_fee' => 'Sign Billboard Fee Total',
			'sign_billboard_fee_amt' => 'Sign Billboard Fee Amount',
			'sign_billboard_fee_pnl' => 'Sign Billboard Fee Penalty',
			'sign_billboard_renew_fee' => 'Sign Billboard Renewal Fee Total',
			'sign_billboard_renew_fee_amt' => 'Sign Billboard Renewal Fee Amount',
			'sign_billboard_renew_fee_pnl' => 'Sign Billboard Renewal Fee Penalty',
			'hazard_storage_fee' => 'Hazard Storage Fee Total',
			'hazard_storage_fee_amt' => 'Hazard Storage Fee Amount',
			'hazard_storage_fee_pnl' => 'Hazard Storage Fee Penalty',
			'bfp_fee' => 'BFP Fee Total',
			'bfp_fee_amt' => 'BFP Fee Amount',
			'bfp_fee_pnl' => 'BFP Fee Penalty',
			'grand_total' => 'Grand Total',
			'sys_entry_date' => 'System Entry Date',
			'account_holder_name'=>'Account Holder',
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

		$criteria->compare('account_detail_id',$this->account_detail_id);
		$criteria->compare('account_holder_id',$this->account_holder_id);
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
		$criteria->compare('grand_total',$this->grand_total);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function afterSave()
	{
		
		$acctHolder = BusAcctHolder::model()->findByPk($this->account_holder_id);

			$paymentHolder = new PaymentHolder;	
			$paymentHolder->account_holder_id = $this->account_holder_id;
			$paymentHolder->business_id = $acctHolder->business_id;
			$paymentHolder->save();
	}
}
