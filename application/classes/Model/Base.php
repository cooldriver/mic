<?php defined('SYSPATH') or die('No direct script access.');

/**
 * Base class handling all common features
 */
abstract class Model_Base extends ORM {
   
    /**
     * Primary key par défaut de tous les objets
     * @var type 
     */
    protected $_primary_key = 'id';
    
    /* Object statuses */
    const NONEXISTANT           = -1;
    const DELETED               = 0;
    const TRASHED               = 1;
    const DRAFT                 = 2;
    const PUBLISHED             = 3;
    
    /**
     * Save model and update creation and modification date 
     * @param \Validation $validation
     * @return Model_Iexportable
     */
    public function save(\Validation $validation = NULL) {
        
        /* Get object columns */
        $ret = array_keys(self::$_column_cache[$this->_object_name]);

        /* Instanciate current date */
        $current_date = new DateTime();
        
        /* Update creation date */
        if (in_array('creation_date', $ret) && empty($this->id)) {
            $this->creation_date = $current_date->format('Y-m-d H:i:s');
        }
        
        /* Update last modification date */
        if (in_array('modification_date', $ret)) {
            $this->modification_date = $current_date->format('Y-m-d H:i:s');
        }
        
        return parent::save($validation);
    }
    
}
