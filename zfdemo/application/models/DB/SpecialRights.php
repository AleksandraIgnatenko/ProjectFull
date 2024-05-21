<?php

class DB_SpecialRights extends Zend_Db_Table {
    protected $_name = 'special_rights';
    protected $_primary = 'student_id';
    
    public function insertData($param) {  
        $param['disability_date'] = date("Y-m-d", strtotime($param['disability_date']));
        $param['rehabilitation_card_date'] = date("Y-m-d", strtotime($param['rehabilitation_card_date']));
        $data = array( 
            'student_id'  => $param['student_id'],
            'type_special_rights' => $param['type_special_rights'],
            'reason_special_rights' => $param['reason_special_rights'],
            'document_name' => $param['document_name'],
            'disability_series' => $param['disability_series'],
            'disability_number' => $param['disability_number'],
            'disability_group'  => $param['disability_group'],
            'disability_date'  => $param['disability_date'],
            'disability_organization'  => $param['disability_organization'],
            'rehabilitation_card_number'  => $param['rehabilitation_card_number'],
            'rehabilitation_card_date'  => $param['rehabilitation_card_date'],
            'rehabilitation_card_organization'  => $param['rehabilitation_card_organization']);
        $result = $this->insert($data);
        return $result;
        
    }
    public function getData($student_id){
        $select = $this->select()
                ->from(array('s_r' =>'special_rights'), array( 
                'document_name',
                'disability_series' ,
                'disability_number', 
                'disability_date',  
                'disability_organization',
                'rehabilitation_card_number',
                'rehabilitation_card_date',
                'rehabilitation_card_organization',
                ))
                ->join(array('d_t_s_r' => 'dictionary_type_special_rights'), 's_r.type_special_rights = d_t_s_r.id', 
                        array('type' => 'd_t_s_r.name'))
                ->join(array('d_r_s_r' => 'dictionary_reason_special_rights'), 's_r.reason_special_rights = d_r_s_r.id', 
                        array('reason' => 'd_r_s_r.name'))
                ->join(array('d_d_g' => 'dictionary_disability_group'), 's_r.disability_group = d_d_g.id', 
                        array('disability_group' => 'd_r_s_r.name'))
                ->where('s_r.student_id = ?', $student_id); 
        $select->setIntegrityCheck(false); 
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }
    public function deleteData($student_id){
        $where = array('student_id = ?' => $student_id);
        return $this->delete($where);
    }
}