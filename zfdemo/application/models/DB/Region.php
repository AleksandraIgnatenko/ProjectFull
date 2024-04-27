<?php

class DB_Region extends Zend_Db_Table {
  
    protected $_name = 'kladr';
    protected $_primary = 'code';
     
    public function getData() {
        $select = $this->select()
        ->from($this->_name, array('name', new Zend_Db_Expr('SUBSTRING(CODE,1, 2) AS reg_code')))
        ->where('SUBSTRING(CODE, 3) = ?', '00000000000');
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();       
        return $result;
    }
}

