<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
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
		$users=UserTable::model()->findByAttributes(array('username'=>$this->username));

		
		if($users===null)
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		elseif($users->password!==md5($this->password))
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else{
			$this->errorCode=self::ERROR_NONE;
			$this->setState('user_role',$users->user_role);
			$this->setState('user_first_name',$users->first_name);
			$this->setState('user_middle_name',$users->middle_name);
			$this->setState('user_last_name',$users->last_name);
			$this->setState('user_sector',$users->sector);

			
			}
		return !$this->errorCode;
	}
}
