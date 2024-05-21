<?php

class UploadController extends Zend_Controller_Action
{
    public function uploadAction()
    {
        $upload = new Zend_File_Transfer_Adapter_Http();
        $upload->setDestination('C:\wamp64\www\project\zfdemo\upload');

        try {
            if ($upload->receive()) {
                $fileName = $upload->getFileName();
                // Обработка успешной загрузки файла
                $this->view->message = 'File uploaded successfully: ' . $fileName;
            }
        } catch (Zend_File_Transfer_Exception $e) {
            // Обработка ошибок загрузки файла
            $this->view->message = 'Error uploading file';
        }
    }
}