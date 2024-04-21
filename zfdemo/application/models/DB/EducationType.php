<?php

class DB_EducationType extends Zend_Db_Table {
    protected $_name = 'education_type';
    protected $_primary = 'id';
   
    
    public function getData() {
        
        $select = $this->select()->from(array('e' => $this->_name), array(
            'id',
            'name'
        ));
             
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();       
        
        return $result;
        
    } 
}
