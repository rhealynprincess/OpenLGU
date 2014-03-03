<?php

/**
 * This is the model class for table "{{document}}".
 *
 * The followings are the available columns in table '{{document}}':
 * @property integer $document_id
 * @property integer $business_id
 * @property string $barangay_clearance
 * @property string $barangay_status
 * @property string $zoning_clearance
 * @property string $zoning_status
 * @property string $sanitary_clearance
 * @property string $sanitary_status
 * @property string $occupancy_permit
 * @property string $occupancy_status
 * @property string $fire_safety
 * @property string $fire_safety_status
 *
 * The followings are the available model relations:
 * @property Business $business
 */
class Document extends CActiveRecord
{
	public $imageUploadFile;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Document the static model class
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
		return '{{document}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('barangay_clearance, zoning_clearance, sanitary_clearance, occupancy_permit, fire_safety', 'file','types'=>'pdf', 'allowEmpty'=>false, 'on'=>'insert'),
			array('barangay_clearance, barangay_status, zoning_clearance, zoning_status, sanitary_clearance, sanitary_status, occupancy_permit, occupancy_status, fire_safety, fire_safety_status, file_path, sys_entry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('document_id, account_holder_id, barangay_clearance, barangay_status, zoning_clearance, zoning_status, sanitary_clearance, sanitary_status, occupancy_permit, occupancy_status, fire_safety, fire_safety_status, file_path, sys_entry_date', 'safe', 'on'=>'search'),
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
			'document_id' => 'Document ID',
			'account_holder_id' => 'Business Account Holder ID',
			'barangay_clearance' => 'Barangay Clearance',
			'barangay_status' => 'Barangay Clearance Status',
			'zoning_clearance' => 'Zoning Clearance',
			'zoning_status' => 'Zoning Clearance Status',
			'sanitary_clearance' => 'Sanitary Clearance',
			'sanitary_status' => 'Sanitary Clearance Status',
			'occupancy_permit' => 'Occupancy Permit',
			'occupancy_status' => 'Occupancy Permit Status',
			'fire_safety' => 'Fire Safety Inspection Certificate',
			'fire_safety_status' => 'Fire Safety Inspection Certificate Status',
			'file_path'=>'File Path',
			'sys_entry_date'=>'Sys Entry Date',
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

		$criteria->compare('document_id',$this->document_id);
		$criteria->compare('account_holder_id',$this->account_holder_id);
		$criteria->compare('barangay_clearance',$this->barangay_clearance,true);
		$criteria->compare('barangay_status',$this->barangay_status,true);
		$criteria->compare('zoning_clearance',$this->zoning_clearance,true);
		$criteria->compare('zoning_status',$this->zoning_status,true);
		$criteria->compare('sanitary_clearance',$this->sanitary_clearance,true);
		$criteria->compare('sanitary_status',$this->sanitary_status,true);
		$criteria->compare('occupancy_permit',$this->occupancy_permit,true);
		$criteria->compare('occupancy_status',$this->occupancy_status,true);
		$criteria->compare('fire_safety',$this->fire_safety,true);
		$criteria->compare('fire_safety_status',$this->fire_safety_status,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);

		
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public function isDirEmpty($dir)
	{
		if(!is_readable($dir)) return NULL; 
			$handle = opendir($dir);
		while(false !== ($entry = readdir($handle)))
		{
			if($entry != "." && $entry != "..")
			{
		  		return FALSE;
			}
  		}
		return TRUE;
	}
	
	public function getStatusList()
	{
		return array(
			'PENDING' => 'PENDING',
			'APPROVED' => 'APPROVED',
		);
	}
	

}
