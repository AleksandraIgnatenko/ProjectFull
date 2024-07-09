<?php

class DB_DictionaryYesNo extends Zend_Db_Table {
    protected $_name = 'dictionary_yes_no';
    protected $_primary = 'id';
     
    public function getData() {
        $select = $this->select()
        ->from((array('d_y_n' => 'dictionary_yes_no')), array(
            'd_y_n.id',
            'd_y_n.name',
        ));
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 
}