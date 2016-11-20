<?php defined('SYSPATH') or die('No direct access allowed.');
 
class Model_User extends ORM {
 
    /**
     * Returns true is a user is currently connected
     * 
     * @return bool
     */
    public static function is_logged () {
        $user = Session::instance()->get(Session::CONNECTED_USER);
        return ($user instanceof Model_User);
    }
    
    /**
     * Returns the current connected user
     *
     * @return Model_User
     */
    public static function get_current() {

        // If the member is not logged,
        // we try to reload from cookies
        if (!self::is_logged()) {
            self::login_cookie();
        }

        // Still not logged, throws exception
        if (!self::is_logged()) {
            throw new Kohana_Exception('Unable to get current User.');
        }

        return Session::instance()->get(Session::CONNECTED_USER);
    }
    
    /**
     * Logs the User out
     * 
     * @return void
     */
    public function logout() {
        // Uset all connexion cookies
        self::_unset_login_cookie();

        // Destroy the Session
        Session::instance()->destroy();
    }
    
    /**
     * Logs the user in
     * 
     * @param string $email
     * @param string $password
     * @return Model_User
     */
    public static function login($email, $password) {

        // Get the member in database
        $user = ORM::factory('User')->where('email', '=', $email)->find();
        
        if (!$user->loaded()) {
            throw new Kohana_Exception('Unable to log user.');
        }
        
        if (md5($password) !== $user->password) {
            throw new Kohana_Exception('Unable to log user.');
        }
        
        // Store user in session
        Session::instance()->set(Session::CONNECTED_USER, $user);
        
        // Store cookie data
        self::_set_login_cookie($email, $password);
        
        return $user;
    }
    
    /**
     * Sets login cookies
     * 
     * @param string $email
     * @param string $password
     * @return void
     */
    protected static function _set_login_cookie ($email, $password) {
        Cookie::set(Cookie::LAST_USER_EMAIL, Encrypt::instance()->encode($email));
        Cookie::set(Cookie::LAST_USER_PASSWORD, Encrypt::instance()->encode($password));
    }
    
    /**
     * Unsets login cookies
     * 
     * @return void
     */
    protected static function _unset_login_cookie () {
        Cookie::delete(Cookie::LAST_USER_EMAIL);
        Cookie::delete(Cookie::LAST_USER_PASSWORD);
    }
    
    /**
     * Try to log the user in using cookies
     * 
     * @return Model_User
     */
    public static function login_cookie () {
        return self::login(
            Encrypt::instance()->decode(Cookie::get(Cookie::LAST_USER_EMAIL)),
            Encrypt::instance()->decode(Cookie::get(Cookie::LAST_USER_PASSWORD)));
    }
    
//    public function rules()
//    {
//        return array(
//            'username' => array(
//                array('not_empty'),
//                array('min_length', array(':value', 4)),
//                array('max_length', array(':value', 32)),
//                array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
//            ),
//            'first_name' => array(
//                array('not_empty'),
//                array('min_length', array(':value', 4)),
//                array('max_length', array(':value', 32)),
//                array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
//            ),
//            'last_name' => array(
//                array('not_empty'),
//                array('min_length', array(':value', 4)),
//                array('max_length', array(':value', 32)),
//                array('regex', array(':value', '/^[-\pL\pN_.]++$/uD')),
//            ),
//            'email' => array(
//                array('not_empty'),
//                array('min_length', array(':value', 4)),
//                array('max_length', array(':value', 127)),
//                array('email'),
//            ),
//        );
//    }
}