<?php
/**
 * Model class for Login Form.
 *
 * @package EmployeeInformationSystem
 * @subpackage Site
 * @version 1.0
 * @since 1.0
 * @author Ferdinand C. Pendon <fcpendon@gmail.com>
 */
/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class LoginForm extends CFormModel
{
    public $username;
    public $password;
    public $rememberMe;

    private $_identity;

    /**
     * Declares the validation rules.
     * The rules state that email and password are required,
     * and password needs to be authenticated.
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        return array(
            //array('email', 'email'),
            array('username, password', 'required'),
            array('rememberMe', 'boolean'),
            array('password', 'authenticate'),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels()
    {
        return array(
            'rememberMe'=>'Remember me next time',
        );
    }

    /**
     * Authenticates the password.
     * This is the 'authenticate' validator as declared in rules().
     */
    public function authenticate($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $this->_identity = new UserIdentity($this->username, $this->password);
            $this->_identity->authenticate();
            switch ($this->_identity->errorCode) {
                case UserIdentity::ERROR_INACTIVE:
                    $this->addError('username', 'Account is currently Inactive.');
                    break;
                case UserIdentity::ERROR_PENDING:
                    $this->addError('username', 'Account is still Pending.');
                    break;
                case UserIdentity::ERROR_NONE:
                    $duration = $this->rememberMe ? 3600*24*30 : 0;
                    Yii::app()->user->login($this->_identity, $duration);
                    break;
                default:
                    $this->addError('username', 'Username or Password is incorrect.');
                    $this->addError('password', '');
                    break;
            }
        }
    }
}
