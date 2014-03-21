<?php
/**
 * User Authentication.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */

/**
 * UserIdentity represents the data needed to identify a user.
 * It contains the authentication method that checks if the provided
 * data can identify the user.
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
     
    private $_id;
    const ERROR_INACTIVE = 3;
    const ERROR_PENDING = 4;
    
    /**
     * Authenticates a user if the account status is ACTIVE
     * @return integer error code for the authentication
     */
    public function authenticate()
    {
        $user = User::model()->findByAttributes(array('username'=>$this->username));
        
        if ($user === null) {
            $this->errorCode = self::ERROR_USERNAME_INVALID;
        }
        else if ($user->password !== md5(md5($this->password) . Yii::app()->params["salt"])) {
            $this->errorCode = self::ERROR_PASSWORD_INVALID;            
        }
        else if ($user->status === "INACTIVE") {
            $this->errorCode = self::ERROR_INACTIVE;
        }
        else if ($user->status === "PENDING") {
            $this->errorCode = self::ERROR_PENDING;
        }
        else {
            $this->errorCode = self::ERROR_NONE;
            $this->setState('role', $user->role);
            $this->_id = $user->user_id;
        }
        return !$this->errorCode;
    }
    
    /**
     * Retrieves the id of the current user.
     * @return integer id of current user
     */
    public function getId()
    {
        return $this->_id;
    }
}
