<?php
class DB_ChoosingSpecialization extends Zend_Db_Table {
    
    protected $_name = 'choosing_specialization';
    protected $_primary = 'id';
    
    public function insertData($param) {  
        $data = array( 
                    'student_id' => $param['student_id'],
                    'bachelor_id' => $param['bachelor_id'],
                    'dormitory' => $param['dormitory'],
                    'statement_date'  => $param['statement_date'],
                    'priority' => $param['priority']
        );
        $result = $this->insert($data);
        return $result;
    }
    
    public function getData($person_id) {
        $select = $this->_db->select()
            ->from(array('c' => 'choosing_specialization'), array(
                'bachelor_id',
                'statement_date',
                'priority',
                'id',
                'dormitory' => new Zend_Db_Expr('IF(c.dormitory = 1, "Нуждаюсь", "Не нуждаюсь")')
            ))
            ->joinleft(array('b' => 'bachelor_course'), 'b.id = c.bachelor_id', array())
            ->joinleft(array('o' => 'dictionary_osp'), 'o.id = b.osp_id', array('name osp'))
            ->joinleft(array('s' => 'dictionary_sae'), 's.id = b.sae_id', array('name AS sae'))
            ->joinleft(array('sp' => 'dictionary_specialization'), 'sp.id = b.specialization_id', array('name AS specialization'))
            ->joinleft(array('p' => 'dictionary_profile'), 'p.id = b.profile_id', array('name AS profile'))
            ->joinleft(array('e' => 'dictionary_form_education'), 'e.id = b.form_education_id', array('name AS form_education'))
            ->joinleft(array('pay' => 'dictionary_form_payment'), 'pay.id = b.form_payment_id', array('name AS form_payment'))
            ->where('c.student_id = ?', $person_id);
        $query = $select->__toString();
        $result = $this->_db->fetchAll($query); 
        return $result;
    }

    public function deleteData($id){
        $where = array('id = ?' => $id);
        return $this->delete($where);
    }
}