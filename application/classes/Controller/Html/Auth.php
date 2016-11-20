<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Html_Auth extends Controller_Html {

    protected $_user;

    public function before() {
        parent::before();
        
        // Checks if user is connected
        if (!Model_User::is_logged()) {

            // ... and if not, try to log user from cookies ...
            try {
                Model_User::login_cookie();
            } catch (Exception $e) {
                $this->redirect(URL::site('login', $this->protocol));
            }

        }
        
        $this->_user = Model_User::get_current();

    }

}
