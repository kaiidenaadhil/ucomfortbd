<?php
class AuthModel extends Model
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function login($data = [])
    {
        $email = $data['userEmail'];
        $password = $data['userPassword'];
        // Find the user by email
        $stmt = $this->db->prepare("SELECT * FROM users WHERE userEmail=:userEmail");
        $stmt->execute([':userEmail' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            echo "User not found";
        } else {
            if ($password == $user['userPassword']) {
                $_SESSION['userAltName'] = $user['userAltName'];
                $_SESSION['userType'] = $user['userType'];

                $cookie_name = "userAltName";
                $cookie_value = $user['userAltName'];
                $cookie_expiry = time() + (86400 * 30); // Set the cookie to expire in 30 days

                setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");

                $cookie_name = "userType";
                $cookie_value = $user['userType'];
                $cookie_expiry = time() + (86400 * 30); // Set the cookie to expire in 30 days

                setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");


                checkAdmin();
                header("Location: " . ROOT . "/admin");
                exit();
            } else {
                echo "Enter correct email and password!";
            }
        }
    }

    public function loginByGoogle($data = [])
    {
        $userFirstName = $data['userFirstName'];
        $userLastName = $data['userLastName'];
        $userEmail = $data['userEmail'];
        $userAvatar = $data['userAvatar'];
        $userAltName = generateUniqueId();

        // Check if user already exists
        $stmt = $this->db->prepare("SELECT * FROM users WHERE userEmail = :userEmail");
        $stmt->execute([':userEmail' => $userEmail]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user) {
            // Create a new user
            $stmt = $this->db->prepare("INSERT INTO users (userAltName,userFirstName, userLastName, userEmail, userAvatar, userType) 
            VALUES (:userAltName,:userFirstName, :userLastName, :userEmail, :userAvatar, :userType)");
            $stmt->execute([
                ':userAltName' => $userAltName,
                ':userFirstName' => $userFirstName,
                ':userLastName' => $userLastName,
                ':userEmail' => $userEmail,
                ':userAvatar' => $userAvatar,
                ':userType' => 1
            ]);

             $_SESSION['userAltName'] =  $userAltName;
             $_SESSION['userType'] = 1;
             echo 'Newly Registered'.$_SESSION['userAltName'];

            // $cookie_name = "userAltName";
            // $cookie_value = $user['userAltName'];
            // $cookie_expiry = time() + (86400 * 30); // Set the cookie to expire in 30 days

            // setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");

            // $cookie_name = "userType";
            // $cookie_value = $user['userType'];
            // $cookie_expiry = time() + (86400 * 30); // Set the cookie to expire in 30 days

            // setcookie($cookie_name, $cookie_value, $cookie_expiry, "/");

        } else {
            $_SESSION['userAltName'] = $user['userAltName'];
            $_SESSION['userType'] = $user['userType'];
            echo 'User already exists'.$_SESSION['userAltName'];
        }
    }





    public function signup($data = [])
    {
        $email = $data['userEmail'];
        $password = $data['userPassword'];
        $userAltName = generateUniqueId();
        $userActivation =  $data['userActivation'] ;
        // Check if user already exists
        $stmt = $this->db->prepare("SELECT * FROM users WHERE userEmail=:userEmail");
        $stmt->execute([':userEmail' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            echo "User already exists";
        } else {
            // Create a new user
            $stmt = $this->db->prepare("INSERT INTO users (userEmail, userPassword, userAltName, userType,userActivation) 
         VALUES (:userEmail,:userPassword,:userAltName,:userType,:userActivation)");
            $stmt->execute([
                ':userEmail' => $email,
                ':userPassword' => $password,
                ':userAltName' => $userAltName,
                ':userType' => 2 ,
                ':userActivation'=> $userActivation
            ]);

            
            header("Location:" . ROOT . "/login"); // Redirect to the login
        }
    }

    public function forgotPassword($data = [])
    {
        $email = $data['email'];
        // Find the user by email
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email=:email");
        $stmt->execute([':email' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            return "User not found";
        } else {
            // Generate a new password
            $newPassword = bin2hex(random_bytes(6));
            // Update the user's password
            $stmt = $this->db->prepare("UPDATE users SET password=:password WHERE id=:id");
            $stmt->execute([':password' => password_hash($newPassword, PASSWORD_DEFAULT), ':id' => $user['id']]);
            // Send the new password to the user via email
            // ... code to send email ...
            return "New password generated and sent to user";
        }
    }

    public function getUserIdByActivationCode($activationCode)
    {
        $stmt = $this->db->prepare("SELECT userId FROM users WHERE userActivation = :activationCode");
        $stmt->execute([':activationCode' => $activationCode]);
        $userId = $stmt->fetchColumn();
        return $userId !== false ? $userId : null;
    }

    public function activateUserAccount($userId)
    {
        $stmt = $this->db->prepare("UPDATE users SET userActivation = 1 WHERE userId = :userId");
        $stmt->execute([':userId' => $userId]);

        // Retrieve user data from the database after activation
        $stmt = $this->db->prepare("SELECT userAltName, userType FROM users WHERE userId = :userId");
        $stmt->execute([':userId' => $userId]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        // Create the session for the activated user
        $_SESSION['userAltName'] = $user['userAltName'];
        $_SESSION['userType'] = $user['userType'];
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE userEmail = :userEmail");
        $stmt->execute([':userEmail' => $email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updatePasswordResetToken($userId, $token)
    {
        $stmt = $this->db->prepare("UPDATE users SET userPassToken = :token WHERE userId = :userId");
        $stmt->execute([':token' => $token, ':userId' => $userId]);
    }
    
    public function validatePasswordResetToken($token)
    {
        $stmt = $this->db->prepare("SELECT userId FROM users WHERE userPassToken = :token");
        $stmt->execute([':token' => $token]);
        $userId = $stmt->fetchColumn();
        return $userId !== false ? $userId : null;
    }

    public function updatePassword($userId, $newPassword)
    {  // Hash the new password before storing it in the database
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("UPDATE users SET userPassword = :password, userPassToken = NULL WHERE userId = :userId");
        $stmt->execute([':password' => $hashedPassword, ':userId' => $userId]);
    }
    public function findUserByIdentifier($identifier)
    {
        $sql = "SELECT users.*, user_details.*
                FROM users
                LEFT JOIN user_details ON users.userAltName = user_details.userIdentify
                WHERE users.userAltName = :identifier OR users.userName = :identifier";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':identifier' => $identifier]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    
    public function findUser($userIdentify)
    {
        $query = "SELECT 
        users.userId,
        users.userAltName,
        users.userName,
        users.userEmail,
        users.userFirstName,
        users.userLastName,
        users.userJoined,
        users.userLastLogged,
        users.userActivation,
        users.userType,
        users.userAvatar,
        users.userCurrency,
        users.userOrigin,
        users.userLanguage,
        users.userMobile,
        user_details.userAddress,
        user_details.userCity,
        user_details.userState,
        user_details.userCountry,
        user_details.userPostalCode,
        user_details.userBio,
        user_details.userWebsite,
        user_details.userSocialMediaLinks,
        user_details.userCoverImage,
        user_details.userProfileImage
    FROM users
    JOIN user_details ON users.userAltName = user_details.userIdentify
    WHERE users.userName = :userName OR users.userAltName = :userAltName";


        $stmt = $this->db->prepare($query);
        $stmt->execute([':userName' => $userIdentify, ':userAltName' => $userIdentify]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        return $user;
    }

    public function updateProfile($data, $data2)
    {
        // Update users table
        $usersUpdateQuery = "UPDATE `users` SET `userName`=:userName,
     `userFirstName`=:userFirstName, `userLastName`=:userLastName, 
     `userCurrency`=:userCurrency, `userLanguage`=:userLanguage, 
     `userMobile`=:userMobile WHERE `userAltName`=:userAltName";
        $usersStatement = $this->db->prepare($usersUpdateQuery);
        $usersStatement->execute($data);
        // Update user_details table
        $userDetailsUpdateQuery = "UPDATE `user_details` SET
        `userWebsite` =:userWebsite ,
         `userAddress`=:userAddress,
          `userCity`=:userCity, 
         `userState`=:userState, 
         `userCountry`=:userCountry, 
         `userPostalCode`=:userPostalCode, `userBio`=:userBio 
         WHERE `userIdentify`=:userIdentify";
        $userDetailsStatement =  $this->db->prepare($userDetailsUpdateQuery);
        $userDetailsStatement->execute($data2);


        echo "Update Success";
    }

    public function updateProfileImage($data)
    {
        $sql = "UPDATE user_details SET userProfileImage = :userProfileImage WHERE 
        userIdentify = :userIdentify";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        echo "profile Image Updated";

    }

    public function updateCoverImage($data)
    {
        $sql = "UPDATE user_details SET userCoverImage = :userCoverImage WHERE 
        userIdentify = :userIdentify";
        $stmt = $this->db->prepare($sql);
        $stmt->execute($data);
        echo "Cover Image Updated";

    }
    public function getUserInfo($userAltName) {
        $query = "SELECT `userId`, `userAltName`, `userName`, `userEmail`, 
                  `userFirstName`, `userLastName`, `userType`, `userAvatar`
                  FROM `users` WHERE `userAltName` = :userAltName";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':userAltName', $userAltName, PDO::PARAM_STR);
        $stmt->execute();
        
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function logout()
    {
        if (isset($_SESSION['userAltName']) && isset($_SESSION['userType'])) {
            unset($_SESSION['userAltName']);
            unset($_SESSION['userType']);
            header("Location: " . ROOT . "/login");
            exit;
        }
    }
}
