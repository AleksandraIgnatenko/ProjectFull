<?php

class DB_DictionaryTypeDocumentStatus extends Zend_Db_Table {
    protected $_name = 'dictionary_type_document_status';
    protected $_primary = 'id';
     
    public function getData() {
        $select = $this->select()
        ->from((array('d_t_d_s' => 'dictionary_type_document_status')), array(
            'd_t_d_s.id',
            'd_t_d_s.name',
        ));
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 
}