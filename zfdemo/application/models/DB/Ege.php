<?php

class DB_Ege extends Zend_Db_Table {
    protected $_name = 'ege';
    protected $_primary = 'id';
     
    public function getEgeData($student_id) {
        $select = $this->select()->from(array('e' => 'ege') , array('id', 'mark'))
            ->join(array('d' => 'dictionary_subjects'), 'e.subject_id = d.id', array('subject_pass' => 'd.name'))
            ->join(array('e_type' => 'dictionary_types_exams'), 'e.exam_type_id = e_type.id', array('type_exam_pass' => 'e_type.name'))
            ->join(array('y' => 'year'), 'e.year_pass_id = y.id', array('year_pass' => 'y.name'))
            ->where('e.student_id = ?', $student_id);   
            $select->setIntegrityCheck(false); 
            $result = $this->fetchAll($select)->toArray();
        return $result;
    } 

    
    public function insertEgeData($param) {    
        $data = array('student_id' => $param['person_id'],
                    'subject_id' => $param['subject'],
                    'mark' => $param['exam_mark'],
		    'year_pass_id' => $param['exam_year'],
                    'exam_type_id' => $param['type_exam']
                    );
          
        $this->insert($data);
        return true;
    }
    
    public function deleteData($id){
        $where = array('id = ?' => $id);
        return $this->delete($where);
    }
}