<?php defined('SYSPATH') or die('No direct access allowed.');

abstract class Session extends Kohana_Session {
    
    /**
     * Session name for connected user
     * 
     * @var string
     */
    const CONNECTED_USER = 'connected_user';
    
    /**
     * Session name for messages list valid
     * 
     * @var string
     */
    const MESSAGES_LIST = 'messages_list';
    
    /**
     * Returns the session name for messages list
     * for given type
     * 
     * @param string $type
     * @return string
     */
    public static function get_name_messages_list($type) {
        return self::MESSAGES_LIST . '_' . $type;
    }
    
}