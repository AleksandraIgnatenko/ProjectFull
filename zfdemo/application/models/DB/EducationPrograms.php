<?php
class DB_EducationPrograms extends Zend_Db_Table {
    protected $_name = 'education_programs';
    protected $_primary = 'id';
    
    public function getData($specialization_id) {
        
        $select = $this->select()->from(array('e' => 'education_programs'))
            ->join(array('d' => 'dictionary_education_programs'), 'e.specialization_id = d.specialization_id', array('specialization' => 'name'))
            ->join(array('ds' => 'dictionary_subjects'), 'ds.subject_id = d.id', array('subject' => 'name'))
            ->where('e.specialization_id = ?', $specialization_id);
        
        $result = $this->fetchAll($select); 
        
        return $result;
    } 
     public function insertData() {    
        $data = array( 
                    'specialization_id' => $param['specialization_id'],
                    'subject_id' => $param['subject_id']);
        $result = $this->insert($data);
        return $result;
    }
}