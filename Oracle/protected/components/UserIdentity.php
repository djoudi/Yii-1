<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
 private $_id;
    public function authenticate()
    {
        $record=User::model()->findByAttributes(array('USERNAME'=>$this->username));
        if($record===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else if($record->PASSWORD!==md5($this->password))
            $this->errorCode=self::ERROR_PASSWORD_INVALID;
        else
        {
          $this->errorCode=self::ERROR_NONE;
	
        }
        return !$this->errorCode;
    }
}