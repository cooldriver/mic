<?php defined('SYSPATH') or die('No direct script access.');

class Controller_Container_Main_Admin_Catalog extends Controller_Container_Main_Admin {

    /**
     * Catalogs listing
     * 
     * @return void
     */
    public function action_index() {
        // Loads catalogs list for current user
        $catalogs = ORM::factory('Catalog')->where('user_id', '=', Model_User::get_current()->id)->find_all();
        
        $this->template->catalogs = $catalogs;
    }
    
    /**
     * Catalog add form
     * 
     * @return void
     */
    public function action_add() {
        
    }

}
