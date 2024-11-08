<?php
class ArticleModel extends Model{
    private $db;
    public function __construct()
    {
      $this->db = Database::getInstance()->getConnection();
    }

    // public function displayArticle($articleUniqueId = ""){
    //     $stmt = $this->db->prepare("SELECT * FROM `article` WHERE `articleUniqueId` = :articleUniqueId ");
    //     $stmt->execute([':articleUniqueId' => $articleUniqueId]);
    //     $data = $stmt->fetch();
    //     return $data;
      
    // }
    public function displayArticle($articleUniqueId = "") {
      $stmt = $this->db->prepare("SELECT * FROM `article` WHERE `articleUniqueId` = :articleUniqueId");
      $stmt->execute([':articleUniqueId' => $articleUniqueId]);
      $articleData = $stmt->fetch(PDO::FETCH_ASSOC);
  
      $stmt = $this->db->prepare("SELECT `mediaId`, `mediaName` FROM `media` WHERE `mediaIdentify` = :mediaIdentify");
      $stmt->execute([':mediaIdentify' => $articleData['articleUniqueId']]);
      $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
  
      $articleData['images'] = $images ? $images : []; // Handle empty images
  
      return $articleData;
  }
  

  
      public function articleInsert($data) {
        $sql = "INSERT INTO `article`(`articleTitle`, `articleText`, `articleUniqueId`, `articleBelongsTo`)
                VALUES (:articleTitle, :articleText, :articleUniqueId, :articleBelongsTo)";
                
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute($data);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    
    public function mediaUpload($data) {
      $sql = "INSERT INTO `media`(`mediaName`, `mediaIdentify`)
              VALUES (:mediaName, :mediaIdentify)";
                
      try {
          $stmt = $this->db->prepare($sql);
          $stmt->execute($data);
      } catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      }
  }
  


}