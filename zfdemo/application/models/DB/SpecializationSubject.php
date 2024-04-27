<?php

class DB_SpecializationSubject extends Zend_Db_Table {
    protected $_name = 'specialization_subject';
    protected $_primary = 'id';
     
    public function getData($specialization_id) {
        $select = $this->select()
            ->from(array('s' => 'specialization_subject'), array())
            ->join(array('d' => 'dictionary_subjects'), 's.subject_id = d.id', array('d.name' => 'subject'))
            ->where('s.specialization_id = ?', $specialization_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();  
        return $result;
        
    } 
}
