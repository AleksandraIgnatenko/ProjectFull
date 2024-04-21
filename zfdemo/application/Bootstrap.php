<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
   protected function _initMailAdapter() {
            $config = new Zend_Config_Ini(APPLICATION_PATH . '/configs/main.ini', APPLICATION_ENV);
    
            $dbAdapters = array();

            foreach($config->resources->db as $config_name => $db){

                 $dbAdapters[$config_name] = Zend_Db::factory($db->adapter, $db->params->toArray());

                 if((boolean)$db->default){
                    Zend_Db_Table::setDefaultAdapter($dbAdapters[$config_name]);
                 }

            }

            Zend_Registry::set('dbAdapters', $dbAdapters);
  }
        
}


