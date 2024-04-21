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
//        $select = $this->select()
//              ->from(array('p' => 'person'), array('first_name', 'second_name', 'surname', 'email', 'birthday', 'level', 'gender', 'place', 'passport_type', 'document_series', 'passport_number', 'when_issued', 'who_issued', 'place_issued', 'snils', 'lack_snils', 'home_phone_number', 'phone_number'))
//              ->join(array('e' => 'education'), 'e.id = p.education_id', array('name AS e_type'))
//              ->join(array('c' => 'country'), 'c.id = p.nationality_id', array('name AS c_nationality'))
//              ->where('p.id = ?', $person_id);
//               
//        $select->setIntegrityCheck(false);
//        $result = $this->fetchAll($select)->toArray();
            $select = $this->_db->select()
            ->from(array('p' => 'person'), array(
                'first_name',
                'second_name',
                'surname',
                'email',
                'birthday',
                'e_type' => 'e.name',
                'e_level' => new Zend_Db_Expr('IF(p.level = 1, "Впервые", "Нет")'),
                'gender' => new Zend_Db_Expr('IF(p.gender = 1, "Мужской", "Женский")'),
                'c.name AS c_nationality',
                'place',
                'passport_type' => new Zend_Db_Expr('IF(p.passport_type = 1, "Паспорт гражданина Российской Федерации", "Паспорт гражданина иностранного государства")'),
                'document_series',
                'passport_number',
                'when_issued',
                'who_issued',
                'place_issued',
                'snils',
                'lack_snils' => new Zend_Db_Expr('IF(p.lack_snils = 1, "Гражданин иностранного государства", "Нет")'),
                'home_phone_number',
                'phone_number'
            ))
            ->joinLeft(array('e' => 'education'), 'e.id = p.education_id', array())
            ->joinLeft(array('c' => 'country'), 'c.id = p.nationality_id', array())
            ->where('p.id = ?', $person_id);

            $query = $select->__toString();
            $result = $this->_db->fetchAll($query);
            return $result;
    }
    
    
    public function insertGeneralData($param) { 
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
            ->from(array('p' => $this->_name), array('house', 'corpus', 'flat', 'postindex'))
            ->join(array('s' => 'street'), 's.code = p.street_code', array('name AS street_name'))
            ->join(array('k1' => 'kladr'), 'k1.code = p.city_code', array('name AS city'))
            ->join(array('k2' => 'kladr'), "SUBSTRING(k2.code, 1, 2) = p.region_code AND SUBSTRING(k2.code, 3) = '00000000000'", array('name AS region'))
            ->where('p.id = ?', $person_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }
    
    public function updateEducationData($param){
        $data = array(
            'education_type_id' => $param['type_of_education'],
            'education_russia' => $param['education_in'],
            'education_region_id' => $param['region'],
            'education_city_id' => $param['city'],
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
        //Zend_Debug::dump($data); die;
        $where = array('id = ?' => $param['person_id']);
        $this->update($data, $where);
        return true;
    }
    
    public function getEducationData($person_id){
        $select = $this->select()
            ->from(array('p' => $this->_name), array(
            'ed_type' => 'e.name',
            'ed_city' => 'k1.name',
            'ed_region' => 'k2.name',
            'ed_russia' => new Zend_Db_Expr("CASE 
                                            WHEN p.education_russia = 0 THEN 'Нет'
                                            WHEN p.education_russia = 1 THEN 'Да'
                                          END"),
            'ed_institution' => 'e_i.name',
            'institution_number',
            'ed_institution_name' => 'p.education_institution_name',
            'ed_document' => 'e_d.name',
            'ed_document_series' => 'p.education_document_series',
            'ed_document_number' => 'p.education_document_number',
            'ed_application_series' => 'p.education_application_series',
            'ed_application_number' => 'p.education_application_number',
            'ed_document_organization' => 'p.education_document_organization',
            'ed_document_date' => 'p.education_document_date',
            'ed_document_year' => 'p.education_document_year'
        ))
        ->join(array('k1' => 'kladr'), 'k1.code = p.education_city_id', array())
        ->join(array('k2' => 'kladr'), "SUBSTRING(k2.code, 1, 2) = p.education_region_id AND SUBSTRING(k2.code, 3) = '00000000000'", array())
        ->join(array('e' => 'education_type'), 'p.education_type_id = e.id', array())
        ->join(array('e_i' => 'education_institution_type'), 'p.education_institution_id = e_i.id', array())
        ->join(array('e_d' => 'education_document_type'), 'p.education_document_type_id = e_d.id', array())
        ->where('p.id = ?', $person_id);

        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }
    
    public function deleteData($param){
        $where = array('id = ?' => $param['id']);
        $this->delete($where);
    }
    
        
}

