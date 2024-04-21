<?php

class DB_Priority extends Zend_Db_Table {
    
    protected $_name = 'priority';
    protected $_primary = 'id';
    
    public function insertData($param) {    
        $data = array('student_id' => $param['person_id'],
                    'specialization_id' => $param['specialization_id'],
                    'priority' => $param['priority']
        );
          
        return $this->insert($data);
        
    }
}