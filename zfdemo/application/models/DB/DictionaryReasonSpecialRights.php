<?php


class DB_DictionaryReasonSpecialRights extends Zend_Db_Table {
    protected $_name = 'dictionary_reason_special_rights';
    protected $_primary = 'id';
     
    public function getData() {
        $select = $this->select()
        ->from((array('d_r_s_r' => 'dictionary_reason_special_rights')), array(
            'd_r_s_r.id',
            'd_r_s_r.name'
        ));
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 
}