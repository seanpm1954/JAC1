<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
    private $_id;
const ERROR_USERNAME_INACTIVE = 67;
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('username'=>$this->username));  // here I use Email as user name which comes from database
        $record1=Company::model()->findByAttributes(array('id'=>$record['company_id']));
        if($record===null)
        {
            $this->_id='user Null';
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        }
        else if($record->password!==$this->password)            // here I compare db password with passwod field
        {        $this->_id=$this->username;
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        }
        else if($record['active']==2){
            $this->errorCode = self::ERROR_USERNAME_INACTIVE;
        }

        else
        {
            $this->_id=$record['username'];
            $this->setState('title', $record['username']);
            $this->setState('comp_id', $record['company_id']);
            $this->setState('access', $record['access']);
            $this->setState('userID', $record['id']);
            $this->errorCode=self::ERROR_NONE;

        }
        return !$this->errorCode;
    }

    public function getId()       //  override Id
    {
        return $this->_id;
    }
}