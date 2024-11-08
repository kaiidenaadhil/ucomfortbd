<?php
class projectsController extends Controller
{

    public function projectsPage()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $projectsModel = $this->model('projectsModel');
        $searchColumns = array(
            0 => 'projectId',
            1 => 'projectFlagCode',
            2 => 'projectImage',
            3 => 'projectCountryName',
            4 => 'projectUpdated',
            5 => 'projectIdentify',
        );
        $totalRecords = $projectsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $projectsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['projects'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->view('projects', $params);
    }
    public function projectsIndex()
    {
        checkAdmin(); 
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $projectsModel = $this->model('projectsModel');
        $searchColumns = array(
            0 => 'projectId',
            1 => 'projectFlagCode',
            2 => 'projectImage',
            3 => 'projectCountryName',
            4 => 'projectUpdated',
            5 => 'projectIdentify',
        );
        $totalRecords = $projectsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $projectsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['projects'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('projects/projectsAll', $params);
    }

    public function projectsDisplay(Request $request, $projectsIdentify)
    {
        checkAdmin(); 
        $projectsModel = $this->model('projectsModel');
        $params['projects'] =  $projectsModel->displaySingle($projectsIdentify);
        $this->adminView('projects/projectsSingle', $params);
    }

    public function projectsDestroy(Request $request, $projectsIdentify)
    {
        checkAdmin(); 
        $projectsModel = $this->model('projectsModel');
        $projectsModel->erase($projectsIdentify);
        // success delete and redirect
        header("Location: /admin/projects/");
        $_SESSION['success_message'] = "Delete successful!";
        exit;
    }

    public function projectsbuild()
    {
        checkAdmin(); 
        $this->adminView('projects/projectsNew');
    }

    public function projectsRecord(Request $request)
    {
        checkAdmin(); 
        $projectsModel = $this->model('projectsModel');
        $data = $request->getBody();
        $data['projectUpdated'] = date('Y-m-d H:i:s');
        $data['projectIdentify'] = generateUniqueId(16);
        $rules = array(
            'projectFlagCode' => 'required|max:255',
            'projectImage' => 'required|max:255',
            'projectCountryName' => 'required|max:255',
            'projectUpdated' => '',
            'projectIdentify' => 'required',
        );
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {




            /* #### File upload #####*/
            if (isset($_FILES['projectImage']) && $_FILES['projectImage']['error'] === UPLOAD_ERR_OK) {
                $uploadedFileName = uploadFile('projectImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880 /* 5 MB */);
                if ($uploadedFileName === false) {
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
                $data['projectImage'] = $uploadedFileName;
            }
            /* #### File upload #####*/

            $projectsModel->record($data);
            // success adding and redirect
            header("Location: /admin/projects/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function projectsModify(Request $request, $projectsIdentify)
    {
        checkAdmin(); 
        $projectsModel = $this->model('projectsModel');
        $params['projectIdentify'] = $projectsIdentify;
        $params['projects'] =  $projectsModel->displaySingle($projectsIdentify);
        $this->adminView('projects/projectsEdit', $params);
    }

    public function projectsEdit(Request $request, $projectsIdentify)
    {
        checkAdmin(); 
        $projectsModel = $this->model('projectsModel');
        $data = $request->getBody();
        $rules = array(
            'projectFlagCode' => 'required|max:255',
            'projectImage' => 'required|max:255',
            'projectCountryName' => 'required|max:255',
            'projectUpdated' => '',
            'projectIdentify' => 'required',
        );
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {


            /* Upload file edit */
            if ($_FILES['projectImage']['error'] === UPLOAD_ERR_OK) {
                $uploadedFileName = uploadFile('projectImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880 /* 5 MB */);
                if ($uploadedFileName === false) {
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
                $data['projectImage'] = $uploadedFileName;
            } else {
                $projectsData = $projectsModel->displaySingle($projectsIdentify);
                $data['projectImage'] = $projectsData[0]['projectImage'];
            }
            /* Upload file edit  */

            $projectsModel->update($data, $projectsIdentify);
            // success updated and redirect
            header("Location: /admin/projects/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
}
