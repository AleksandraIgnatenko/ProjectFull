<?php

class DB_Subject extends Zend_Db_Table {
    protected $_name = 'dictionary_subjects';
    protected $_primary = 'id';
   
    
    public function getData() {
        
        $select = $this->select()->from(array('s' => $this->_name), array(
            'id',
            'name'
        ));
             
        $select->setIntegrityCheck(false);
        //print_r($select->assemble());die;
        $result = $this->fetchAll($select)->toArray();       
        
        return $result;
        
    } 
}