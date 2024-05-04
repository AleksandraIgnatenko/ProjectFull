<?php

class IndexController extends Zend_Controller_Action
{
    public function testAction()
    {
        
    }
    
    public function deleteUserDataAction() {
        Zend_Loader::loadClass('DB_Person');
        $param = $this->_getAllParams();
        $model = new DB_Person;
        try {
            $data =  $model->deleteData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
  
    public function getDataAction() {
        Zend_Loader::loadClass('DB_Person');
        $model = new DB_Person;
        try {
             $data =  $model->getData();
             $string = Zend_Json::encode($data);
             echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getGeneralDataAction() {
         Zend_Loader::loadClass('DB_Person');
        $model = new DB_Person; 
        $param = $this->_getAllParams()['person_id'];
        try {
            $data =  $model->getGeneralData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    
    public function insertGeneralDataAction(){
       Zend_Loader::loadClass('DB_Person');
        $param = $this->_getAllParams(false,false,true);
        $model = new DB_Person;
        try {
             $data =  $model->insertGeneralData($param); 
             echo json_encode(array("success" => true, "id" => $data));
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
    
       public function updateGeneralDataAction(){
        Zend_Loader::loadClass('DB_Person');
        $model = new DB_Person;
        $param = $this->_getAllParams();
        try {
            $model->updateGeneralData($param);
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    
     public function deleteEgeDataAction() {
        Zend_Loader::loadClass('DB_Ege');
        $param = $this->_getAllParams();
        $model = new DB_Ege;
        try {
            $data =  $model->deleteData($param['id']);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
    
    public function getCountryDataAction(){
        Zend_Loader::loadClass('DB_Country');
        $model = new DB_Country;
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getRegionDataAction(){
        Zend_Loader::loadClass('DB_Region');
        $model = new DB_Region; 
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getCityDataAction(){
        
        Zend_Loader::loadClass('DB_City');
        $model = new DB_City; 
        $param = $this->_getAllParams()['region_id'];
        try {
            $data =  $model->getCityData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
   
      public function insertEgeDataAction(){
       Zend_Loader::loadClass('DB_Ege');
        $param = $this->_getAllParams();
        $model = new DB_Ege;
        try {
             $data =  $model->insertEgeData($param); 
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
     public function getGeneralEducationDataAction() {
         Zend_Loader::loadClass('DB_Person');
        $model = new DB_Person; 
        $param = $this->_getAllParams()['person_id'];
        try {
            $data =  $model->getEducationData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getEducationDataAction(){
        Zend_Loader::loadClass('DB_Education');
        $model = new DB_Education; 
        $data =  $model->getData();
        $string = Zend_Json::encode($data);
        echo '{"success": "true", "data":'.$string.'}';
        die;
    }
    
    public function getDictionaryProfileDataAction(){
        Zend_Loader::loadClass('DB_DictionaryProfile');
        $model = new DB_DictionaryProfile;
        $param = $this->_getAllParams();
        $data =  $model->getData($param);
        $string = Zend_Json::encode($data);
        echo '{"success": "true", "data":'.$string.'}';
        die;
    }
    
      public function getDictionarySpecializationDataAction(){
        Zend_Loader::loadClass('DB_DictionarySpecialization');
        $model = new DB_DictionarySpecialization;
        $param = $this->_getAllParams()['osp_id'];
        $data =  $model->getData($param);
        $string = Zend_Json::encode($data);
        echo '{"success": "true", "data":'.$string.'}';
        die;
    }
    
    public function getExamTypeDataAction(){
        Zend_Loader::loadClass('DB_ExamType');
        $model = new DB_ExamType; 
        $data =  $model->getData();
        $string = Zend_Json::encode($data);
        echo '{"success": "true", "data":'.$string.'}';
        die;
    }
   
     public function getStreetDataAction(){
        Zend_Loader::loadClass('DB_Street');
        $model = new DB_Street; 
        $param = $this->_getAllParams()['city_code'];
        try {
            $data =  $model->getStreetData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    
    public function updatePlaceDataAction(){
        Zend_Loader::loadClass('DB_Person');
        $model = new DB_Person;
        $param = $this->_getAllParams();
        try {
            $data = $model->updatePlaceData($param);
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    
    public function getPlaceDataAction(){
        Zend_Loader::loadClass('DB_Person');
        $model = new DB_Person;
        $param = $this->_getAllParams()['person_id'];
        try {
            $data =  $model->getPlaceData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;        
    }
    
    public function updateEducationDataAction(){
        Zend_Loader::loadClass('DB_Person');
        $model = new DB_Person;
        $param = $this->_getAllParams();
        try {
            $data = $model->updateEducationData($param);
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    
    public function getSubjectDataAction(){
        Zend_Loader::loadClass('DB_Subject');
        $model = new DB_Subject; 
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    
    public function getEgeDataAction(){
        Zend_Loader::loadClass('DB_Ege');
        $model = new DB_Ege; 
        $param = $this->_getAllParams()['person_id'];
        try {
            $data =  $model->getEgeData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getEducationTypeDataAction(){
        Zend_Loader::loadClass('DB_EducationType');
        $model = new DB_EducationType; 
        try { 
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getEducationDocumentTypeDataAction(){
        Zend_Loader::loadClass('DB_EducationDocumentType');
        $model = new DB_EducationDocumentType;
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getEducationInstitutionTypeDataAction(){
        Zend_Loader::loadClass('DB_EducationInstitutionType');
        $model = new DB_EducationInstitutionType; 
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getYearDataAction(){
        Zend_Loader::loadClass('DB_Year');
        $model = new DB_Year; 
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

    public function getDictionaryOspDataAction(){
        Zend_Loader::loadClass('DB_DictionaryOsp');
        $model = new DB_DictionaryOsp; 
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getChoosingSpecializationDataAction(){
       Zend_Loader::loadClass('DB_ChoosingSpecialization');
        $model = new DB_ChoosingSpecialization; 
        $param = $this->_getAllParams()['person_id'];
        try {
            $data =  $model->getData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

     public function getEducationProgramsDataAction(){
        Zend_Loader::loadClass('DB_EducationPrograms');
        $model = new DB_EducationPrograms; 
        $param = $this->_getAllParams()['specialization_id'];
        try {
            $data =  $model->getData($param);
           
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function insertEducationProgramsDataAction(){
        Zend_Loader::loadClass('DB_EducationPrograms');
        $param = $this->_getAllParams();
        $model = new DB_EducationPrograms;
        try {
             $data =  $model->insertData($param); 
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
    public function getDictionarySaeDataAction(){
        Zend_Loader::loadClass('DB_DictionarySae');
        $model = new DB_DictionarySae; 
        $param = $this->_getAllParams()['specialization_id'];
        try {
            $data =  $model->getData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    public function getSpecializationSubjectDataAction(){
        Zend_Loader::loadClass('DB_SpecializationSubject');
        $model = new DB_SpecializationSubject; 
        $param = $this->_getAllParams()['specialization_id'];
        try {
            $data =  $model->getData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }
    
    public function getDictionaryFormEducationDataAction(){
        Zend_Loader::loadClass('DB_DictionaryFormEducation');
        $model = new DB_DictionaryFormEducation; 
        $param = $this->_getAllParams();
        try {
            $data =  $model->getData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

    public function getDictionaryFormPaymentDataAction(){
        Zend_Loader::loadClass('DB_DictionaryFormPayment');
        $model = new DB_DictionaryFormPayment; 
        $param = $this->_getAllParams();
        try {
            $data =  $model->getData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

    public function getExamOspDataAction(){
        Zend_Loader::loadClass('DB_ExamOsp');
        $model = new DB_ExamOsp; 
        $param = $this->_getAllParams();
        try {
            $data =  $model->getData($param['person_id']);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

    public function getBachelorIdDataAction(){
        Zend_Loader::loadClass('DB_Bachelor');
        $model = new DB_Bachelor;
        $param = $this->_getAllParams();
        $data =  $model->getIdData($param);
        $string = Zend_Json::encode($data);
        return $data[0]['id'];
    }

    public function insertChoosingSpecializationDataAction(){
        Zend_Loader::loadClass('DB_ChoosingSpecialization');
        $param = $this->_getAllParams();
        $model = new DB_ChoosingSpecialization;
        try {
            $param['bachelor_id'] = $this->getBachelorIdDataAction();
            $data =  $model->insertData($param); 
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
    public function insertExamOspDataAction(){
        Zend_Loader::loadClass('DB_ExamOsp');
        $param = $this->_getAllParams(false,false,true);
        $model = new DB_ExamOsp;
        try {
            $data =  $model->insertData($param); 
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
    public function deleteChoosingSpecializationDataAction() {
        Zend_Loader::loadClass('DB_ChoosingSpecialization');
        $param = $this->_getAllParams();
        $model = new DB_ChoosingSpecialization;
        try {
            $data =  $model->deleteData($param['id']);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
    public function deleteExamOspDataAction() {
        Zend_Loader::loadClass('DB_ExamOsp');
        $param = $this->_getAllParams();
        $model = new DB_ExamOsp;
        try {
            $data =  $model->deleteData($param['id']);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }

    public function getDictionaryAchievementsDataAction(){
        Zend_Loader::loadClass('DB_DictionaryAchievements');
        $model = new DB_DictionaryAchievements; 
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

    public function getDictionaryOlympicsDataAction(){
        Zend_Loader::loadClass('DB_DictionaryOlympics');
        $model = new DB_DictionaryOlympics; 
        try {
            $data =  $model->getData();
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

    public function insertChoosingAchievementsDataAction(){
        Zend_Loader::loadClass('DB_ChoosingAchievements');
        $param = $this->_getAllParams();
        $model = new DB_ChoosingAchievements;
        try {
            $model->insertData($param); 
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }

    public function getChoosingAchievementsDataAction(){
        Zend_Loader::loadClass('DB_ChoosingAchievements');
         $model = new DB_ChoosingAchievements; 
         $param = $this->_getAllParams()['student_id'];
         try {
            $data =  $model->getData($param);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
         } catch (Exception $ex) {
              echo '{"success": "false"}'; 
         }
         die;
     }

     public function deleteChoosingAchievementsDataAction() {
        Zend_Loader::loadClass('DB_ChoosingAchievements');
        $param = $this->_getAllParams();
        $model = new DB_ChoosingAchievements;
        try {
            $data = $model->deleteData($param['id']);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }

     public function insertChoosingOlympicsDataAction(){
        Zend_Loader::loadClass('DB_ChoosingOlympics');
        $param = $this->_getAllParams();
        $model = new DB_ChoosingOlympics;
        try {
            $model->insertData($param); 
            echo '{"success": "true"}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }

    public function getChoosingOlympicsDataAction(){
        Zend_Loader::loadClass('DB_ChoosingOlympics');
        $model = new DB_ChoosingOlympics; 
        $param = $this->_getAllParams();
        try {
            $data =  $model->getData($param['student_id']);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die;
    }

    public function deleteChoosingOlympicsDataAction() {
        Zend_Loader::loadClass('DB_ChoosingOlympics');
        $param = $this->_getAllParams();
        $model = new DB_ChoosingOlympics;
        try {
            $data = $model->deleteData($param['id']);
            $string = Zend_Json::encode($data);
            echo '{"success": "true", "data":'.$string.'}';
        } catch (Exception $ex) {
             echo '{"success": "false"}'; 
        }
        die; 
    }
}
