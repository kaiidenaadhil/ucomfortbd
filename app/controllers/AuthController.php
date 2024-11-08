<?php
class AuthController extends Controller
{

    public function logout()
    {
        $master = $this->model('AuthModel');
        $master->logout();

        // Destroy the user cookies
        if (isset($_COOKIE['userAltName']) && isset($_COOKIE['userType'])) {
            setcookie('userAltName', '', time() - 3600, '/');
            setcookie('userType', '', time() - 3600, '/');
        }

        header('Location: ' . ROOT);
    }



    public function login(Request $request)
    {
        $user = $this->model('AuthModel');
        $data = $request->getBody();
        if (isset($data['userEmail']) && isset($data['userPassword'])) {
            $user->login($data);
           
        }

        $params['meta'] = [
            'title' => ' Mornstar -Login',
            'description' => '',
        ];

        return $this->onlyView('auth/login', $params);
    }

    public function activateAccount(Request $request, $activateId)
    {
        $user = $this->model('AuthModel');
        $userId = $user->getUserIdByActivationCode($activateId);
        if ($userId !== null) {
            // Update the user's account to activated status in the database
            $user->activateUserAccount($userId);

            // Redirect the user to a success page or display a success message
            header("Location: " . ROOT);
            exit();
        } else {
            // Redirect the user to an error page or display an error message
            header("Location: " . ROOT . "/404");
            exit();
        }
    }

    public function register(Request $request)
    {
        $data = $request->getBody();
        $user = $this->model('AuthModel');
        $mail = $this->model('MailModel');

        if (isset($data['userEmail']) && isset($data['userPassword'])) {
            // Generate a unique activation code for the user
            $activationCode = md5(uniqid(rand(), true));
            // Save the activation code along with other user details during registration
            $data['userActivation'] = $activationCode;
            $user->signup($data);
            // Send the verification email to the user
            $mailSubject = "Verify Account - Mornstar Inc";
            $mailBody = "<a href='" . ROOT . "/activate/$activationCode'>Verify your  Account!</a>";
            $mail->sendmail($data['userEmail'], $mailSubject, $mailBody);
        }

        $params['meta'] = [
            'title' => ' Mornstar - Create an Account',
            'description' => '',
        ];

        return $this->onlyView('auth/register', $params);
    }


    public function forgetPassword(Request $request)
    {
        $data = $request->getBody();
        $user = $this->model('AuthModel');
        $mail = $this->model('MailModel');


        // Check if the user with the provided email exists
        $userData = $user->getUserByEmail($data['userEmail']);

        if ($userData) {
            $passwordResetToken = md5(uniqid(rand(), true));
            $user->updatePasswordResetToken($userData['userId'], $passwordResetToken);

            $mailSubject = "Password Reset - Mornstar Inc";
            // Construct the reset link with the token
            $resetLink = ROOT . "/reset-password/" . $passwordResetToken;

            // Create the email content with the link in the desired format
            $mailBody = "<a href='" . $resetLink . "'>Reset your password</a>";

            // Replace the below line with your logic to send the email
            $mail->sendmail($userData['userEmail'], $mailSubject, $mailBody);

            // Display a success message to the user or redirect to a success page
            echo "Password reset email sent. Please check your inbox.";
        } else {
            // Display an error message or redirect to an error page
            echo "User not found. Please check the email address.";
        }
    }

    public function forget()
    {
        $params['meta'] = [
            'title' => 'Mornstar - Create an Account',
            'description' => '',
        ];
        return   $this->onlyView('auth/forget', $params);
    }

    public function resetPasswordForm()
    {
        $params['meta'] = [
            'title' => 'Mornstar - Create an Account',
            'description' => '',
        ];
        return   $this->onlyView('auth/reset-password', $params);
    }

public function resetPassword(Request $request, $token)
{
    $data = $request->getBody();
    if(isset($data['newPassword'])){


        $user = $this->model('AuthModel');
    
        // Check if the token exists and is valid for a user
        $userId = $user->validatePasswordResetToken($token);
    
        if ($userId) {
            // Verify that the new password and confirm password match
            if ($data['newPassword'] === $data['confirmPassword']) {
                // Update the user's password in the database
                $user->updatePassword($userId, $data['newPassword']);
    
                // Display a success message or redirect to a success page
                echo "Password updated successfully.";
            } else {
                // Display an error message or redirect to an error page
                echo "Passwords do not match. Please try again.";
            }
        } else {
            // Display an error message or redirect to an error page
            echo "Invalid or expired token. Please request a new password reset link.";
        }
    }else{
        $params['token'] = $token;
        $params['meta'] = [
            'title' => 'Mornstar - Create an Account',
            'description' => '',
        ];
        return   $this->onlyView('auth/reset-password', $params);
    }

}


    public function dashboard()
    {
        if(isset($_SESSION['userAltName'])){

            return $this->adminView('auth/dashboard', $params = []); // Success Page
        }

        else{
            header("Location: " . ROOT);
            exit();
        }
        
    }
}
