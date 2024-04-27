<?php


class DB_Bachelor extends Zend_Db_Table {
    protected $_name = 'bachelor_course';
    protected $_primary = 'id';
     
    public function getIdData($bachelor_param){
        $select = $this->select()
            ->from(array('b' => 'bachelor_course'), array('id'))
            ->where('b.osp_id = ?', $bachelor_param['osp_id'])
            ->where('b.specialization_id = ?', $bachelor_param['specialization_id'])
            ->where('b.sae_id = ?', $bachelor_param['sae_id'])
            ->where('b.profile_id = ?', $bachelor_param['profile_id'])
            ->where('b.form_education_id = ?', $bachelor_param['form_education_id'])
            ->where('b.form_payment_id = ?', $bachelor_param['form_payment_id']);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }
}