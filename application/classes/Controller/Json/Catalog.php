<?php defined('SYSPATH') or die('No direct script access.');
 
 class Controller_Json_Catalog extends Controller_Json {
 
     public function action_add() {
         
         if (count($this->request->post()) > 0) {
             
             $new_catalog = new Model_Catalog();
             $new_catalog->user_id = Model_User::get_current()->id;
             $new_catalog->name = $this->request->post('name');
             $new_catalog->path = $this->request->post('path');
             $new_catalog->status = Model_Catalog::PUBLISHED;
             
             try {
                $new_catalog->save();
             } catch (Exception $e) {
                 $this->_errors = $e->getMessage();
             }
             
             $this->_redirect_url = 'admin_catalog';
         } else {
             $this->_errors = 'No data posted.';
         }
         
     }
}
