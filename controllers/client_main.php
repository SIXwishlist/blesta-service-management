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
    /**
     * Redirect to the ClientTickets controller
     */
    public function index()
    {
        // Get custom fields from Client controller => save
        $client_custom_fields = $this->Clients->getCustomFieldValues(1);
        return  $this->set('client_custom_fields', $client_custom_fields);
        // Set variables all at once
        //$var2 = "hello";
       // $var3 = "world";
       // return $this->partial("client_main", compact("var1", "var2"));

     //   $this->redirect($this->base_uri . 'plugin/number_manager/client_main/');
    }

    // Get custom fields
    public function edit()
    {

    	// Check whether client is logged in
      //  $logged_in = false;
       // if ($this->isLoggedIn()) {
         //   $logged_in = true;
       // }

      // Get custom fields from Client controller => save
    	$client_custom_fields = $this->Clients->getCustomFieldValues(1);
      return  $this->set('client_custom_fields', $client_custom_fields);
    }

    // Read and return services
    public function services() {

        $authaccountid=26119;
        $authemail="ishwarya.sridharan0410@gmail.com";
        $password="83785287c883e66186d216ea6b31b27e";
        $apikey="s1rlg0ywnpkYAWq087AqRH8iB0pMQCl5";

        //to find client program

        $url = 'http://www.numbermanager.com.au/api/getService?authaccountid=26119&authemail=ishwarya.sridharan0410@gmail.com&password=83785287c883e66186d216ea6b31b27e&apikey=s1rlg0ywnpkYAWq087AqRH8iB0pMQCl5';
        $content = file_get_contents($url);
        $json = json_decode($content, true);

        foreach($json['services'] as $item) {
            $accountId = $item['accountid'];
            print ' - ';
            $accountname = $item['accountname'];
            print '<br>';
        }

        return $item;
    }

    // Unused
    public function foo() {
        return $this->partial("client_main_foo");
    }

    // Lifecycle method
    public function preAction()
    {
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
