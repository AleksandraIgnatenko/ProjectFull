<?php

class DB_DictionaryAchievements extends Zend_Db_Table {
    protected $_name = 'dictionary_achievements';
    protected $_primary = 'id';
     
    public function getData() {
        $select = $this->select()
        ->from((array('da' => 'dictionary_achievements')), array(
            'da.id',
            'da.name',
            'da.score'
        ));
        $result = $this->fetchAll($select)->toArray();       
        return $result;  
    } 
}