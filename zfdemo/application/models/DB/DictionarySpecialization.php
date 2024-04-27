<?php


class DB_DictionarySpecialization extends Zend_Db_Table {
    protected $_name = 'dictionary_specialization';
    protected $_primary = 'id';
     
    public function getData($osp_id) {
        $select = $this->select()->from(array('s' => $this->_name), array(
            'id',
            'name'
        ))->where('s.osp_id = ?', $osp_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();  
        return $result;
    } 
}

