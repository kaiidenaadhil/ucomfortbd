<?php
class campaignController extends Controller
{
    public function getCampaign(){

       // $search = isset($_GET['search']) ? $_GET['search'] : '';
        $campaignModel = $this->model('campaignModel');
        $data = $campaignModel->getAllCampaigns();
        // 	$searchColumns = array (
        //     0 => 'campaignId',
        //     1 => 'campainTitle',
        //     2 => 'campaignSubtitle',
        //     3 => 'campaignMedia',
        //     4 => 'campaignUpdated',
        //     5 => 'campaignIdentify',
        //     );
        // $totalRecords = $campaignModel->countAll($search, $searchColumns);
        // $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        // $pagination = new Pagination($totalRecords, $page, 3);
        // $data = $campaignModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
         return $data;
    }
    public function campaignIndex()
    {
        checkAdmin(); 
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $campaignModel = $this->model('campaignModel');
        	$searchColumns = array (
            0 => 'campaignId',
            1 => 'campainTitle',
            2 => 'campaignSubtitle',
            3 => 'campaignMedia',
            4 => 'campaignUpdated',
            5 => 'campaignIdentify',
            );
        $totalRecords = $campaignModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $campaignModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['campaign'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('campaign/campaignAll', $params);
    }

    public function campaignDisplay(Request $request, $campaignIdentify)
    {
        checkAdmin(); 
        $campaignModel = $this->model('campaignModel');
        $params['campaign'] =  $campaignModel->displaySingle($campaignIdentify);
        $this->adminView('campaign/campaignSingle', $params);
    }

    public function campaignDestroy(Request $request, $campaignIdentify)
    {
        checkAdmin(); 
        $campaignModel = $this->model('campaignModel');
        $campaignModel->erase($campaignIdentify);
            // success delete and redirect
            header("Location: /admin/campaign/");
            $_SESSION['success_message'] = "Delete successful!";
            exit;
    }

    public function campaignbuild()
    {
        checkAdmin(); 
        $this->adminView('campaign/campaignNew');
    }

    public function campaignRecord(Request $request)
    {

        checkAdmin(); 
        $campaignModel = $this->model('campaignModel');
        $data = $request->getBody();


        // File upload handling
        $uploadedFileName = uploadFile(
            'campaignMedia',                             // The name of the input field (e.g., <input type="file" name="campaignMedia">)
            '../public/assets/alpha-theme/img/uploads/', // Directory where the uploaded file will be stored
            ['jpg', 'jpeg', 'png', 'gif', 'mp4', 'avi', 'mov'], // Allowed file types (images and videos)
            52428800 /* 50 MB */                        // Maximum file size allowed (50 MB)
        );

        // Check if the file upload was successful
        if ($uploadedFileName === false) {
            echo "File upload failed or file format or size not allowed.";
            return;
        }

        // If successful, save the unique file name to the database
        $data['campaignMedia'] = $uploadedFileName;


        $data['campaignUpdated'] = date('Y-m-d H:i:s');
        $data['campaignIdentify'] = generateUniqueId(16);
        	$rules = array (
            'campainTitle' => 'required|max:255',
            'campaignSubtitle' => 'required|max:255',
            'campaignMedia' => 'required|max:255',
            'campaignUpdated' => '',
            'campaignIdentify' => 'required',
            );
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $campaignModel->record($data);
            // success adding and redirect
            header("Location: /admin/campaign/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function campaignModify(Request $request,$campaignIdentify)
    {
        checkAdmin(); 
        $campaignModel = $this->model('campaignModel');
        $params['campaignIdentify'] = $campaignIdentify;
        $params['campaign'] =  $campaignModel->displaySingle($campaignIdentify);
        $this->adminView('campaign/campaignEdit', $params);
    }

    public function campaignEdit(Request $request, $campaignIdentify)
    {
        checkAdmin(); 
        $campaignModel = $this->model('campaignModel');
        $data = $request->getBody();
    
        // Remove the 'campaignMedia' field from the validation rules
        $rules = array(
            'campainTitle' => 'required|max:255',
            'campaignSubtitle' => 'required|max:255',
            'campaignUpdated' => '',
            'campaignIdentify' => 'required',
        );
    
        $validator = new Validator();
        $validator->validate($rules);
    
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            // Check if a new image is uploaded
            if ($_FILES['campaignMedia']['error'] === UPLOAD_ERR_OK) {
                // Upload the new image
                $uploadedFileName = uploadFile('campaignMedia', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880 /* 5 MB */);
    
                if ($uploadedFileName === false) {
                    // Handle file upload error
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
    
                // Update the image path in the data array
                $data['campaignMedia'] = $uploadedFileName;
            } else {
                // If no new image is uploaded, retain the existing image path
                $campaignData = $campaignModel->displaySingle($campaignIdentify); 
                $data['campaignMedia'] = $campaignData[0]['campaignMedia'];
               // p($data['campaignMedia']);
                
            }
    
            $campaignModel->update($data, $campaignIdentify);
            // Success updated and redirect
            header("Location: /admin/campaign/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
    
}
