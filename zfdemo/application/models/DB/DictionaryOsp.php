<?php

class DB_DictionaryOsp extends Zend_Db_Table {
    protected $_name = 'dictionary_osp';
    protected $_primary = 'id';
    
    public function getData() {
        $select = $this->select()->from(array('d' => $this->_name), array(
            'id',
            'name'
        ));
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();  
        return $result;
    } 
}