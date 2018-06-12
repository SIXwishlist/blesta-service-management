<?php
/**
 * Support Manager parent controller
 *
 * @package blesta
 * @subpackage blesta.plugins.number_manager
 * @copyright Copyright (c) 2010, Phillips Data, Inc.
 * @license http://www.blesta.com/license/ The Blesta License Agreement
 * @link http://www.blesta.com/ Blesta
 */
class NumberManagerController extends AppController
{
    /**
     * Setup
     */
    public function preAction()
    {
        $this->structure->setDefaultView(APPDIR);
        parent::preAction();

            // newly added 
          // Require login
        $this->requireLogin();


        // Load config
        Configure::load('number_manager', dirname(__FILE__) . DS . 'config' . DS);

        // Auto load language for the controller
        Language::loadLang([Loader::fromCamelCase(get_class($this))], null, dirname(__FILE__) . DS . 'language' . DS);
        
        
         Loader::loadModels($this, ['Users']);

        // Override default view directory
        $this->view->view = 'default';
        $this->orig_structure_view = $this->structure->view;
        $this->structure->view = 'default';

        $this->uses(['Clients']);

        // $client = $this->Clients->getCustomFieldValues(1);
    }

      /**
     * {@inheritdoc}
     */
    protected function requireLogin($redirect_to = null)
    {
        parent::requireLogin($redirect_to);

        $area = $this->plugin ? $this->plugin . '.*' : $this->controller;
        //$this->requirePermission($area);
    }


}
