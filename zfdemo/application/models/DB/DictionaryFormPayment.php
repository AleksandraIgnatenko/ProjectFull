<?php

class DB_DictionaryFormPayment extends Zend_Db_Table {
    protected $_name = 'dictionary_form_payment';
    protected $_primary = 'id';
     
    public function getData($bachelor_param) {
        $select = $this->select()
            ->from(array('b' => 'bachelor_course'), array('form_payment_id'))
            ->join(array('e' => $this->_name), 'e.id = b.form_education_id', array('name' => 'name'))
            ->where('b.specialization_id = ?', $bachelor_param['specialization_id'])
            ->where('b.osp_id = ?', $bachelor_param['osp_id'])
            ->where('b.sae_id = ?', $bachelor_param['sae_id'])
            ->where('b.profile_id = ?', $bachelor_param['profile_id']);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    }  
}