<?php
class faqsController extends Controller
{

    public function faqsPage()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $faqsModel = $this->model('faqsModel');
        $searchColumns = array(
            0 => 'faqId',
            1 => 'faqTitle',
            2 => 'faqDesc',
            3 => 'faqUpdated',
            4 => 'faqIdentify',
        );
        $totalRecords = $faqsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $faqsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['faqs'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        //  var_dump($params);
        $this->view('faq', $params);
    }


    public function faqsIndex()
    {
        checkAdmin(); 
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $faqsModel = $this->model('faqsModel');
        $searchColumns = array(
            0 => 'faqId',
            1 => 'faqTitle',
            2 => 'faqDesc',
            3 => 'faqUpdated',
            4 => 'faqIdentify',
        );
        $totalRecords = $faqsModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $faqsModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['faqs'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('faqs/faqsAll', $params);
    }

    public function faqsDisplay(Request $request, $faqsIdentify)
    {
        checkAdmin(); 
        $faqsModel = $this->model('faqsModel');
        $params['faqs'] =  $faqsModel->displaySingle($faqsIdentify);
        $this->adminView('faqs/faqsSingle', $params);
    }

    public function faqsDestroy(Request $request, $faqsIdentify)
    {
        checkAdmin(); 
        $faqsModel = $this->model('faqsModel');
        $faqsModel->erase($faqsIdentify);
        // success delete and redirect
        header("Location: /admin/faqs/");
        $_SESSION['success_message'] = "Delete successful!";
        exit;
    }

    public function faqsbuild()
    {
        $this->adminView('faqs/faqsNew');
    }

    public function faqsRecord(Request $request)
    {
        checkAdmin(); 
        $faqsModel = $this->model('faqsModel');
        $data = $request->getBody();
        $data['faqUpdated'] = date('Y-m-d H:i:s');
        $data['faqIdentify'] = generateUniqueId(16);
        $rules = array(
            'faqTitle' => 'required|max:500',
            'faqDesc' => 'required|max:5000',
            'faqUpdated' => '',
            'faqIdentify' => 'required',
        );
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $faqsModel->record($data);
            // success adding and redirect
            header("Location: /admin/faqs/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function faqsModify(Request $request, $faqsIdentify)
    {
        checkAdmin(); 
        $faqsModel = $this->model('faqsModel');
        $params['faqIdentify'] = $faqsIdentify;
        $params['faqs'] =  $faqsModel->displaySingle($faqsIdentify);
        $this->adminView('faqs/faqsEdit', $params);
    }

    public function faqsEdit(Request $request, $faqsIdentify)
    {
        checkAdmin(); 
        $faqsModel = $this->model('faqsModel');
        $data = $request->getBody();
        $rules = array(
            'faqTitle' => 'required|max:500',
            'faqDesc' => 'required|max:5000',
            'faqUpdated' => '',
            'faqIdentify' => 'required',
        );
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $faqsModel->update($data, $faqsIdentify);
            // success updated and redirect
            header("Location: /admin/faqs/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
}
