<?php
class DB_DocumentStatus extends Zend_Db_Table {
    
    protected $_name = 'document_status';
    protected $_primary = 'id';
    
    public function insertData($params) {  
        $params['date'] = date("Y-m-d", strtotime($params['date']));
        $data = array( 
                    'student_id' => $params['student_id'],
                    'document_status' => $params['status_document'],
                    'original_epsu' => $params['original_EPGU'],
                    'temporary_student_loan' => $params['temporary_student_loan'],
                    'original_university' => $params['original_university'],
                    'date' => $params['date']
        ); 
        $result = $this->insert($data);
        print_r($result);
        return $result;
    }
    
    public function getData($student_id){
        $select = $this->select()
            ->from(array('d_s' => 'document_status'), array('id', 'student_id', 'date_sub' => 'date', 'status_document' => 'document_status', 'original_EPGU' => 'original_epsu', 'temporary_student_loan', 'original_university'))

            ->where('d_s.student_id = ?', $student_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
        $result[0]['date_sub'] = date("d.m.Y", strtotime($result[0]['date_sub']));
        return $result;
    }

    public function deleteData($id){
        $where = array('id = ?' => $id);
        return $this->delete($where);
    }

    public function updateData($params){
        $params['date'] = date("Y-m-d", strtotime($params['date']));
        $data = array( 
                    'student_id' => $params['student_id'],
                    'document_status' => $params['status_document'],
                    'original_epsu' => $params['original_EPGU'],
                    'temporary_student_loan' => $params['temporary_student_loan'],
                    'original_university' => $params['original_university'],
                    'file_name' => $params['file_name'],
                    'date' => $params['date']
        );
        $where = array('id = ?' => $params['id']);
        $this->update($data, $where);
        return true;
    }
}