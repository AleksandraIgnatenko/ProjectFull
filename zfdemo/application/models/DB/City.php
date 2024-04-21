<?php

class DB_City extends Zend_Db_Table {
    protected $_name = 'kladr';
    protected $_primary = 'code';
   
    
    public function getCityData($reg_code) {
        
        $select = $this->select()
        ->from($this->_name, array('name', new Zend_Db_Expr('CODE AS city_code')))
        ->where('SUBSTRING(CODE, 1, 2) = ?', $reg_code)
        ->where('SUBSTRING(CODE, 3) != ?', '00000000000');
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();       
        return $result;
        
    } 
    
}
