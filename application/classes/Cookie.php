<?php defined('SYSPATH') or die('No direct access allowed.');

class Cookie extends Kohana_Cookie {
    
    /**
     * Cookie name containing last connected
     * user's email (encrypted)
     * 
     * @var string
     */
    const LAST_USER_EMAIL = 'last_user_email';
    
    /**
     * Cookie name containing last connected
     * user's password (encrypted)
     * 
     * @var string
     */
    const LAST_USER_PASSWORD = 'last_user_password';
}