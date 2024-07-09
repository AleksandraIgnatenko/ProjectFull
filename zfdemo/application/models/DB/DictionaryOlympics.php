<?php

class DB_DictionaryOlympics extends Zend_Db_Table {
    protected $_name = 'dictionary_olympics';
    protected $_primary = 'id';
     
    public function getOlympicData() {
        $select = $this->select()
        ->from((array('do' => 'dictionary_olympics')), array(
            'do.id',
            'do.name',
        ));
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 

}