<?php
/**
 * Support Manager plugin handler
 *
 * @package blesta
 * @subpackage blesta.plugins.number_manager
 * @copyright Copyright (c) 2010, Phillips Data, Inc.
 * @license http://www.blesta.com/license/ The Blesta License Agreement
 * @link http://www.blesta.com/ Blesta
 */
class NumberManagerPlugin extends Plugin
{
    public function __construct()
    {

        Language::loadLang('number_manager_plugin', null, dirname(__FILE__) . DS . 'language' . DS);
      

        $this->loadConfig(dirname(__FILE__) . DS . 'config.json');
    }


    public function install($plugin_id)
    {
    	 Configure::load('number_manager', dirname(__FILE__) . DS . 'config' . DS);
    }

    public function getActions()
     {
        	return [
	        	[
	                'action' => 'nav_primary_client',
	                'uri' => 'plugin/number_manager/client_main/',
	                'name' => 'Number Manager'
	            ]
            ];
      }
        

}

