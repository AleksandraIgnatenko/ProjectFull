<?php

class DB_Country extends Zend_Db_Table {
    protected $_name = 'country';
    protected $_primary = 'id';
    
    public function getData() {
        $select = $this->select()->from(array('c' => $this->_name), array(
            'id',
            'name'
        ));
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();       
        return $result;
    } 
}

