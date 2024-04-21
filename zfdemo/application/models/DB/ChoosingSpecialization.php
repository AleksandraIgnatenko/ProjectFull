<?php
class DB_ChoosingSpecialization extends Zend_Db_Table {
    
    protected $_name = 'choosing_specialization';
    protected $_primary = 'id';
    
    public function insertData() {    
        
        $data = array( 
                    'student_id' => $param['person_id'],
                    'osp_id' => $param['osp_id'],
                    'form_education_id' => $param['form_education_id'],
		    'form_payment_id' => $param['form_payment_id'],
                    'dormitory' => $param['dormitory'],
                    'sae_id' => $param['sae_id'],
                    'profile_id'  => $param['profile_id'],
                    'statement_id'  => $param['statement_id']);
        $result = $this->insert($data);
        return $result;
        
    }
    
    public function getData($person_id) {
//        $select = $this->select()
//            ->from(array('c' => 'choosing_specialization'), array(
//                'form_education' => new Zend_Db_Expr('CASE 
//                                                        WHEN c.form_education_id = 1 THEN "Очная"
//                                                        WHEN c.form_education_id = 2 THEN "Заочная"
//                                                        WHEN c.form_education_id = 3 THEN "Очно-заочная"
//                                                      END'),
//                'form_payment' => new Zend_Db_Expr('CASE 
//                                                        WHEN c.form_payment_id = 1 THEN "Бюджет"
//                                                        WHEN c.form_payment_id = 2 THEN "Платное"
//                                                      END'),
//                'dormitory' => new Zend_Db_Expr('CASE
//                                                    WHEN c.dormitory = 1 THEN "Нуждаюсь"
//                                                    WHEN c.dormitory = 2 THEN "Не нуждаюсь"
//                                                  END'),
//                'statement' => new Zend_Db_Expr('CASE
//                                                    WHEN c.statement_id = 1 THEN "Да"
//                                                    WHEN c.statement_id = 2 THEN "Нет"
//                                                  END')
//            ))
//            ->join(array('o' => 'dictionary_osp'), 'o.id = c.osp_id', array('osp' => 'name'))
//            ->join(array('s' => 'dictionary_sae'), 's.id = c.sae_id', array('sae' => 'name'))
//            ->join(array('e' => 'dictionary_education_programs'), 'e.id = c.unit_id', array('unit_name' => 'unit_name'))
//            ->where('c.student_id = ?', $person_id);
        $query = 'SELECT 
            o.name AS osp,s.name AS sae, p.name AS profile,
            CASE
                WHEN c.form_education_id = 1 THEN "Очная"
                WHEN c.form_education_id = 2 THEN "Заочная"
                WHEN c.form_education_id = 3 THEN "Очно-заочная"
            END AS form_education,
            CASE 
                WHEN c.form_payment_id = 1 THEN "Бюджет"
                WHEN c.form_payment_id = 2 THEN "Платное"
            END AS form_payment,
            CASE
                WHEN c.dormitory = 1 THEN "Нуждаюсь"
                WHEN c.dormitory = 2 THEN "Не нуждаюсь"
            END AS dormitory,

            CASE
                WHEN c.statement_id = 1 THEN "Да"
                WHEN c.statement_id = 2 THEN "Нет"
            END AS statement
        FROM choosing_specialization AS c
        JOIN dictionary_osp AS o ON o.id = c.osp_id
        JOIN dictionary_sae AS s ON s.id = c.sae_id
        JOIN dictionary_profile AS p ON p.id = c.profile_id
        WHERE c.student_id = '.$person_id;
                

        $result = $this->getAdapter()->query($query)->fetchAll();

        return $result;
    }
}