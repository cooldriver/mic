<?php defined('SYSPATH') or die('No direct script access.');
 
 abstract class Controller_Container_Main extends Controller_Container {
 
    /**
     * Name of the sidebar view required for this view
     * 
     * @var mixed 
     */
    protected $_require_sb;
    
    /**
     * Echo du résultat
     */
    public function after() {
        $this->response->body(json_encode(array('html' => $this->template->render(), 'errors' => $this->_errors, 'require_sb' => $this->_require_sb)));
    }
    
}
