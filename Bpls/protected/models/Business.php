<?php

/**
 * This is the model class for table "{{business}}".
 *
 * The followings are the available columns in table '{{business}}':
 * @property integer $business_id
 * @property integer $user_id
 * @property string $name
 * @property string $trade_name
 * @property string $president_name
 * @property string $org_type
 * @property string $ein
 * @property string $tin
 * @property string $lob_code
 * @property string $lob_desc
 * @property double $capital_amount
 * @property string $tel_num
 * @property string $website_url
 * @property string $bldg_num
 * @property string $bldg_name
 * @property string $unit_num
 * @property string $street
 * @property string $subdivision
 * @property string $barangay
 * @property string $property_index_num
 * @property string $has_lessor
 * @property integer $lessor_business_id
 * @property double $business_area
 * @property integer $employee_count
 * @property string $sss_ref
 * @property string $sec_ref
 * @property string $dti_ref
 * @property string $cda_ref
 * @property string $fsic_ref
 * @property string $application_barcode
 * @property string $barangay_barcode
 * @property string $zoning_barcode
 * @property string $sanitary_barcode
 * @property string $occupancy_barcode
 * @property string $others_one_barcode
 * @property string $others_two_barcode
 * @property string $others_three_barcode
 * @property string $others_four_barcode
 * @property string $tax_payment_type
 * @property string $sys_entry_date
 * @property string $status
 * @property string $full_address

 *
 * The followings are the available model relations:
 * @property Taxpayer $user
 */
