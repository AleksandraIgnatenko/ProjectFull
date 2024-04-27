<?php

class DB_EducationDocumentType extends Zend_Db_Table {
    protected $_name = 'education_document_type';
    protected $_primary = 'id';
   
    public function getData() {
        $select = $this->select()->from(array('s' => $this->_name), array(
            'id',
            'name'
        ));
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();       
        return $result;
    } 
}

