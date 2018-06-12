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
      // Client
      [
        'action' => 'nav_primary_client',
        'uri' => 'plugin/support_manager/client_main/',
        'name' => Language::_('SupportManagerPlugin.nav_primary_client.main', true),
        'options' => [
          'sub' => [
            [
              'uri' => 'plugin/live_answering/new_tab/',
              'name' => 'New Tab'
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
