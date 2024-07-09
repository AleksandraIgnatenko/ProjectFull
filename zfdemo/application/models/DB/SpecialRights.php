<?php

class DB_SpecialRights extends Zend_Db_Table {
    protected $_name = 'special_rights';
    protected $_primary = 'student_id';
    
    public function insertData($param) {
        $data = array( 
                'student_id'  => $param['student_id'],
                'type_special_rights' => $param['type_special_rights']);
        if ($param['type_special_rights'] == 2){
            $data += array(
                'reason_special_rights' => $param['reason_special_rights']); 
             if ($param['reason_special_rights'] == 1){  
                 $param['disability_date_disable'] = date("Y-m-d", strtotime($param['disability_date_disable']));
                 $param['rehabilitation_card_date'] = date("Y-m-d", strtotime($param['rehabilitation_card_date']));  
                 $data += array(
                    'disability_document' => $param['document_name_disable'],
                    'disability_series' => $param['disability_series_disable'],
                    'disability_number' => $param['disability_number_disable'],
                    'disability_group'  => $param['disability_group'],
                    'disability_date'  => $param['disability_date_disable'],
                    'disability_organization'  => $param['disability_organization_disable'],
                    'rehabilitation_card_number'  => $param['rehabilitation_card_number'],
                    'rehabilitation_card_date'  => $param['rehabilitation_card_date'],
                    'rehabilitation_card_organization'  => $param['rehabilitation_card_organization']);
            }
            if ($param['reason_special_rights'] == 2){
                $param['disability_date_orphan'] = date("Y-m-d", strtotime($param['disability_date_orphan']));
                
                $data += array(
                    'orphan_document' => $param['document_name_orphan'],
                    'orphan_series' => $param['disability_series_orphan'],
                    'orphan_number' => $param['disability_number_orphan'],
                    'orphan_date'  => $param['disability_date_orphan'],
                    'orphan_organization'  => $param['disability_organization_orphan']);
            }
            if ($param['reason_special_rights'] == 3){    
            $param['disability_date_veretan'] = date("Y-m-d", strtotime($param['disability_date_veretan']));
                $data += array(
                    'veteran_document' => $param['document_name_veteranf'],
                    'veteran_series' => $param['disability_series_veteran'],
                    'veteran_number' => $param['disability_number_veteran'],
                    'veteran_date'  => $param['disability_date_veretan'],
                    'veteran_organization'  => $param['disability_organization_veteran']);
            }
        }
        $result = $this->insert($data);
        return $result;
        
    }
    public function getData($student_id){
        $select = $this->select()
                ->from(array('s_r' =>'special_rights'), array( 
                'student_id',
                'type' => 'type_special_rights',
                'reason_special_right' => 'reason_special_rights',
                'document_special_right_disable' => 'disability_document',
                'document_series_right_disable' => 'disability_series' ,
                'passport_number_right_disable' => 'disability_number', 
                'disability_group' => 'disability_group',
                'organization_right_disable' => 'disability_organization',
                'passport_number_right_card' => 'rehabilitation_card_number',
                'organization_right_card' => 'rehabilitation_card_organization',
                'document_special_right_orphan' => 'orphan_document',
                'document_series_right_orphan' => 'orphan_series',
                'passport_number_right_orphan' => 'orphan_number',
                'organization_right_orphan' => 'orphan_organization',
                'document_special_right_veteran' => 'veteran_document',
                'document_series_right_veteran' => 'veteran_series',
                'passport_number_right_veteran' => 'veteran_number',
                'organization_right_veteran' => 'veteran_organization'    
                ))
                ->where('s_r.student_id = ?', $student_id); 
                
        $select->setIntegrityCheck(false); 
        $result = $this->fetchAll($select)->toArray();
        $check=$this->select()
        ->from(array('s_r' =>'special_rights'), array('date_document_disable' => 'disability_date', 'date_document_orphan' => 'orphan_date', 'date_document_veteran'=>'veteran_date', 'date_document_card'=>'rehabilitation_card_date'))->where('s_r.student_id = ?', $student_id);
        $check = $this->fetchAll($check)->toArray();
        if ($check[0]['date_document_disable']){
            $result[0]['date_document_disable'] = date("d.m.Y", strtotime($check[0]['date_document_disable']));
            $result[0]['date_document_card'] = date("d.m.Y", strtotime($check[0]['date_document_card']));
          
        }
        if ($check[0]['date_document_orphan']){
             $result[0]['date_document_orphan'] = date("d.m.Y", strtotime($check[0]['date_document_orphan']));
        }
        if ($check[0]['date_document_veteran']){
            $result[0]['date_document_veteran'] = date("d.m.Y", strtotime($check[0]['date_document_veteran']));
        }
        return $result;
    }
    public function deleteData($student_id){
        $where = array('student_id = ?' => $student_id);
        return $this->delete($where);
    }
}