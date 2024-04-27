<?php
class DB_ChoosingAchievements extends Zend_Db_Table {
    
    protected $_name = 'choosing_achievements';
    protected $_primary = 'id';
    
    public function insertData($params) {  
        $data = array( 
                    'student_id' => $params['student_id'],
                    'achievement_id' => $params['achievement_id'],
        );
        $result = $this->insert($data);
        return $result;
    }
    
    public function getData($student_id) {
        $select = $this->select()
            ->from(array('c_a' => 'choosing_achievements'), array())
            ->join(array('d_a' => 'dictionary_achievements'), 'd_a.id = c_a.achievement_id', 
            array(
                'achievement' => 'd_a.name',
                'score' => 'd_a.score'
            ))
            ->where('c_a.student_id = ?', $student_id);
        $select->setIntegrityCheck(false);
        $result = $this->fetchAll($select)->toArray();
        return $result;
    }

    public function deleteData($id){
        $where = array('id = ?' => $id);
        return $this->delete($where);
    }
}