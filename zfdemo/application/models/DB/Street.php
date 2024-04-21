<?php

class DB_Street extends Zend_Db_Table {
    protected $_name = 'street';
    protected $_primary = 'code';
   
    
    public function getStreetData($city_code) {
        
        $select = $this->select()
    ->from($this->_name, array('name', new Zend_Db_Expr('CODE AS street_code')))
    ->where('SUBSTRING(code, 1, 13) = ?', $city_code);
             
        $select->setIntegrityCheck(false);
        //print_r($select->assemble());die;
        $result = $this->fetchAll($select)->toArray();       
        
        return $result;
        
    } 
}