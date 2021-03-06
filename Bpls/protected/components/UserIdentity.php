<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	public $user;
	private $_id;
	private $_role;

	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{
		$users = Taxpayer::model()->findByAttributes(array('email'=>$this->username));
		if($users===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->password!==md5(md5($this->password).Yii::app()->params["salt"]))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
		{
			//Yii::app()->user->setState('role', $users->role);
			$this->_id=$users->user_id;
			//$this->_role=$users->role;
            //$this->setState('role', $users->role);
            //$this->setState('first_name', $users->first_name);
            Yii::app()->user->setState('role', $users->role);
			$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;
	}
	
	public function getId()
	{
		return $this->_id;
	}
}
