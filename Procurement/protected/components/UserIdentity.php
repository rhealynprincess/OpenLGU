<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{    
	private $_id;
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
		/*$users = new CActiveDataProvider('User');
			$users=array(
			// username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->username]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		//else if($users[$this->username]!==$this->password)
		else if(false)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;
		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
		*/
		
		$record=User::model()->findByAttributes(array('username'=>$this->username,'account_status'=>'active'));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        //else if($record->password!==crypt($this->password,$record->password))
        else if($record->password!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
            $this->_id=$record->id;
            $this->setState('first_name', $record->first_name);
            $this->setState('middle_name', $record->middle_name);
            $this->setState('last_name', $record->last_name);
            $this->setState('full_name', $record->first_name.' '.strtoupper(substr($record->middle_name,0,1)).'. '.$record->last_name);
            $this->errorCode=self::ERROR_NONE;
        }
		        
        return !$this->errorCode;
	}
	
	public function getId()
    {
        return $this->_id;
    }

    
	
}