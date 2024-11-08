<?php
class MediaController extends Controller {

    public function uploadFiles() { 
        $mediaModel = $this->model('MediaModel');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_FILES['files'])) {
            $mediaIdentify = $_POST['mediaIdentify'] ?? '';
            $mediaType = $_POST['mediaType'] ?? '';
            $uploadsDir = '../public/assets/alpha-theme/img/uploads/';

            // Create uploads directory if it doesn't exist
            if (!is_dir($uploadsDir)) {
                mkdir($uploadsDir, 0777, true);
            }

            $responses = [];

            foreach ($_FILES['files']['name'] as $index => $originalName) {
                $tmpName = $_FILES['files']['tmp_name'][$index];
                $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                $uniqueFileName = uniqid('file_', true) . '.' . $extension;
                $filePath = $uploadsDir . '/' . $uniqueFileName;

                // Move file and save to database
                if (move_uploaded_file($tmpName, $filePath)) {
                    $mediaModel->uploadFile($mediaIdentify, $mediaType, $uniqueFileName);
                    $responses[] = [
                        'status' => 'success',
                        'filename' => $uniqueFileName,
                        'message' => 'File uploaded successfully'
                    ];
                } else {
                    $responses[] = [
                        'status' => 'error',
                        'filename' => $originalName,
                        'message' => 'Failed to upload file'
                    ];
                }
            }

            // Return response as JSON
            header('Content-Type: application/json');
            echo json_encode($responses);
        }
    }

    public function loadFiles() {
        $mediaModel = $this->model('MediaModel');

        // Optionally, fetch mediaIdentify and mediaType from the request
        $mediaIdentify = $_GET['mediaIdentify'] ?? null;
        $mediaType = $_GET['mediaType'] ?? null;

        $files = $mediaModel->getFiles($mediaIdentify, $mediaType);

        // Return files as JSON
        header('Content-Type: application/json');
        echo json_encode($files);
    }

    public function deleteFile() {
        $mediaModel = $this->model('MediaModel');
        
        // Get the media ID from the request
        $data = json_decode(file_get_contents("php://input"), true);
        $mediaId = $data['mediaId'] ?? null;

        if ($mediaId) {
            $deleteStatus = $mediaModel->deleteFile($mediaId);

            if ($deleteStatus) {
                echo json_encode(['status' => 'success', 'message' => 'File deleted successfully']);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'Failed to delete file']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Invalid request']);
        }
    }
}
