<?php

/**
 * This is the model class for table "user".
 *
 * The followings are the available columns in table 'user':
 * @property integer $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $birth_date
 * @property string $role
 * @property string $username
 * @property string $password
 * @property string $sex
 * @property string $account_status
 * @property string $other_contact_details
 * @property string $date_created
 * @property string $time_created
 * @property string $date_approved
 * @property string $time_approved
 * @property string $email_add
 * @property string $country
 * @property string $province
 * @property string $region
 * @property string $city_or_municipality
 * @property string $street_address
 * @property string $zip_code
 * @property string $date_last_modified
 * @property string $time_last_modified
 * @property string $tel_num
 * @property string $fax_num
 * @property string $position
 * @property integer $organization_id
 * @property string $is_bac_member
 *
 * The followings are the available model relations:
 * @property Organization[] $organizations
 * @property UserGov[] $userGovs
 * @property UserBac[] $userBacs
 * @property Bid[] $bs
 * @property Invitation[] $invitations
 * @property Organization $organization
 * @property Award[] $awards
 * @property UserPrivate[] $userPrivates
 */
class User extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return User the static model class
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
		return 'user';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('first_name, middle_name, last_name, username, password', 'required'),
			array('organization_id', 'numerical', 'integerOnly'=>true),
			array('birth_date, role, sex, account_status, other_contact_details, date_created, time_created, date_approved, time_approved, email_add, country, province, region, city_or_municipality, street_address, zip_code, date_last_modified, time_last_modified, tel_num, fax_num, position, is_bac_member', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, first_name, middle_name, last_name, birth_date, role, username, password, sex, account_status, other_contact_details, date_created, time_created, date_approved, time_approved, email_add, country, province, region, city_or_municipality, street_address, zip_code, date_last_modified, time_last_modified, tel_num, fax_num, position, organization_id, is_bac_member', 'safe', 'on'=>'search'),
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
			'organizations' => array(self::HAS_MANY, 'Organization', 'contact_person_id'),
			'userGovs' => array(self::HAS_MANY, 'UserGov', 'id'),
			'userBacs' => array(self::HAS_MANY, 'UserBac', 'id'),
			'bs' => array(self::HAS_MANY, 'Bid', 'user_id'),
			'invitations' => array(self::HAS_MANY, 'Invitation', 'created_by'),
			'organization' => array(self::BELONGS_TO, 'Organization', 'organization_id'),
			'awards' => array(self::HAS_MANY, 'Award', 'award_winner_user_id'),
			'userPrivates' => array(self::HAS_MANY, 'UserPrivate', 'id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'birth_date' => 'Birth Date',
			'role' => 'Role',
			'username' => 'Username',
			'password' => 'Password',
			'sex' => 'Sex',
			'account_status' => 'Account Status',
			'other_contact_details' => 'Other Contact Details',
			'date_created' => 'Date Created',
			'time_created' => 'Time Created',
			'date_approved' => 'Date Approved',
			'time_approved' => 'Time Approved',
			'email_add' => 'Email Add',
			'country' => 'Country',
			'province' => 'Province',
			'region' => 'Region',
			'city_or_municipality' => 'City Or Municipality',
			'street_address' => 'Street Address',
			'zip_code' => 'Zip Code',
			'date_last_modified' => 'Date Last Modified',
			'time_last_modified' => 'Time Last Modified',
			'tel_num' => 'Tel Num',
			'fax_num' => 'Fax Num',
			'position' => 'Position',
			'organization_id' => 'Organization',
			'is_bac_member' => 'Is Bac Member',
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
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('birth_date',$this->birth_date,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('sex',$this->sex,true);
		$criteria->compare('account_status',$this->account_status,true);
		$criteria->compare('other_contact_details',$this->other_contact_details,true);
		$criteria->compare('date_created',$this->date_created,true);
		$criteria->compare('time_created',$this->time_created,true);
		$criteria->compare('date_approved',$this->date_approved,true);
		$criteria->compare('time_approved',$this->time_approved,true);
		$criteria->compare('email_add',$this->email_add,true);
		$criteria->compare('country',$this->country,true);
		$criteria->compare('province',$this->province,true);
		$criteria->compare('region',$this->region,true);
		$criteria->compare('city_or_municipality',$this->city_or_municipality,true);
		$criteria->compare('street_address',$this->street_address,true);
		$criteria->compare('zip_code',$this->zip_code,true);
		$criteria->compare('date_last_modified',$this->date_last_modified,true);
		$criteria->compare('time_last_modified',$this->time_last_modified,true);
		$criteria->compare('tel_num',$this->tel_num,true);
		$criteria->compare('fax_num',$this->fax_num,true);
		$criteria->compare('position',$this->position,true);
		$criteria->compare('organization_id',$this->organization_id);
		$criteria->compare('is_bac_member',$this->is_bac_member,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}