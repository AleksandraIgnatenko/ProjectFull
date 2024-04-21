<?php

class DB_Ege extends Zend_Db_Table {
    protected $_name = 'ege';
    protected $_primary = 'id';
     
    //должны быть id в таблице ege
    public function getEgeData($student_id) {
         
        $query = "SELECT  d.name AS subject_pass,e.mark, y.name as year_pass, dict.name AS type_exam_pass FROM ege AS e
            JOIN dictionary_subjects AS d ON e.subject_id = d.id
            JOIN year AS y ON e.year_pass_id = y.id
            JOIN dictionary_types_exams AS dict ON e.exam_type_id = dict.id
            WHERE e.student_id = ".$student_id."";

        $result = $this->getAdapter()->query($query)->fetchAll();
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
    
    public function deleteEgeData($param){
        $where = array(
            'student_id = ?' => $param['person_id'],
            'subject_id = ?' => $param['subject_id']
        );
        $this->delete($where);
    }
}