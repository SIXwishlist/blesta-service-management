<?php
/**
 * Support Manager Client Main controller
 *
 * @package blesta
 * @subpackage blesta.plugins.support_manager
 * @copyright Copyright (c) 2010, Phillips Data, Inc.
 * @license http://www.blesta.com/license/ The Blesta License Agreement
 * @link http://www.blesta.com/ Blesta
 */
class ClientMain extends ServiceManagementController
{

    public function log($info) {
	echo "<script>console.log( 'Debug Objects: " . $info . "' );</script>";
    }

    /**
     * Redirect to the ClientTickets controller
     */
    public function index()
    {
	$this->log("index function");
        
	// Get custom fields from Client controller => save
        $client_custom_fields = $this->Clients->getCustomFieldValues(1);

	/*
	foreach ($client_custom_fields as $field) {
	    $this->log("start");
	    $vars = get_object_vars($field);
	    $keys = array_keys($vars);

	    foreach ($keys as $key) {
	        $this->log("looping key pair: " . $key . " : " . $vars[$key]);
	    }

	}
	*/

	return  $this->set('client_custom_fields', $client_custom_fields);
        // Set variables all at once
        //$var2 = "hello";
       // $var3 = "world";
       // return $this->partial("client_main", compact("var1", "var2"));

     //   $this->redirect($this->base_uri . 'plugin/number_manager/client_main/');
    }

    // Get custom fields for client_main_edit page
    public function edit()
    {
	$this->log("edit function");

    	// Check whether client is logged in
      //  $logged_in = false;
       // if ($this->isLoggedIn()) {
         //   $logged_in = true;
       // }

      // Get custom fields from Client controller => save
    	$client_custom_fields = $this->Clients->getCustomFieldValues(1);
      return  $this->set('client_custom_fields', $client_custom_fields);
    }

    // Lifecycle method
    public function preAction()
    {
        $this->log("preAction function");
        parent::preAction();

        // Restore structure view location of the client portal
        $this->structure->setDefaultView(APPDIR);
        $this->structure->setView(null, $this->orig_structure_view);

  	   	if($this->action != 'edit')
  	   	{
  	   		  $this->requireLogin($this->base_uri . 'plugin/service_management/client_main/edit/');
  	   	}

    }
}
