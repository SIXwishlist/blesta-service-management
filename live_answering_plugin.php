<?php
/**
* Support Manager plugin handler
*
* @package blesta
* @subpackage blesta.plugins.live_answering
* @copyright Copyright (c) 2010, Phillips Data, Inc.
* @license http://www.blesta.com/license/ The Blesta License Agreement
* @link http://www.blesta.com/ Blesta
*/
class LiveAnsweringPlugin extends Plugin
{
  public function __construct()
  {

    Language::loadLang('live_answering_plugin', null, dirname(__FILE__) . DS . 'language' . DS);


    $this->loadConfig(dirname(__FILE__) . DS . 'config.json');
  }


  public function install($plugin_id)
  {
    Configure::load('live_answering', dirname(__FILE__) . DS . 'config' . DS);
  }

  public function getActions()
  {

    return [
      [
        'action' => 'nav_primary_client',
        'uri' => 'plugin/live_answering/client_main/',
        'name' => 'Service Management',
        'options' => [
          'sub' => [
            [
              'uri' => 'plugin/live_answering/new_tab/',
              'name' => 'Number Management - WIP'
            ],
            [
              'uri' => 'plugin/live_answering/client_main/',
              'name' => 'Live Answering'
            ]
          ]
        ]
      ]
    ];

  }


}
