<?php defined('SYSPATH') OR die('No direct script access.');

class Message {
    
    /**
     * Message type "success"
     * 
     * @var string
     */
    const TYPE_SUCCESS = 'success';
    
    /**
     * Message type "info"
     * 
     * @var string
     */
    const TYPE_INFO = 'info';
    
    /**
     * Message type "warning"
     * 
     * @var string
     */
    const TYPE_WARNING = 'warning';
    
    /**
     * Message type "error"
     * 
     * @var string
     */
    const TYPE_ERROR = 'error';
    
    /**
     * Adds a "success" type message in session
     * If override is true, it empties the existing list
     * 
     * @param type $message
     * @param type $override
     * 
     * @return void
     */
    public static function add_success($message, $override = false) {
        self::_add(self::TYPE_SUCCESS, $message, $override);
    }
    
    /**
     * Adds a "info" type message in session
     * If override is true, it empties the existing list
     * 
     * @param type $message
     * @param type $override
     * 
     * @return void
     */
    public static function add_info($message, $override = false) {
        self::_add(self::TYPE_INFO, $message, $override);
    }
    
    /**
     * Adds a "warning" type message in session
     * If override is true, it empties the existing list
     * 
     * @param type $message
     * @param type $override
     * 
     * @return void
     */
    public static function add_warning($message, $override = false) {
        self::_add(self::TYPE_WARNING, $message, $override);
    }
    
    /**
     * Adds a "error" type message in session
     * If override is true, it empties the existing list
     * 
     * @param type $message
     * @param type $override
     * 
     * @return void
     */
    public static function add_error($message, $override = false) {
        self::_add(self::TYPE_ERROR, $message, $override);
    }

    /**
     * Adds a message to the list in session
     * If override is true, it empties the existing list
     * 
     * @param string $type
     * @param string $message
     * @param bool $override
     * 
     * @return void
     */
    protected static function _add($type, $message, $override = false) {
        
        // Initializes the list
        $message_list = array();
        
        if ($override === false) {
            // Gets the existing list
            $message_list = self::_get_list($type);
        }
        
        // Adds the message to the list
        $message_list[] = $message;
        
        // Saves in session
        Session::instance()->set(Session::get_name_messages_list($type), $message_list);
    }
    
    /**
     * Return types of messages
     * 
     * @return array
     */
    protected static function _get_types() {
        return array(self::TYPE_SUCCESS, self::TYPE_INFO, self::TYPE_WARNING, self::TYPE_ERROR);
    }

    /**
     * Return a message list for a type
     * 
     * @param string $type
     * @return array
     * @throws Exception
     */
    protected static function _get_list($type) {
        
        if (!in_array($type, self::_get_types())) {
            throw new Kohana_Exception('Message type is not valid.');
        }
        
        return Session::instance()->get(Session::get_name_messages_list($type), array());
    }
    
    /**
     * Returns all messages in session
     * If flush is true, removes then from session
     * 
     * @return array
     */
    public static function get_all($flush = true) {
        $messages = array();
        
        foreach (self::_get_types() as $message_type) {
            $session_name = Session::get_name_messages_list($message_type);
            $messages[$message_type]    = $flush ? 
                                            Session::instance()->get_once($session_name, array()) :
                                            Session::instance()->get($session_name, array());
        }
        
        return $messages;
    }
    
    /**
     * Deletes all messages in session
     * 
     * @return void
     */
    public static function delete_all() {
        foreach (self::_get_types() as $message_type) {
            Session::instance()->delete(Session::get_name_messages_list($message_type));
        }
    }
}
