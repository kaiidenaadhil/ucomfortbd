<?php
class NetworkController extends Controller
{
    public function getNetwork(){
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $networksModel = $this->model('networkModel');
        $searchColumns = array(
            0 => 'networkId',
            1 => 'networkTitle',
            2 => 'networkCountry',
            3 => 'networkCity',
            4 => 'networkStore',
            5 => 'networkPhone',
            6 => 'networkAddress',
            7 => 'networkImage',
            8 => 'networkUpdated',
            9 => 'networkIdentify',
        );
        $totalRecords = $networksModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 4);
        $data = $networksModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        return $data;


    }

    public function networkPage(){
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $networksModel = $this->model('networkModel');
        $searchColumns = array(
            0 => 'networkId',
            1 => 'networkTitle',
            2 => 'networkCountry',
            3 => 'networkCity',
            4 => 'networkStore',
            5 => 'networkPhone',
            6 => 'networkAddress',
            7 => 'networkImage',
            8 => 'networkUpdated',
            9 => 'networkIdentify',
        );
        $totalRecords = $networksModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $networksModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['networks'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->view('network', $params);
    }


    public function networkIndex()
    {
        checkAdmin(); 
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $networkModel = $this->model('networkModel');
        $searchColumns = array(
            0 => 'networkId',
            1 => 'networkTitle',
            2 => 'networkCountry',
            3 => 'networkCity',
            4 => 'networkStore',
            5 => 'networkPhone',
            6 => 'networkAddress',
            7 => 'networkImage',
            8 => 'networkUpdated',
            9 => 'networkIdentify',
        );
        $totalRecords = $networkModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $networkModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['network'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('network/networkAll', $params);
    }

    public function networkDisplay(Request $request, $networkIdentify)
    {
        checkAdmin(); 
        $networkModel = $this->model('networkModel');
        $params['network'] =  $networkModel->displaySingle($networkIdentify);
        $this->adminView('network/networkSingle', $params);
    }

    public function networkDestroy(Request $request, $networkIdentify)
    {
        checkAdmin(); 
        $networkModel = $this->model('networkModel');
        $networkModel->erase($networkIdentify);
        // success delete and redirect
        header("Location: /admin/network/");
        $_SESSION['success_message'] = "Delete successful!";
        exit;
    }

    public function networkbuild()
    {
        checkAdmin(); 
        $this->adminView('network/networkNew');
    }

    public function networkRecord(Request $request)
    {
        checkAdmin(); 
        $networkModel = $this->model('networkModel');
        $data = $request->getBody();
        $data['networkUpdated'] = date('Y-m-d H:i:s');
        $data['networkIdentify'] = generateUniqueId(16);
        $rules = array(
            'networkTitle' => 'required|max:255',
            'networkCountry' => 'required|max:255',
            'networkCity' => 'required|max:255',
            'networkStore' => 'required|max:255',
            'networkPhone' => 'required|max:255',
            'networkAddress' => 'required|max:500',
            'networkImage' => 'required|max:255',
            'networkUpdated' => '',
            'networkIdentify' => 'required',
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
            if (isset($_FILES['networkImage']) && $_FILES['networkImage']['error'] === UPLOAD_ERR_OK) {
                $uploadedFileName = uploadFile('networkImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880 /* 5 MB */);
                if ($uploadedFileName === false) {
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
                $data['networkImage'] = $uploadedFileName;
            }
            /* #### File upload #####*/

            $networkModel->record($data);
            // success adding and redirect
            header("Location: /admin/network/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function networkModify(Request $request, $networkIdentify)
    {
        checkAdmin(); 
        $networkModel = $this->model('networkModel');
        $params['networkIdentify'] = $networkIdentify;
        $params['network'] =  $networkModel->displaySingle($networkIdentify);
        $this->adminView('network/networkEdit', $params);
    }

    public function networkEdit(Request $request, $networkIdentify)
    {
        checkAdmin(); 
        $networkModel = $this->model('networkModel');
        $data = $request->getBody();
        $rules = array(
            'networkTitle' => 'required|max:255',
            'networkCountry' => 'required|max:255',
            'networkCity' => 'required|max:255',
            'networkStore' => 'required|max:255',
            'networkPhone' => 'required|max:255',
            'networkAddress' => 'required|max:500',
            'networkImage' => 'required|max:255',
            'networkUpdated' => '',
            'networkIdentify' => 'required',
        );
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {

            if ($_FILES['networkImage']['error'] === UPLOAD_ERR_OK) {
                $uploadedFileName = uploadFile('networkImage', '../public/assets/alpha-theme/img/uploads/', ['jpg', 'jpeg', 'png', 'gif'], 5242880 /* 5 MB */);
                if ($uploadedFileName === false) {
                    echo "File upload failed or file format or size not allowed.";
                    return;
                }
                $data['networkImage'] = $uploadedFileName;
            } else {
                $networkData = $networkModel->displaySingle($networkIdentify);
                $data['networkImage'] = $networkData[0]['networkImage'];
            }


            $networkModel->update($data, $networkIdentify);
            // success updated and redirect
            header("Location: /admin/network/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
}
