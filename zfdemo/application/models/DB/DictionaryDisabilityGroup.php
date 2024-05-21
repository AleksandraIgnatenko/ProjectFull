<?php

class DB_DictionaryDisabilityGroup extends Zend_Db_Table {
    protected $_name = 'dictionary_disability_group';
    protected $_primary = 'id';
     
    public function getData() {
        $select = $this->select()
        ->from((array('d_d_g' => 'dictionary_disability_group')), array(
            'd_d_g.id',
            'd_d_g.name'
        ));
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 
}

