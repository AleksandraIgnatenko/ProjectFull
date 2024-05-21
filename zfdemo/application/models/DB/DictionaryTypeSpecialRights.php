<?php


class DB_DictionaryTypeSpecialRights extends Zend_Db_Table {
    protected $_name = 'dictionary_type_special_rights';
    protected $_primary = 'id';
     
    public function getData() {
        $select = $this->select()
        ->from((array('d_t_s_r' => 'dictionary_type_special_rights')), array(
            'd_t_s_r.id',
            'd_t_s_r.name'
        ));
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 
}