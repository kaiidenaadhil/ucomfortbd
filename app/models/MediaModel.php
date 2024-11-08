<?php
class MediaModel extends Model {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function uploadFile($mediaIdentify, $mediaType, $fileName) { 
        $stmt = $this->db->prepare("INSERT INTO media (mediaIdentify, mediaType, mediaFile, mediaCreated) VALUES (?, ?, ?, NOW())");
        return $stmt->execute([$mediaIdentify, $mediaType, $fileName]);
    }

    public function getFiles($mediaIdentify = null, $mediaType = null) {
        // Build the base query
        $query = "SELECT mediaId, mediaName, mediaFile, mediaType, mediaCreated, mediaUpdated, mediaIdentify FROM media";
        $params = [];

        // Add conditions for mediaIdentify and mediaType if provided
        if ($mediaIdentify || $mediaType) {
            $query .= " WHERE";
            if ($mediaIdentify) {
                $query .= " mediaIdentify = ?";
                $params[] = $mediaIdentify;
            }
            if ($mediaType) {
                $query .= ($mediaIdentify ? " AND" : "") . " mediaType = ?";
                $params[] = $mediaType;
            }
        }

        $stmt = $this->db->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function deleteFile($mediaId) {
        // Retrieve the file name before deletion
        $stmt = $this->db->prepare("SELECT mediaFile FROM media WHERE mediaId = ?");
        $stmt->execute([$mediaId]);
        $file = $stmt->fetch(PDO::FETCH_ASSOC);

        // Check if file exists and delete from filesystem
        if ($file && file_exists('../public/assets/alpha-theme/img/uploads/' . $file['mediaFile'])) {
            unlink('../public/assets/alpha-theme/img/uploads/' . $file['mediaFile']);
        }

        // Delete the database record
        $stmt = $this->db->prepare("DELETE FROM media WHERE mediaId = ?");
        return $stmt->execute([$mediaId]);
    }
}
