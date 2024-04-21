<?php

class DB_DictionarySae extends Zend_Db_Table {
    protected $_name = 'dictionary_sae';
    protected $_primary = 'id';
     
     public function getData($specialization_id) {
        
//        $select = $this->select()->from(array('d' => $this->_name), array(
//            'id',
//            'name'
//        ));
        $select = $this->select()
            ->from(array('b' => 'bachelor_course'), array('sae_id'))
            ->join(array('s' => 'dictionary_sae'), 's.id = b.sae_id', array('name' => 'name'))
            ->where('b.specialization_id = ?', $specialization_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();  

        return $result;
        
    } 
}