<?php

/**
 * This is the model class for table "organization".
 *
 * The followings are the available columns in table 'organization':
 * @property integer $id
 * @property string $name
 * @property string $acronym
 * @property string $tax_id_number
 * @property string $website
 * @property string $description
 * @property string $country
 * @property string $region
 * @property string $province
 * @property string $city_or_municipality
 * @property string $street_address
 * @property integer $zip_code
 * @property string $date_last_modified
 * @property string $time_last_modified
 * @property integer $contact_person_id
 * @property string $former_name
 * @property string $date_created
 * @property string $time_created
 * @property string $date_approved
 * @property string $time_approved
 *
 * The followings are the available model relations:
 * @property User $contactPerson
 * @property PrivateOrganization $privateOrganization
 * @property User[] $users
 * @property GovernmentAgency $governmentAgency
 */
class Organization extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Organization the static model class
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
		return 'organization';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('zip_code, contact_person_id', 'numerical', 'integerOnly'=>true),
			array('name, acronym, tax_id_number, website, description, country, region, province, city_or_municipality, street_address, date_last_modified, time_last_modified, former_name, date_created, time_created, date_approved, time_approved', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, acronym, tax_id_number, website, description, country, region, province, city_or_municipality, street_address, zip_code, date_last_modified, time_last_modified, contact_person_id, former_name, date_created, time_created, date_approved, time_approved', 'safe', 'on'=>'search'),
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
			'contactPerson' => array(self::BELONGS_TO, 'User', 'contact_person_id'),
			'privateOrganization' => array(self::HAS_ONE, 'PrivateOrganization', 'id'),
			'users' => array(self::HAS_MANY, 'User', 'organization_id'),
			'governmentAgency' => array(self::HAS_ONE, 'GovernmentAgency', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'acronym' => 'Acronym',
			'tax_id_number' => 'Tax Id Number',
			'website' => 'Website',
			'description' => 'Description',
			'country' => 'Country',
			'region' => 'Region',
			'province' => 'Province',
			'city_or_municipality' => 'City Or Municipality',
			'street_address' => 'Street Address',
			'zip_code' => 'Zip Code',
			'date_last_modified' => 'Date Last Modified',
			'time_last_modified' => 'Time Last Modified',
			'contact_person_id' => 'Contact Person',
			'former_name' => 'Former Name',
			'date_created' => 'Date Created',
			'time_created' => 'Time Created',
			'date_approved' => 'Date Approved',
			'time_approved' => 'Time Approved',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('acronym',$this->acronym,true);
		$criteria->compare('tax_id_number',$this->tax_id_number,true);
		$criteria->compare('website',$this->website,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('city_or_municipality',$this->city_or_municipality,true);
		$criteria->compare('street_address',$this->street_address,true);
		$criteria->compare('zip_code',$this->zip_code);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('time_last_modified',$this->time_last_modified,true);
		$criteria->compare('contact_person_id',$this->contact_person_id);
		$criteria->compare('former_name',$this->former_name,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('time_created',$this->time_created,true);
		$criteria->compare('date_approved',$this->date_approved,true);
		$criteria->compare('time_approved',$this->time_approved,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}