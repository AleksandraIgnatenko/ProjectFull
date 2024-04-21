<?php


class DB_Bachelor extends Zend_Db_Table {
    protected $_name = 'bachelor_course';
    protected $_primary = 'id';
     
    public function getIntramuralData($profile_id) {
        $query = 'SELECT d.name AS profile,
            CASE
                WHEN b.intramural = 1 THEN "Очная"
                WHEN b.intramural = 2 THEN "Заочная"
                WHEN b.intramural = 3 THEN "Очно-заочная"
            END AS form_education
            FROM bachelor_course AS b
            JOIN dictionary_profile AS d ON d.id = b.profile_id 
            WHERE b.profile_id = '.$profile_id;
                
        $result = $this->getAdapter()->query($query)->fetchAll();
        return $result;
    } 
    
    public function getFreeData($profile_id) {
//        $select = $this->select()
//            ->from(array('b' => 'bachelor_course'), array())
//            ->join(array('d' => 'dictionary_profile'), 'd.id = b.profile_id', array('name AS profile'))
//            ->where('b.profile_id = ?', $profile_id)
//            ->columns(array(
//                'form_pay' => new Zend_Db_Expr("CASE
//                                          WHEN b.free = 1 THEN 'Бюджет'
//                                          WHEN b.free = 2 THEN 'Платное'
//                                        END")
//            ));
        $query = 'SELECT d.name AS profile,
            CASE
                    WHEN b.free = 1 THEN "Бюджет"
                    WHEN b.free = 2 THEN "Платное"
                END AS form_pay
            FROM bachelor_course AS b
            JOIN dictionary_profile AS d ON d.id = b.profile_id 
            WHERE b.profile_id = '.$profile_id;
                
        $result = $this->getAdapter()->query($query)->fetchAll();

        return $result;
    } 
}