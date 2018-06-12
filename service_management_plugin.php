<?php
class ServiceManagementPlugin extends Plugin
{
  public function __construct()
  {

    Language::loadLang('service_management_plugin', null, dirname(__FILE__) . DS . 'language' . DS);


    $this->loadConfig(dirname(__FILE__) . DS . 'config.json');
  }


  public function install($plugin_id)
  {
    Configure::load('service_management', dirname(__FILE__) . DS . 'config' . DS);
  }

  public function getActions()
  {

    return [
      [
        'action' => 'nav_primary_client',
        'name' => 'Service Management',
        'options' => [
          'sub' => [
            [
              'uri' => 'plugin/service_management/client_main/',
              'name' => 'Number Management'
            ],
            [
              'uri' => 'plugin/service_management/live_answering/',
              'name' => 'Live Answering'
            ]
          ]
        ]
      ]
    ];

  }


}
