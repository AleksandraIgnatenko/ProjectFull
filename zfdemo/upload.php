<?php
$uploadedFile = $_FILES['file']; // Получаем информацию о загруженном файле

if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
    $tempFilePath = $uploadedFile['tmp_name'];
    $targetFilePath = 'C:\wamp64\www\project\zfdemo\upload' . $uploadedFile['name'];

    // Перемещаем загруженный файл из временной директории в целевую директорию
    if (move_uploaded_file($tempFilePath, $targetFilePath)) {
        echo json_encode(['message' => 'File uploaded successfully']);
    } else {
        echo json_encode(['message' => 'Failed to move file']);
    }
} else {
    echo json_encode(['message' => 'Error uploading file']);
}