class Business extends CActiveRecord
{
	public $customErrors=array();	
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Business the static model class
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
		return '{{business}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, trade_name, president_name, ein, tin, lob_desc, capital_amount, tel_num, bldg_num, bldg_name, unit_num, street, subdivision, barangay, postal_code, has_lessor, business_area, employee_count, sss_ref, fsic_ref, pay_mode', 'required'),
			array('org_type', 'required'),
			array('name', 'unique'),
			array('property_index_num', 'required', 'on'=>'bploUpdate'),
			array('user_id', 'required', 'on'=>'adminCreate'),
			array('capital_amount, business_area', 'numerical'),
			array('ein', 'unique', 'message'=>'EIN has already been registered.'),
			array('tin', 'unique', 'message'=>'TIN has already been registered.'),
			array('sss_ref', 'unique', 'message'=>'SSS Number has already been registered.'),
			array('fsic_ref', 'unique', 'message'=>'FSIC Number has already been registered.'),
			array('dti_ref', 'unique', 'message'=>'DTI Number has already been registered.'),
			array('sec_ref', 'unique', 'message'=>'SEC Number has already been registered.'),
			array('cda_ref', 'unique', 'message'=>'CDA Number has already been registered.'),
			array('name, trade_name, president_name, org_type, ein, tin, lob_code, lob_desc, tel_num, website_url, bldg_num, bldg_name, unit_num, street, subdivision, barangay, property_index_num, has_lessor, sss_ref, sec_ref, dti_ref, cda_ref, fsic_ref, application_barcode, barangay_barcode, zoning_barcode, sanitary_barcode, occupancy_barcode, others_one_barcode, others_two_barcode, others_three_barcode, others_four_barcode, tax_payment_type, sys_entry_date, status, full_address, pay_mode, postal_code', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('business_id, user_id, name, trade_name, president_name, org_type, ein, tin, lob_code, lob_desc, capital_amount, tel_num, website_url, bldg_num, bldg_name, unit_num, street, subdivision, barangay, property_index_num, has_lessor, lessor_business_id, business_area, employee_count, sss_ref, sec_ref, dti_ref, cda_ref, fsic_ref, application_barcode, barangay_barcode, zoning_barcode, sanitary_barcode, occupancy_barcode, others_one_barcode, others_two_barcode, others_three_barcode, others_four_barcode, tax_payment_type, sys_entry_date, status, full_address, pay_mode, postal_code', 'safe', 'on'=>'search'),
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
			'busAcctHolder'=>array(self::HAS_MANY, 'BusAcctHolder', 'business_id'),
		);
	}
	


	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'business_id' => 'Business ID',
			'user_id' => 'User ID',
			'name' => 'Business Name',
			'trade_name' => 'Trade/Franchise Name',
			'president_name' => 'Name of President',
			'org_type' => 'Type of Organization',
			'ein' => 'EIN',
			'tin' => 'TIN',
			'lob_code' => 'Line of Business Code',
			'lob_desc' => 'Line of Business',
			'capital_amount' => 'Capitalization Amount',
			'tel_num' => 'Telephone Number',
			'website_url' => 'Website URL',
			'bldg_num' => 'Bldg. Number',
			'bldg_name' => 'Bldg. Name',
			'unit_num' => 'Unit Number',
			'street' => 'Street',
			'subdivision' => 'Subdivision',
			'barangay' => 'Barangay',
			'property_index_num' => 'Property Index Number',
			'has_lessor' => 'Is business place rented?',
			'lessor_business_id' => 'Lessor Business ID',
			'business_area' => 'Business Area (Sqm.)',
			'employee_count' => 'Number of Employees',
			'sss_ref' => 'SSS Number',
			'sec_ref' => 'SEC Number',
			'dti_ref' => 'DTI Number',
			'cda_ref' => 'CDA Number',
			'fsic_ref' => 'FSIC Number',
			'application_barcode' => 'Application Barcode',
			'barangay_barcode' => 'Barangay Clearance Barcode',
			'zoning_barcode' => 'Zoning Clearance Barcode',
			'sanitary_barcode' => 'Sanitary Clearance Barcode',
			'occupancy_barcode' => 'Occupancy Permit Barcode',
			'others_one_barcode' => 'Others Barcode',
			'others_two_barcode' => 'Others Barcode',
			'others_three_barcode' => 'Others Barcode',
			'others_four_barcode' => 'Others Barcode',
			'tax_payment_type' => 'Tax Payment Type',
			'sys_entry_date' => 'Date of Application',
			'status' => 'Status',
			'full_address' => 'Business Address',
			'pay_mode' => 'Mode of Payment',
			'postal_code'=>'Postal Code',
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

		$criteria->compare('business_id',$this->business_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('trade_name',$this->trade_name,true);
		$criteria->compare('president_name',$this->president_name,true);
		$criteria->compare('org_type',$this->org_type,true);
		$criteria->compare('ein',$this->ein,true);
		$criteria->compare('tin',$this->tin,true);
		$criteria->compare('lob_code',$this->lob_code,true);
		$criteria->compare('lob_desc',$this->lob_desc,true);
		$criteria->compare('capital_amount',$this->capital_amount);
		$criteria->compare('tel_num',$this->tel_num,true);
		$criteria->compare('website_url',$this->website_url,true);
		$criteria->compare('bldg_num',$this->bldg_num,true);
		$criteria->compare('bldg_name',$this->bldg_name,true);
		$criteria->compare('unit_num',$this->unit_num,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('subdivision',$this->subdivision,true);
		$criteria->compare('barangay',$this->barangay,true);
		$criteria->compare('property_index_num',$this->property_index_num,true);
		$criteria->compare('has_lessor',$this->has_lessor,true);
		$criteria->compare('lessor_business_id',$this->lessor_business_id);
		$criteria->compare('business_area',$this->business_area);
		$criteria->compare('employee_count',$this->employee_count);
		$criteria->compare('sss_ref',$this->sss_ref,true);
		$criteria->compare('sec_ref',$this->sec_ref,true);
		$criteria->compare('dti_ref',$this->dti_ref,true);
		$criteria->compare('cda_ref',$this->cda_ref,true);
		$criteria->compare('fsic_ref',$this->fsic_ref,true);
		$criteria->compare('application_barcode',$this->application_barcode,true);
		$criteria->compare('barangay_barcode',$this->barangay_barcode,true);
		$criteria->compare('zoning_barcode',$this->zoning_barcode,true);
		$criteria->compare('sanitary_barcode',$this->sanitary_barcode,true);
		$criteria->compare('occupancy_barcode',$this->occupancy_barcode,true);
		$criteria->compare('others_one_barcode',$this->others_one_barcode,true);
		$criteria->compare('others_two_barcode',$this->others_two_barcode,true);
		$criteria->compare('others_three_barcode',$this->others_three_barcode,true);
		$criteria->compare('others_four_barcode',$this->others_four_barcode,true);
		$criteria->compare('tax_payment_type',$this->tax_payment_type,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('full_address',$this->full_address,true);
		$criteria->compare('pay_mode',$this->pay_mode,true);
		$criteria->compare('postal_code',$this->postal_code,true);
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function getOrgType()
	{
		return array(
				'Single' => 'Single',
				'Partnership' => 'Partnership',
				'Corporation' => 'Corporation',
				'Cooperative' => 'Cooperative',
			);
	}
	
	public function hasLessor()
	{
		return array(
				'Yes' => 'Yes',
				'No' => 'No',
		);
	}
	
	
	public function getPaymentType()
	{
		return array(
				'Annually' => 'Annually',
				'Bi-Annually' => 'Bi-Annually',
				'Quarterly' => 'Quarterly',
		);
	}
    
    
    public function addCustomError($attribute, $error) {
        $this->customErrors[] = array($attribute, $error);
    }

    /**
     */
    protected function beforeValidate() {
        $r = parent::beforeValidate();
		
		if ($this->org_type == 'Single') {//this is the checkbox

            $this->validatorList->add(CValidator::createValidator('required',$this,'dti_ref',array()));
       
        }
	
		if ($this->org_type == 'Partnership') {//this is the checkbox

            $this->validatorList->add(CValidator::createValidator('required',$this,'sec_ref',array()));
       
        }
        
        if ($this->org_type == 'Corporation') {//this is the checkbox

            $this->validatorList->add(CValidator::createValidator('required',$this,'sec_ref',array()));

        }
        
        if ($this->org_type == 'Cooperative') {//this is the checkbox

            $this->validatorList->add(CValidator::createValidator('required',$this,'cda_ref',array()));

        }
        foreach ($this->customErrors as $param) {
            $this->addError($param[0], $param[1]);
        }
        return $r;
    }
    
    public function getLob()
    {
    	return '/assets/uploads/lob_codes.pdf';
    }
    
    public function makeBusAcctHolder()
    {
    	$busAcctHolder = new BusAcctHolder;
    	$busAcctHolder->business_id = $this->business_id;
    	$busAcctHolder->user_id = $this->user_id;
    	$busAcctHolder->application_date = date('Y-m-d');
    	$busAcctHolder->save();
    }
    
    
    public function sendMail($scene)
	{
		
			$message = new YiiMailMessage;
			
			if($scene == 'CREATION')
			{
				$message->view = 'creation';
				 
				//userModel is passed to the view
				$message->setBody(array('model'=>$this), 'text/html');
		
				$message->subject = 'Business Permit Request'; 
			
			} elseif($scene == 'BUSINESSINFORMATION')
			{
				$message->view = 'businessinformation';
				 
				//userModel is passed to the view
				$message->setBody(array('model'=>$this), 'text/html');
		
				$message->subject = 'Business Permit Request Progress - Business Information'; 
			} elseif($scene == 'DOCUMENT')
			{
				$message->view = 'document';
				 
				//userModel is passed to the view
				$message->setBody(array('model'=>$this), 'text/html');
		
				$message->subject = 'Business Permit Request Progress - Required Documents'; 
			} elseif($scene == 'ASSESSMENT')
			{
				$message->view = 'assessment';
				 
				//userModel is passed to the view
				$message->setBody(array('model'=>$this), 'text/html');
		
				$message->subject = 'Business Permit Request Progress - Assessment of Fees'; 
			} elseif($scene == 'PAYMENT')
			{
				$message->view = 'payment';
				 
				//userModel is passed to the view
				$message->setBody(array('model'=>$this), 'text/html');
		
				$message->subject = 'Business Permit Request Progress - Payment of Fees'; 
			} elseif($scene == 'APPROVAL')
			{
				$message->view = 'approval';
				 
				//userModel is passed to the view
				$message->setBody(array('model'=>$this), 'text/html');
		
				$message->subject = 'Business Permit Request Progress - Approval and Issuance'; 
			}
			 
			$message->addTo($this->user->email);
			$message->from = 'openlgubplsg@gmail.com';
			Yii::app()->mail->send($message);
		
	
		
	}
    
  public function bploAdmin()
  {
  		$criteria = new CDbCriteria;
		
		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));

  }
    
}
