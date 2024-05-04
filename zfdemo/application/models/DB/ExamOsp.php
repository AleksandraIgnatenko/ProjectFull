<?php
class DB_ExamOsp extends Zend_Db_Table {
    
    protected $_name = 'exam_osp';
    protected $_primary = 'id';
    
    public function insertData($param) {  
        $data = array( 
            'subject_id' => $param['subject_id'],
            'date' => $param['date'],
            'time' => $param['time'],
            'auditorium' => $param['auditorium'],
            'mark' => $param['mark'],
            'student_id'  => $param['student_id'],
            'exam_type_id'  => $param['exam_type_id']);
        print_r($data);
        $result = $this->insert($data);
        return $result;
        
    }
    
    public function getData($student_id) {
        $select = $this->select()->from(array('e' => $this->_name) , array(
            'date',
            'time',
            'auditorium',
            'mark'
            ))
            ->join(array('d' => 'dictionary_subjects'), 'e.subject_id = d.id', array('subject' => 'd.name'))
            ->join(array('e_type' => 'dictionary_types_exams'), 'e.exam_type_id = e_type.id', array('exam_type' => 'e_type.name'))
            ->where('e.student_id = ?', $student_id);   
            $select->setIntegrityCheck(false); 
            $result = $this->fetchAll($select)->toArray();
        return $result;
       
    }

    public function deleteData($id){
        $where = array('id = ?' => $id);
        return $this->delete($where);
    }

}