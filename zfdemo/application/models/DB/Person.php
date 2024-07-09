<?php

class DB_Person extends Zend_Db_Table {
    
    protected $_name = 'person';
    protected $_primary = 'id';
    
    public function getData() {
        $select = $this->select()->from(array('p' => $this->_name), array(
            'id',
            'first_name',
            'second_name',
            'surname',
            'email',
            'phone_number'
        ));
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }


    public function getGeneralData($person_id){
        $select = $this->_db->select()
                   ->from(array('p' => 'person'), array(
                       'id',
                       'first_name',
                       'second_name',
                       'surname',
                       'email',
                       'birthday',
                       'education_id',
                       'level',
                       'gender',
                       'nationality_id',
                       'place',
                       'passport_type',
                       'document_series',
                       'passport_number',
                       'who_issued',
                       'when_issued',
                       'place_issued',
                       'snils',
                       'lack_snils',
                       'home_phone_number',
                       'phone_number'
                   ))
                   
                   ->where('p.id = ?', $person_id);
            
                $query = $select->__toString();
                $result = $this->_db->fetchAll($query);
                $check=$this->select()
                ->from(array('p' => 'person'), array('when_issued', 'birthday' ))->where('p.id = ?', $person_id);
                $check = $this->fetchAll($check)->toArray();
                $result['when_issued'] = date("d.m.Y", strtotime($check[0]['when_issued']));
                $result['birthday'] = date("d.m.Y", strtotime($check[0]['birthday']));
                return $result;
    }
    
    
    public function insertGeneralData($param) { 
        $param['birthday'] = date("Y-m-d", strtotime($param['birthday']));
        $param['when_issued'] = date("Y-m-d", strtotime($param['when_issued']));
        $data = array( 
                    'first_name' => $param['first_name'],
                    'second_name' => $param['second_name'],
                    'surname' => $param['surname'],
		            'email' => $param['email'],
                    'birthday' => $param['birthday'],
                    'education_id' => $param['education'],
                    'level'  => $param['level'],
                    'gender'  => $param['gender'],
                    'nationality_id' => $param['nationality'],
                    'place'  => $param['place'],
                    'passport_type'  => $param['passport_type'],
                    'document_series' => $param['document_series'],
                    'passport_number' => $param['passport_number'],
                    'when_issued' => $param['when_issued'],
                    'who_issued' => $param['who_issued'],
                    'place_issued' => $param['place_issued'],
                    'snils' => $param['snils'],
                    'lack_snils' => $param['lack_snils'],
                    'home_phone_number' => $param['home_phone_number'],
                    'phone_number'  => $param['phone_number']);
        $result = $this->insert($data);
        
        return $result;
        
    }
    public function updateGeneralData($param){
        $param['birthday'] = date("Y-m-d", strtotime($param['birthday']));
        $param['when_issued'] = date("Y-m-d", strtotime($param['when_issued']));
        $data = array( 'first_name' => $param['first_name'],
                    'second_name' => $param['second_name'],
                    'surname' => $param['surname'],
		            'email' => $param['email'],
                    'birthday' => $param['birthday'],
                    'education_id' => $param['education'],
                    'level'  => $param['level'],
                    'gender'  => $param['gender'],
                    'nationality_id' => $param['nationality'],
                    'place'  => $param['place'],
                    'passport_type'  => $param['passport_type'],
                    'document_series' => $param['document_series'],
                    'passport_number' => $param['passport_number'],
                    'when_issued' => $param['when_issued'],
                    'who_issued' => $param['who_issued'],
                    'place_issued' => $param['place_issued'],
                    'snils' => $param['snils'],
                    'lack_snils' => $param['lack_snils'],
                    'home_phone_number' => $param['home_phone_number'],
                    'phone_number'  => $param['phone_number']);

              
        $where = array('id = ?' => $param['person_id']);
        $this->update($data, $where);
        return true;
    }
    
    public function updatePlaceData($param){
        $data = array(
            'region_code' => $param['region'],
            'city_code' => $param['city'],
            'street_code' => $param['street'],
            'house' => $param['number_of_house'],
            'corpus' => $param['frame'],
            'flat' => $param['apartment'],
            'postindex' => (int)$param['index']
        );
        $where = array('id = ?' => $param['person_id']);
        $this->update($data, $where);
        return true;
    }
    
    public function getPlaceData($person_id){
        $select = $this->select()
             ->from(array('p' => 'person'), 
                    array('id','region_code', 'city_code', 'street_code', 'house', 'corpus', 'flat', 'postindex'))
        ->where('p.id = ?', $person_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }
    
    public function updateEducationData($param){
        $param['when_document'] = date("Y-m-d", strtotime($param['when_document']));
        $data = array(
            'education_type_id' => $param['type_of_education'],
            'education_russia' => $param['education_in'],
            'education_institution_id' => $param['type_institutions'],
            'institution_number' => $param['number'],
            'education_institution_name' => $param['name_institutions'],
            'education_document_type_id' => $param['type_document'],
            'education_document_series' => $param['document_seriesE'],
            'education_document_number' => $param['document_numberE'],
            'education_application_series' => $param['application_series'],
            'education_application_number' => $param['application_number'],
            'education_document_organization' => $param['organization'],
            'education_document_date' => $param['when_document'],
            'education_document_year' => $param['year_document']
        );
        $where = array('id = ?' => $param['person_id']);
        $this->update($data, $where);
        return true;
    }
    
    public function getEducationData($person_id){

        $select = $this->select()
             ->from(array('p' => 'person'), 
                    array('person_id' => 'id', 
                    'type_of_education' => 'education_type_id', 
                    'education_in' => 'education_russia', 
                          'type_institutions' => 'education_institution_id', 
                          'type_document' => 'education_document_type_id',
                          'document_seriesE' => 'education_document_series', 'document_numberE' => 'education_document_number',
                          'application_series' => 'education_application_series', ' application_number' => 'education_application_number',
                          'organization' => 'education_document_organization', 'when_document' => 'education_document_date',
                          'year_document' => 'education_document_year','education_document_date', 'number' => 'institution_number', 'name_institutions' => 'education_institution_name'))->where('p.id = ?', $person_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
       
        $check=$this->select()
                ->from(array('p' => 'person'), array('education_document_date' ))->where('p.id = ?', $person_id);
                $check = $this->fetchAll($check)->toArray();
                $result[0]['education_document_date'] = date("d.m.Y", strtotime($result[0]['education_document_date']));
        
        return $result;
    }
    
    public function deleteData($param){
        $where = array('id = ?' => $param['id']);
        $this->delete($where);
    }
    
        
}

