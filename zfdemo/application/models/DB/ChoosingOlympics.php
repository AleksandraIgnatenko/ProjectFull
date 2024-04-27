<?php
class DB_ChoosingOlympics extends Zend_Db_Table {
    
    protected $_name = 'choosing_olympics';
    protected $_primary = 'id';
    
    public function insertData($params) {  
        $data = array( 
                    'student_id' => $params['student_id'],
                    'olympic_id' => $params['olympic_id'],
                    'degree_diploma' => $params['degree_diploma'],
                    'year_id' => $params['year_id'],
                    'reg_number_diploma' => $params['reg_number_diploma']
        );
        $result = $this->insert($data);
        return $result;
    }
    
    public function getData($student_id){
        $select = $this->select()->from(array('c_o' => 'choosing_olympics'), array(
            'degree_diploma',
            'reg_number_diploma'
        ))
        ->join(array('d_o' => 'dictionary_olympics'), 'c_o.olympic_id = d_o.id',  array('olympic' => 'd_o.name'))
        ->join(array('y' => 'year'), 'c_o.year_id = y.id', array('year' => 'y.name'))
        ->where('c_o.student_id = ?', $student_id);
      
        $select->setIntegrityCheck(false); 
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }

    public function deleteData($id){
        $where = array('id = ?' => $id);
        return $this->delete($where);
    }
}