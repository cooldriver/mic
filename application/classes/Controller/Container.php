<?php defined('SYSPATH') or die('No direct script access.');
 
 abstract class Controller_Container extends Controller {
 
    /**
     * Contains the HTML body part
     * 
     * @var mixed 
     */
    protected $template;
    
    /**
     * Array of errors
     * 
     * @var mixed 
     */
    protected $_errors;
    
    /**
     * Set les headers et vérifie le type d'appel
     */
    public function before() {
        // Set current tempalte name
        $this->_set_template();
        
        parent::before();
        
        $this->response->headers('Content-Type', 'application/json; charset=utf-8');
        
        $this->template = View::factory($this->template);
    }
    
    /**
     * Echo du résultat
     */
    public function after() {
        $this->response->body(json_encode(array('html' => $this->template->render(), 'errors' => $this->_errors)));
        
        parent::after();
    }

    /**
     * Sets current template name
     * 
     * @return void
     */
    protected function _set_template () {
        if (empty($this->template)) {
            $this->template = strtolower($this->request->directory() . '/' . $this->request->controller());
        }
    }
}
