<?php
class metaseoController extends Controller
{
    public function metaseoIndex()
    {
        $search = isset($_GET['search']) ? $_GET['search'] : '';
        $metaseoModel = $this->model('metaseoModel');
        	$searchColumns = array (
  0 => 'id',
  1 => 'pageSlug',
  2 => 'metaTitle',
  3 => 'metaDescription',
  4 => 'metaKeywords',
  5 => 'imageFeature',
  6 => 'imageAlt',
  7 => 'imageCaption',
  8 => 'canonicalURL',
  9 => 'metaAuthor',
  10 => 'metaseoUpdated',
  11 => 'metaseoIdentify',
);
        $totalRecords = $metaseoModel->countAll($search, $searchColumns);
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $pagination = new Pagination($totalRecords, $page, 10);
        $data = $metaseoModel->displayAllSearch($search, $searchColumns, $pagination->getOffset(), $pagination->getLimit());
        $params['metaseo'] = $data;
        if ($totalRecords > $pagination->getLimit()) {
            $params['pagination'] =  $pagination->render();
        } else {
            $params['pagination'] = '';
        }
        $this->adminView('metaseo/metaseoAll', $params);
    }

    public function metaseoDisplay(Request $request, $metaseoIdentify)
    {
        $metaseoModel = $this->model('metaseoModel');
        $params['metaseo'] =  $metaseoModel->displaySingle($metaseoIdentify);
        $this->adminView('metaseo/metaseoSingle', $params);
    }

    public function metaseoDestroy(Request $request, $metaseoIdentify)
    {
        $metaseoModel = $this->model('metaseoModel');
        $metaseoModel->erase($metaseoIdentify);
            // success delete and redirect
            header("Location: /admin/metaseo/");
            $_SESSION['success_message'] = "Delete successful!";
            exit;
    }

    public function metaseobuild()
    {
        $this->adminView('metaseo/metaseoNew');
    }

    public function metaseoRecord(Request $request)
    {
        $metaseoModel = $this->model('metaseoModel');
        $data = $request->getBody();
        $data['metaseoUpdated'] = date('Y-m-d H:i:s');
        $data['metaseoIdentify'] = generateUniqueId(16);
        	$rules = array (
  'pageSlug' => 'required',
  'metaTitle' => 'required',
  'metaDescription' => 'required',
  'metaKeywords' => 'required',
  'imageFeature' => 'required',
  'imageAlt' => 'required',
  'imageCaption' => 'required',
  'canonicalURL' => 'required',
  'metaAuthor' => 'required',
  'metaseoUpdated' => '',
  'metaseoIdentify' => 'required',
);
        $validator = new Validator();
        $validator->validate($rules);
        if ($validator->fails()) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $metaseoModel->record($data);
            // success adding and redirect
            header("Location: /admin/metaseo/");
            $_SESSION['success_message'] = "Added successful!";
            exit;
        }
    }

    public function metaseoModify(Request $request,$metaseoIdentify)
    {
        $metaseoModel = $this->model('metaseoModel');
        $params['metaseoIdentify'] = $metaseoIdentify;
        $params['metaseo'] =  $metaseoModel->displaySingle($metaseoIdentify);
        $this->adminView('metaseo/metaseoEdit', $params);
    }

    public function metaseoEdit(Request $request, $metaseoIdentify)
    {
        $metaseoModel = $this->model('metaseoModel');
        $data = $request->getBody();
        	$rules = array (
  'pageSlug' => 'required',
  'metaTitle' => 'required',
  'metaDescription' => 'required',
  'metaKeywords' => 'required',
  'imageFeature' => 'required',
  'imageAlt' => 'required',
  'imageCaption' => 'required',
  'canonicalURL' => 'required',
  'metaAuthor' => 'required',
  'metaseoUpdated' => '',
  'metaseoIdentify' => 'required',
);
        $validator = new Validator();

        if ($validator->fails($rules)) {
            $errors = $validator->errors();
            foreach ($errors as $error) {
                echo $error . "</br>";
            }
        } else {
            $metaseoModel->update($data, $metaseoIdentify);
            // success updated and redirect
            header("Location: /admin/metaseo/");
            $_SESSION['success_message'] = "Update successful!";
            exit;
        }
    }
}
