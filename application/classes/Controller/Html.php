<?php defined('SYSPATH') or die('No direct script access.');

abstract class Controller_Html extends Controller_Template {
    
    /**
     * @var  View  page template
     */
    public $template = null;
    
    /**
     * Protocol used
     *
     * @var string
     */
    public $protocol = 'http';

    /**
     * Override parent's before method
     * 
     * @return void
     */
    public function before () {
        // Set current tempalte name
        $this->_set_template();
        
        // Set protocol
        $this->_set_protocol();
        
        // Do parent stuff
        parent::before();
    }
    
    /**
     * Assign to template messages in session
     * 
     * @return void
     */
    protected function _load_messages() {
        $this->template->messages = Message::get_all();
    }

    /**
     * Sets current template name
     * 
     * @return void
     */
    protected function _set_template () {
        if (empty($this->template)) {
            $this->template = $this->request->controller();
        }
    }
    
    /**
     * Sets the current protocol used
     * 
     * @return void
     */
    protected function _set_protocol () {
        $this->_protocol = ((isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
                            || (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && strtolower($_SERVER['HTTP_X_FORWARDED_PROTO']) === 'https')) ? 'https' : 'http';
    }
    
    /**
     * Overrides parent's after method
     * 
     * @return void
     */
    public function after() {
        // Assignes protocol to template
        $this->template->protocol = $this->protocol;
        
        // Assignes messages to template
        $this->_load_messages();
        
        parent::after();
        
    }

}
