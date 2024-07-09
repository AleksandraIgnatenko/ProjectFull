<?php

class DB_DictionaryFiles extends Zend_Db_Table {
    protected $_name = 'dictionary_files';
    protected $_primary = 'id';
     
    public function getData($student_id) {
        $select = $this->select()
        ->from((array('d_f' => 'dictionary_files')), array(
            'd_f.id',
            'd_f.name'
        ))->where('student_id = ?', $student_id);
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    }
    
    public function insertData($params) {  
        $data = array( 
                    'student_id' => $params['student_id'],
                    'name' => $params['file_name'],
        ); 
        $result = $this->insert($data);
        return $result;
    }

    public function deleteData($param){
        $where = array('id = ?' => $param['id']);
        $this->delete($where);
    }
}