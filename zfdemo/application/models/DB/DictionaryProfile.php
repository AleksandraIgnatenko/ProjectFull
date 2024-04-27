<?php
class DB_DictionaryProfile extends Zend_Db_Table {
    protected $_name = 'dictionary_profile';
    protected $_primary = 'id';
   
    public function getData($bachelor_param) {
        $select = $this->select()
            ->from(array('b' => 'bachelor_course'), array('profile_id'))
            ->join(array('p' => 'dictionary_profile'), 'p.id = b.profile_id', array('name' => 'name'))
            ->where('b.specialization_id = ?', $bachelor_param['specialization_id'])
            ->where('b.osp_id = ?', $bachelor_param['osp_id'])
            ->where('b.sae_id = ?', $bachelor_param['sae_id']);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 
}