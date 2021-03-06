<?php

/**
 * This is the model class for table "{{taxpayer}}".
 *
 * The followings are the available columns in table '{{taxpayer}}':
 * @property integer $user_id
 * @property string $email
 * @property string $password
 * @property string $application_date
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $suffix_name
 * @property string $full_name
 * @property string $dob_month
 * @property string $dob_day
 * @property string $dob_year
 * @property string $dob_full
 * @property string $civil_status
 * @property string $gender
 * @property string $tin
 * @property string $role
 * @property string $sys_entry_date
 */
class Taxpayer extends CActiveRecord
{

	public $rePassword;
	public $oldPassword;
	public $newPassword;
	
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Taxpayer the static model class
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
		return '{{taxpayer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('email, password, application_date, first_name, middle_name, last_name, dob_month, dob_day, dob_year, civil_status, gender, tin', 'required'),
			array('email', 'email'),
			array('rePassword', 'required', 'except'=>'update'),
			array('oldPassword, newPassword', 'required', 'on'=>'changePassword'),
			array('role', 'required', 'on'=>'create'),
			array('tin', 'unique', 'message'=>'TIN has already been registered.'),
			array('email', 'unique', 'message'=>'Email has already been taken.'),
			array('rePassword', 'required', 'on'=>'register, changePassword'),
            array('rePassword', 'compare', 'compareAttribute'=>'password', 'on'=>'register, create', 'message'=>'Passwords must match.'),
            array('rePassword', 'compare', 'compareAttribute'=>'newPassword', 'on'=>'changePassword', 'message'=>'It does not match with New Password'),
            array('password, rePassword, oldPassword, newPassword', 'length', 'min'=>4),
			array('email, password, application_date, first_name, middle_name, last_name, suffix_name, full_name, dob_month, dob_day, dob_year, dob_full, civil_status, gender, tin, role, sys_entry_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('user_id, email, password, application_date, first_name, middle_name, last_name, suffix_name, full_name, dob_month, dob_day, dob_year, dob_full, civil_status, gender, tin, role, sys_entry_date', 'safe', 'on'=>'search'),
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
			'address'=>array(self::HAS_MANY, 'Address', 'user_id'),
			'emergencyContact'=>array(self::HAS_ONE, 'EmergencyContact', 'user_id'),
			'contactReference'=>array(self::HAS_MANY, 'ContactReference', 'user_id'),
			'business'=>array(self::HAS_MANY, 'Business', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'user_id' => 'User ID',
			'email' => 'Email Address',
			'password' => 'Password',
			'application_date' => 'BIR Application Date',
			'first_name' => 'First Name',
			'middle_name' => 'Middle Name',
			'last_name' => 'Last Name',
			'suffix_name' => 'Name Suffix',
			'full_name' => 'Full Name',
			'dob_month' => 'Birth Month',
			'dob_day' => 'Birth Day',
			'dob_year' => 'Birth Year',
			'dob_full' => 'Birthdate',
			'civil_status' => 'Civil Status',
			'gender' => 'Gender',
			'tin' => 'TIN',
			'role' => 'Role',
			'sys_entry_date' => 'Sys Entry Date',
			'rePassword' => 'Confirm Password',
			'oldPassword' => 'Old Password',
			'newPassword' => 'New Password',
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

		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('application_date',$this->application_date,true);
		$criteria->compare('first_name',$this->first_name,true);
		$criteria->compare('middle_name',$this->middle_name,true);
		$criteria->compare('last_name',$this->last_name,true);
		$criteria->compare('suffix_name',$this->suffix_name,true);
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('dob_month',$this->dob_month,true);
		$criteria->compare('dob_day',$this->dob_day,true);
		$criteria->compare('dob_year',$this->dob_year,true);
		$criteria->compare('dob_full',$this->dob_full,true);
		$criteria->compare('civil_status',$this->civil_status,true);
		$criteria->compare('gender',$this->gender,true);
		$criteria->compare('tin',$this->tin,true);
		$criteria->compare('role',$this->role,true);
		$criteria->compare('sys_entry_date',$this->sys_entry_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	

	public function hashPassword($password)
    {
        return md5(md5($password) . Yii::app()->params["salt"]);
    }
    
    public function beforeSave()
    {
        if($this->rePassword != '')
            $this->password = md5(md5($this->rePassword).Yii::app()->params["salt"]);
        return true;
    }
	
	public function getMonthDrop()
	{
		return $month = array(
			'January' => 'January',
			'February' => 'February',
			'March' => 'March',
			'April' => 'April',
			'May' => 'May',
			'June' => 'June',
			'July' => 'July',
			'August' => 'August',
			'September' => 'September',
			'October' => 'October',
			'November' => 'November',
			'December' => 'December',
		);
		
	}
	
	public function getDayDrop()
	{
		$day = array();
		for($i=1; $i<=31; $i++)
		{
			array_push($day, $i);
		}
	
		return array_combine($day,$day);
	}
	
	public function getYearDrop()
	{
		$year = array();
		for($i=1901; $i<=2013; $i++)
		{
			array_push($year, $i);
		}
	
		return array_combine($year,$year);
	}
	
	public function getCivilStatus()
	{
		return $civilStatus = array(
			'Single' => 'Single',
			'Married' => 'Married',
			'Widowed' => 'Widowed',
			'Divorced' => 'Divorced',
			'Annulled' => 'Annulled',
		);
	}
	
	public function getGender()
	{
		return $gender = array(
			'Male' => 'Male',
			'Female' => 'Female',
		);
	}
	
	public function getRoleList()
	{
		return $role = array(
			'ADMIN'=>'ADMIN',
			'ASSESSOR'=>'ASSESSOR',
			'TREASURY'=>'TREASURY',
			'LCE'=>'LCE',
			'BPLO'=>'BPLO',
			'REGISTERED'=>'REGISTERED',
		);
	}
	
	public function getAttribList()
	{
		return $attribList = array(
			'user_id'=>'User ID',
			'email'=>'Email Address',
			'first_name'=>'First Name',
			'middle_name'=>'Middle Name',
			'last_name'=>'Last Name',
			'tin'=>'TIN',
		);
	}
}
