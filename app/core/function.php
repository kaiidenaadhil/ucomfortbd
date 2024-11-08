<?php
function p($value){
   echo "<pre>";
   var_dump($value);
   echo "</pre>";
   exit;
}
function d($value){
   echo "<pre>";
   var_dump($value);
   echo "</pre>";

}

function redirect($path, $statusCode = 303) {
   $url = ROOT.'/'.$path;
   header('Location: ' . $url, true, $statusCode);
   die();
}

function generateUniqueId($length = 16) {
   $chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
   $result = '';
   for ($i = 0; $i < $length; $i++) {
       $result .= $chars[random_int(0, strlen($chars) - 1)];
   }
   return $result;
}

function generateCSRFToken() {
   $token = bin2hex(random_bytes(32));
   $_SESSION['_token'] = $token;
   return $token;
 }

 function validateCSRFToken($token) {
   if (isset($_SESSION['_token']) && hash_equals($_SESSION['_token'], $token)) {
     unset($_SESSION['_token']);
     return true;
   }
   return false;
 }

 function csrf() {
   $token = generateCSRFToken();
   return '<input type="hidden" name="_token" value="' . $token . '">';
 }

 function removeTokenElement($data) {
   if (isset($data['_token'])) {
       unset($data['_token']);
   }
   return $data;
}

function formatTime($formatTime) {
   $postTime = strtotime($formatTime);
   $currentTime = time();
   $timeDiff = $currentTime - $postTime;
 
   if ($timeDiff < 60) {
     // Less than 1 minute
     return $timeDiff . 's';
   } elseif ($timeDiff < 3600) {
     // Less than 1 hour
     $minutes = floor($timeDiff / 60);
     return $minutes . 'm';
   } elseif ($timeDiff < 86400) {
     // Less than 24 hours
     $hours = floor($timeDiff / 3600);
     return $hours . 'h';
   } else {
     // More than 24 hours, display the full date and time
     //return date('d F Y \. h:i A', $postTime);
     //return date('d M Y \. h:i A', $postTime);
     return date('d M y \. h:i A', $postTime);


   }
 }
 
 function formatTimeShort($formatTime) {
  $postTime = strtotime($formatTime);
  $currentTime = time();
  $timeDiff = $currentTime - $postTime;

  if ($timeDiff < 60) {
    // Less than 1 minute
    return $timeDiff . 's';
  } elseif ($timeDiff < 3600) {
    // Less than 1 hour
    $minutes = floor($timeDiff / 60);
    return $minutes . 'm';
  } elseif ($timeDiff < 86400) {
    // Less than 24 hours
    $hours = floor($timeDiff / 3600);
    return $hours . 'h';
  } else {
    // More than 24 hours, display the full date and time
    //return date('d F Y \. h:i A', $postTime);
    //return date('d M Y \. h:i A', $postTime);
    return date('d M y', $postTime);


  }
}
 
 
 function calculateDaysToFutureDate($futureDate) {
   $today = new DateTime();
   $future = new DateTime($futureDate);
   $interval = $today->diff($future);
   return $interval->days;
}

function AutoLink($text) {
  // Regular expression to match URLs
  $pattern = '/https?:\/\/\S+/';

  // Find all matches of the pattern in the text
  preg_match_all($pattern, $text, $matches);

  // Loop through the matches and replace each URL with an anchor tag
  foreach ($matches[0] as $url) {
      $linkText = $url; // You can customize the link text if needed
      $replacement = "<span class='auto-link-container'><a class='auto-link' href='$url' target='_blank'>$linkText</a></span>";
      $text = str_replace($url, $replacement, $text);
  }

  return $text;
}


function convertToClickableHashtags($userInput) {
  // Extract hashtags using regular expression
  preg_match_all('/#\w+/', $userInput, $matches);

  if (!empty($matches[0])) {
      foreach ($matches[0] as $hashtag) {
          $hashtagWithoutHash = substr($hashtag, 1);
          $userInput = str_replace($hashtag, '<a class="hashtag-link" href="'.ROOT.'/hashtag/'.$hashtagWithoutHash.'">'.$hashtag.'</a>', $userInput);
      }
  }

  return $userInput;
}

function isLinkActive($linkPath) {
  $currentPath = $_SERVER['REQUEST_URI'];

  // Check if the linkPath is empty (homepage) or is part of the current URL
  if ((empty($linkPath) && $currentPath === '/') || (empty($linkPath) && $currentPath === '')) {
      return 'active';
  } elseif (!empty($linkPath) && strpos($currentPath, $linkPath) !== false) {
      return 'active';
  }

  return '';
}




function uploadFile($fileInputName, $uploadDirectory, $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'avi', 'mov'], $maxFileSize = 52428800 /* 50 MB */) {
  // Check if file was uploaded without errors
  if ($_FILES[$fileInputName]['error'] !== UPLOAD_ERR_OK) {
      return false; // File upload error
  }

  // Get file extension
  $extension = strtolower(pathinfo($_FILES[$fileInputName]['name'], PATHINFO_EXTENSION));

  // Check if the file extension is allowed
  if (!in_array($extension, $allowedExtensions)) {
      return false; // Invalid file extension
  }

  // Check if file size exceeds the allowed limit
  if ($_FILES[$fileInputName]['size'] > $maxFileSize) {
      return false; // File size exceeds the allowed limit
  }

  // Generate unique file name
  $uniqueFileName = uniqid() . '.' . $extension;

  // Ensure the upload directory exists
  if (!is_dir($uploadDirectory)) {
      mkdir($uploadDirectory, 0755, true); // Create directory if it doesn't exist
  }

  // Move uploaded file to the upload directory
  if (move_uploaded_file($_FILES[$fileInputName]['tmp_name'], $uploadDirectory . $uniqueFileName)) {
      return $uniqueFileName; // Return unique file name
  } else {
      return false; // File move error
  }
}



function checkAdmin() {
  // Check if userAltname is not set and userType is not 'admin'
  if (!isset($_SESSION['userAltname']) && $_SESSION['userType'] !== 'admin') {
      // Redirect to ROOT
      header('Location:' . ROOT);
      exit; // Make sure to exit after redirection
  }
}