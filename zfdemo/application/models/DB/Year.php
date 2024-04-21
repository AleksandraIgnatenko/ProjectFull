<?php

class DB_Year extends Zend_Db_Table {
    protected $_name = 'year';
    protected $_primary = 'id';
   
    
    public function getData() {
        
        $select = $this->select()->from(array('y' => $this->_name), array(
            'id',
            'name'
        ));
             
        $select->setIntegrityCheck(false);
        //print_r($select->assemble());die;
        $result = $this->fetchAll($select)->toArray(); 
        sort($result);
        return $result;
        
    } 
}


