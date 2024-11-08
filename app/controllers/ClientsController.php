<?php
class clientsController extends Controller
{
    public function clientsIndex()
    {
        checkAdmin(); 
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $clientsModel = $this->model('clientsModel');
        	$searchColumns = array (
  0 => 'clientId',
  1 => 'clientName',
  2 => 'clientEmail',
  3 => 'whatsapp',
  4 => 'clientMessage',
  5 => 'clientUpdated',
  6 => 'clientIdentify',
);
        $totalRecords = $clientsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $clientsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['clients'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('clients/clientsAll', $params);
    }

    public function clientsDisplay(Request $request, $clientsIdentify)
    {
        checkAdmin(); 
        $clientsModel = $this->model('clientsModel');
        $params['clients'] =  $clientsModel->displaySingle($clientsIdentify);
        $this->adminView('clients/clientsSingle', $params);
    }

    public function clientsDestroy(Request $request, $clientsIdentify)
    {
        checkAdmin(); 
        $clientsModel = $this->model('clientsModel');
        $clientsModel->erase($clientsIdentify);
            // success delete and redirect
            header("Location: /admin/clients/");
            $_SESSION['success_message'] = "Delete successful!";
            exit;
    }

    public function clientsbuild()
    {
        checkAdmin(); 
        $this->adminView('clients/clientsNew');
    }

    public function clientsRecord(Request $request)
    {
        checkAdmin(); 
        $clientsModel = $this->model('clientsModel');
        $data = $request->getBody();
        $data['clientUpdated'] = date('Y-m-d H:i:s');
        $data['clientIdentify'] = generateUniqueId(16);
        	$rules = array (
  'clientName' => 'required|max:255',
  'clientEmail' => 'required|max:255',
  'whatsapp' => 'required|max:255',
  'clientMessage' => 'required|max:50000',
  'clientUpdated' => '',
  'clientIdentify' => 'required',
);
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $clientsModel->record($data);
            // success adding and redirect
            header("Location: /admin/clients/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function clientsModify(Request $request,$clientsIdentify)
    {   checkAdmin(); 
        $clientsModel = $this->model('clientsModel');
        $params['clientIdentify'] = $clientsIdentify;
        $params['clients'] =  $clientsModel->displaySingle($clientsIdentify);
        $this->adminView('clients/clientsEdit', $params);
    }

    public function clientsEdit(Request $request, $clientsIdentify)
    {
        checkAdmin(); 
        $clientsModel = $this->model('clientsModel');
        $data = $request->getBody();
        	$rules = array (
  'clientName' => 'required|max:255',
  'clientEmail' => 'required|max:255',
  'whatsapp' => 'required|max:255',
  'clientMessage' => 'required|max:50000',
  'clientUpdated' => '',
  'clientIdentify' => 'required',
);
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $clientsModel->update($data, $clientsIdentify);
            // success updated and redirect
            header("Location: /admin/clients/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }


    public function clientsContact(Request $request)
    {
        $clientsModel = $this->model('clientsModel');
        $data = $request->getBody();
        $data['clientUpdated'] = date('Y-m-d H:i:s');
        $data['clientIdentify'] = generateUniqueId(16);
        	$rules = array (
  'clientName' => 'required|max:255',
  'clientEmail' => 'required|max:255',
  'whatsapp' => 'required|max:255',
  'clientMessage' => 'required|max:50000',
  'clientUpdated' => '',
  'clientIdentify' => 'required',
);
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $clientsModel->record($data);
            // success adding and redirect
            header("Location: /contact/");
            $_SESSION['success_message'] = "Thank you for contacting with Us!";
            exit;
        }
    }

}
