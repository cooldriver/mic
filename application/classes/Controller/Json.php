<?php defined('SYSPATH') or die('No direct script access.');
 
 abstract class Controller_Json extends Controller {
 
    /**
     * Response
     * 
     * @var mixed 
     */
    protected $_response;
 
    /**
     * Array of errors
     * 
     * @var mixed 
     */
    protected $_errors;
 
    /**
     * Redirection URL
     * 
     * @var mixed 
     */
    protected $_redirect_url;
    
    /**
     * Set les headers et vérifie le type d'appel
     */
    public function before() {
        parent::before();
        
        $this->response->headers('Content-Type', 'application/json; charset=utf-8');
    }
    
    /**
     * Echo du résultat
     */
    public function after() {
        $this->response->body(json_encode(array('response' => $this->_response, 'errors' => $this->_errors, 'redirect_url' => $this->_redirect_url)));
        
        parent::after();
    }
}
