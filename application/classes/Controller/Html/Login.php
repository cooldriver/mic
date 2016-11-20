<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Html_Login extends Controller_Html {

    /**
     * Overrides the parent before method
     * 
     * @return void
     */
    public function before() {
        parent::before();
        
        // Check if already logged in
        if (Model_User::is_logged() && $this->request->action() !== 'logout') {
            $this->redirect(URL::site('', $this->protocol));
        }
        
        // Processes the login form
        $this->_process_login();
    }
    
    /**
     * Login page
     * 
     * @return void
     */
    public function action_index() {}
    
    /**
     * Logout action
     * 
     * @return void
     */
    public function action_logout() {
        Model_User::get_current()->logout();
        
        $this->redirect(URL::site('login', $this->protocol));
    }
    
    /**
     * Processes the login form
     * 
     * @return void
     */
    protected function _process_login()
    {
        if (count($this->request->post()) > 0) {
            
            try {
                // Tries to login the user
                Model_User::login($this->request->post('email'), $this->request->post('password'));
                
                // Login ok, redirects to dashboard
                $this->redirect(URL::site('', $this->protocol));
            } catch (Kohana_Exception $ex) {
                // Error while login
                Message::add_error($ex->getMessage());
            
                // Reload the login page
                $this->redirect(URL::site('login', $this->protocol));
            }
        }
    }

}
